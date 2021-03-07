<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use Intervention\Image\Facades\Image;
use Session;
use DB;

class GalleryController extends Controller
{
    public function delete_image($image_id)
    {   
        $delete_image=DB::table('galleries')
        ->where('image_id',$image_id)
        ->delete();

        return redirect()->back()->with("image_delete_message",'Image deleted Successfully');
    }
    public function gallery_image_upload(Request $request)
    {
        $this->validate($request,[
            'image'=>'required'
        ]);

        $authority_id=Session::get('authority_id');
        $authorityInfo=DB::table('authorities')
        ->where('authority_id',$authority_id)
        ->first();

        $images = $request->image;
        
        foreach($images as $image)
        {
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('images',$image_new_name);
            $post = new Gallery;
            $post->authority_id = $authority_id;
            $post->institution_id = $authorityInfo->institution_id;
            $post->image = 'images/'.$image_new_name;
            $post->image_title=$request->image_title;
            $post->save();
        }

        return redirect()->back()->with('image_success_message','Image added successfully!');
    }
}
