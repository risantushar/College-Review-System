<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponses extends Model
{
    protected $guarded=[];

    public function survey_answers()
    {
        return $this->belongsTo(SurveyAnswer::class,'id','survey_answer_id');
    }

    // public function answers()
    // {
    //     return $this->belongsTo(SurveyAnswer::class);
    // }
}
