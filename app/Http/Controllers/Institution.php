<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Intervention\Image\Facades\Image;
use App\Institutions;
use RealRashid\SweetAlert\Facades\Alert;

class Institution extends Controller
{
  
    protected function institutionImageProcessing(Request $request)
    {
            $institution_image = $request->file('institution_image');
            $fileType = $institution_image->getClientOriginalExtension();
            $imageName = $request->institution_name.'.'.$fileType;
            $directory = 'uploads/institutions/';
            $institution_image_imageUrl=$directory.$imageName;

            Image::make($institution_image)->save($institution_image_imageUrl);
            return $institution_image_imageUrl;
            // dd($selfi_certificate);
    }
    public function add_institution(Request $request)
    {
        $institutionImageimageUrl = $this->institutionImageProcessing($request);
        
        $new_institution=DB::table('institutions')->insert([
            'institution_name'=> $request->institution_name,
            'institution_email' => $request->institution_email,
            'institution_eiin' => $request->institution_eiin,
            'institution_description'=> $request->institution_description,
            'website'=> $request->website,
            'contact_no'=> $request->phone_number,
            'institution_image'=>$institutionImageimageUrl
        ]);
        toast('Institution added sucessfully!','success');
        return redirect()->back();
    }
}
