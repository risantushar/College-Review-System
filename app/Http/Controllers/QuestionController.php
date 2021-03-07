<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use App\Answer;
use App\Questionnaire;

class QuestionController extends Controller
{
    public function delete_question($question_id)
    {
        // return $question_id;
        $delete_question=DB::table('questions')
        ->where('id',$question_id)
        ->delete();

        DB::table('answers')
        ->where('question_id',$question_id)
        ->delete();

        DB::table('survey_responses')
        ->where('question_id',$question_id)
        ->delete();

        return redirect()->back()->with('delete_message','Question deleted successfully');
    }

    public function add_question(Request $request,Questionnaire $survey_id)
    {
        // $data=request()->validate([
        //     'question'=>'required',
        //     'choices.*.choice'=>'required'
        // ]);
        $data=request()->all();

        $authority_id=Session::get('authority_id');
        
        $question= $survey_id->questions()->create($data['question']);
        $question->answers()->createMany($data['choices']);

        return redirect('/create/questions/'.$survey_id->id)->with('question_add_message','Question added');
    }
}
