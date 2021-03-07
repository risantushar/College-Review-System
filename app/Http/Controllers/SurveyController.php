<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Decrypt;
use Session;
use App\Answer;
use App\Questionnaire;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function rating(Request $request)
     {
         //  return $request->all();
         $student_id=Session::get('student_id');

         $student_info=DB::table('students')
        ->join('institutions','institutions.institution_id','=','students.institution_id')
        ->where('student_id',$student_id)
        ->first();
        // return $student_info->survey_id;

         $rating=DB::table('ratings')
         ->insert([
             'student_id'=>$student_id,
             'institution_id'=>$student_info->institution_id,
             'rating'=>$request->input('rating')
             ]);

             $averageRating=DB::table('ratings')
             ->where('institution_id',$student_info->institution_id)
             ->avg('rating');

             $covertRatingInCeling=ceil($averageRating);
             $setAvgRating=DB::table('institutions')
             ->where('institution_id',$student_info->institution_id)
             ->update([
                 'rating'=>$covertRatingInCeling
                 ]);
                 
            return redirect('/survey/completed');
     }

     public function save_answers(Request $request,Questionnaire $survey_id)
     {
         $data=$request->all();

         $survey=$survey_id->surveys_answers()->create($data['studentInfo']);
         $survey->responses()->createMany($data['responses']);

         return view('student.survey.rating_form');
     }
    
     public function publish_survey($survey_id)
     {
        $authority_id=Session::get('authority_id');
       $set_survey=DB::table('institutions')
       ->join('authorities','authorities.authority_id', '=', 'institutions.institution_id')
       ->where('authorities.authority_id','=',$authority_id)
       ->update([
        'survey_id'=>$survey_id
    ]);
    return redirect()->back()->with('survey_publish_message','Survey published Successfully');;
       
     }

     public function unpublished_survey($survey_id)
     {
        $authority_id=Session::get('authority_id');
        $set_survey=DB::table('institutions')
        ->join('authorities','authorities.authority_id', '=', 'institutions.institution_id')
        ->where('authorities.authority_id','=',$authority_id)
        ->update([
         'survey_id'=>0
     ]);
     return redirect()->back()->with('survey_unpublish_message','Survey unpublished Successfully');;
     }

    public function delete_survey($id)
    {   
        $survey_id=$id;
        DB::table('questionnaires')
        ->where('id',$survey_id)
        ->delete();

        DB::table('questions')
        ->where('survey_id',$survey_id)
        ->delete();

        DB::table('answers')
        ->where('survey_id',$survey_id)
        ->delete();
        

    return redirect()->back()->with('delete_message','Survey  Deleted Successfully');
    }
    public function get_previous_survey_list($id)
    {   
        $authority_id=decrypt($id);
        $get_surveys=DB::table('questionnaires')
        ->where('authority_id',$authority_id)
        ->get();

        return view('authority.survey.previous_surveys',['get_surveys'=>$get_surveys]);
    }
    public function create_survey(Request $request)
    {
        // $data= request()->validate([
        //     'title' => 'required',
        //     'purpose' => 'required',
        // ]);

        // $survey_id=Session::get('authority_id')->questionnaires()->create($data);

        $surveyId=DB::table('questionnaires')

        ->insertGetId([
            'authority_id'=>$request->authority_id,
            'title'=>$request->title,
            'purpose'=>$request->purpose
        ]);

        return redirect()->route('create_question',['surveyInfo'=>$surveyId]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=request()->validate([
           'title'=>'required',
           'purpose'=>'required',
       ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
