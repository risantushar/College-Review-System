<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SurveyResponses;

class SurveyAnswer extends Model
{
    protected $guarded=[];
    
    public function questionnaire()
    {
        return $this->belongsTO(Questionnaire::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponses::class,'survey_answer_id','id');
    }

}
