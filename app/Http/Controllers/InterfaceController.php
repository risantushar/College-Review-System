<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use dycrypt;
use Session;
use App\SurveyAnswer;
use App\Questionnaire;


use RealRashid\SweetAlert\Facades\Alert;


class InterfaceController extends Controller
{
    public function manage_teacher_page()
    {
        $authority_id=Session::get('authority_id');
        $all_teachers=DB::table('teachers')
        ->where('authority_id',$authority_id)
        ->get();

        return view('authority.teacher.manage_teacher',['all_teachers'=>$all_teachers]);
    }
    public function college_teachers_page($id)
    {
        $student_id=decrypt($id);

        $student_infos=DB::table('students')
        ->where('student_id',$student_id)
        ->first();

        $teachers=DB::table('teachers')
        ->where('institution_id',$student_infos->institution_id)
        ->get();
        
        return view('student.teacher.review_teacher',[
            'teachers'=>$teachers,
            ]);

    }
    public function add_teacher_page()
    {
        return view('authority.teacher.add_teacher');
    }
    public function survey_result_page(Questionnaire $survey_id)
    {
        $survey_id->load('questions.answers.responses');
        
        $vote=DB::table('survey_answers')
        ->where('questionnaire_id',$survey_id->id)
        ->get()
        ->count();

        $authority_id=Session::get('authority_id');
        $authorityInfos=DB::table('authorities')
        ->where('authority_id',$authority_id)
        ->first();

        $total_students=DB::table('students')
        ->where('institution_id',$authorityInfos->institution_id)
        ->get()
        ->count();

        return view('authority.survey.survey_result',[
            'survey_id'=>$survey_id,
            'vote'=>$vote,
            'total_students'=>$total_students,
            ]);
    }
    public function gallery_management_page()
    {
        $authority_id=Session::get('authority_id');
        $authorityInfos=DB::table('authorities')
        ->where('authority_id',$authority_id)
        ->first();

        $all_images=DB::table('galleries')
        ->where('institution_id',$authorityInfos->institution_id)
        ->get();

        return view('authority.gallery.manage_gallery',['all_images'=>$all_images]);
    }
    public function college_profile_page($college_id)
    {
        $institutionInfos=DB::table('institutions')
        ->where('institution_id',$college_id)
        ->first();

        $galleryImages=DB::table('galleries')
        ->where('institution_id',$college_id)
        ->get();

        $teachers=DB::table('teachers')
        ->where('institution_id',$college_id)
        ->get();

        return view('student.college.college_profile',[
            'institutionInfos'=>$institutionInfos,
            'galleryImages'=>$galleryImages,
            'teachers'=>$teachers,
            ]);
    }
    public function add_image_page()
    {
        return view('authority.gallery.add_image');
    }
    public function survey_notification()
    {
        return view('student.survey.survey_notification');
    }
    public function review_page(Questionnaire $survey_id)
    {
        // dd($survey_id);
        $student_id=Session::get('student_id');

        $student_info=DB::table('students')
            ->join('institutions','institutions.institution_id','=','students.institution_id')
            ->where('student_id',$student_id)
            ->first();
        // return $student_info->survey_id;

        if($student_info->verified_status==0)
        {
            toast('Your account is not verified','error');
            return redirect()->back();
        }
        else
        {
            $checkServeyCompleteOrNot=DB::table('survey_answers')
            ->where('student_id',$student_id)
            ->where('institution_id',$student_info->institution_id)
            ->where('questionnaire_id',$student_info->survey_id)
            ->first();
            
            if($checkServeyCompleteOrNot==true)
            {
                toast('You have already completed!','error');
                return redirect()->back();
            }
            else
            {
                $survey_id->load('questions.answers');
                
                return view('student.survey.survey_form',[
                    'survey_id'=>$survey_id
                    ]);
            }
        }
    }
    public function create_question(Questionnaire $surveyInfo)
    {
        $surveyInfo->load('questions.answers');

        return view('authority.survey.question_page',[
            'surveyInfo'=>$surveyInfo,
            ]);
    }
    public function create_survey_page()
    {
        return view('authority.survey.create_survey');
    }
    public function top_rated_college_page()
    {
        $top_colleges=DB::table('institutions')
        ->orderBy('rating','desc')
        ->paginate(10);

        return view('student.top_colleges.top_colleges',['top_colleges'=>$top_colleges]);
    }
    public function all_students_page()
    {
        $all_students=DB::table('students')
        ->paginate(5);
        return view('admin.student.all_students',['all_students'=>$all_students]);
    }
    public function account_verify_page($student_id)
    {
        $student_id=decrypt($student_id);
        $student_info=DB::table('students')
        ->where('student_id',$student_id)
        ->first();
        return view('student.profile.verify_form',['student_info'=>$student_info]);
    }
    public function college_info_page($authority_id)
    {
        $id=$authority_id;
        $authority_info=DB::table('authorities')
        ->where('authority_id',$id)
        ->first();
         
        $authority_institution_infos=DB::table('institutions')
        ->where('institution_id',$authority_info->institution_id)
        ->first();

        return view('authority.college_info.college_info',[
            'authority_institution_infos'=> $authority_institution_infos,
            'authority_info'=>$authority_info,
            ]);
    }
    public function add_institution_page()
    {
        return view('admin.institution.add_institution');
    }
    public function edit_profile_page($id)
    {
        $student_id=decrypt($id);

        $student_infos=DB::table('students')
        ->where('student_id',$student_id)
        ->first();

        $all_institutions=DB::table('institutions')
        ->get();

        return view('student.profile.edit_profile',[
            'all_institutions'=>$all_institutions,
            'student_infos'=>$student_infos,
            ]);
    }
    public function student_management_page()
    {
        $request_students=DB::table('students')
        ->where('request_for_verification',1)
        ->get();
        return view('admin.student.student_management',['request_students'=>$request_students]);
    }
    public function student_profile_page($student_id)
    {
        $id=decrypt($student_id);
        $student_infos=DB::table('students')
        ->where('student_id',$id)
        ->first();

        return view('student.profile.profile',['student_infos'=>$student_infos]);
    }
    public function student_dashboard()
    {
        return view('student.home.home');
    }
    public function manage_authority_page()
    {
        $authorities=DB::table('authorities')
        ->paginate(10);
        return view('admin.authority.manage_authority',['authorities'=>$authorities]);
    }
    public function student_register_page()
    {
        $all_institutions=DB::table('institutions')
        ->get();

        // return view('front_end.register_form.student_register_form1');
        return view('front_end.register_form.student_register_form1',['all_institutions'=>$all_institutions]);
    }
    public function authority_dashboard_page()
    {
        $total_students=DB::table('students')
        ->get()
        ->count();

        $total_institutions=DB::table('institutions')
        ->get()
        ->count();

        $total_surveys=DB::table('questionnaires')
        ->where('authority_id',Session::get('authority_id'))
        ->get()
        ->count();

        return view('authority.home.home',[
            'total_students'=>$total_students,
            'total_institutions'=>$total_institutions,
            'total_surveys'=>$total_surveys
            ]);

    }
    public function admin_dashboard_page()
    {
        $verifyRequestNo=DB::table('students')
        ->where('request_for_verification',1)
        ->count();

        $studentsNo=DB::table('students')
        ->count();

        $InstitutionNo=DB::table('institutions')
        ->count();

        return view('admin.home.home',[
            'verifyRequestNo'=>$verifyRequestNo,
            'studentsNo'=>$studentsNo,
            'InstitutionNo'=>$InstitutionNo,
            ]);
    }
    public function add_authority_page()
    {
        $all_institutions=DB::table('institutions')
        ->where('authority_status',0)
        ->get();
        return view('admin.authority.add_form',['all_institutions'=>$all_institutions]);
    }
    public function authority_login_page()
    {
        return view('front_end.login_form.authority_form');
    }
    public function admin_login_page()
    {
        return view('front_end.login_form.admin_form');
    }
    public function student_login_page()
    {
        return view('front_end.login_form.student_form');
    }
    public function home()
    {
        return view('front_end.home.home');
    }
}
