<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class AuthorityController extends Controller
{
    public function delete_authority($authority_id)
    {
        $deleteAuthority=DB::table('authorities')
        ->where('authority_id',$authority_id)
        ->delete();

        toast('Authority deleted successfully!','success');
        return redirect()->back();
    }
    public function add_authority(Request $request)
    {
        $institution_name=DB::table('institutions')
        ->where('institution_id',$request->institution_name)
        ->first();

        $new_authority=DB::table('authorities')->insert([
            'authority_name'=> $request->authority_name,
            'institution_id'=> $request->institution_name,
            'institution_name' => $institution_name->institution_name,
            'authority_email'=> $request->authority_email,
            'password'=> md5($request->password),
            'website'=> $request->website,
        ]);

        $update_autority_status=DB::table('institutions')
        ->where('institution_id',$request->institution_name)
        ->update([
            'authority_status'=>1,
        ]);
        
        toast('Authority added sucessfully!','success');
        return redirect('/authority/add');
    }
}
