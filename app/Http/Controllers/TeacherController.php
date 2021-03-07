<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class TeacherController extends Controller
{
    public function delete_teacher($id)
    {
        $delete_teacher=DB::table('teachers')
        ->where('teacher_id',$id)
        ->delete();

        return redirect()->back()->with('delete_message',"Teacher deleted successfully");
    }
    public function rate_teacher(Request $request)
    {
        // return $request->all();
        $student_id=Session::get('student_id');

        $save_rating=DB::table('teacher_ratings')
        ->insert([
            'student_id'=>$student_id,
            'teacher_id'=>$request->teacher_id,
            'rating'=>$request->rating,
            ]);

        $averageRating=DB::table('teacher_ratings')
        ->where('teacher_id',$request->teacher_id)
        ->avg('rating');

        $set_rating=DB::table('teachers')
        ->where('teacher_id',$request->teacher_id)
        ->update([
            'rating'=>$averageRating,
            ]);
        
        return redirect('college/teachers/page/'.encrypt($student_id));
    }
    public function add_teacher(Request $request)
    {
        // return $request->all();
        $authority_id=Session::get('authority_id');

        $authorityInfo=DB::table('authorities')
        ->where('authority_id',$authority_id)
        ->first();

        $add_teacher=DB::table('teachers')
        ->insert([
            'authority_id'=>$authority_id,
            'institution_id'=>$authorityInfo->institution_id,
            'teacher_name'=>$request->teacher_name,
            'teacher_email'=>$request->teacher_email,
            'depertment'=>$request->depertment,
            ]);

             return redirect()->back()->with('add_success_message','Teacher added successfully');
    }
}
