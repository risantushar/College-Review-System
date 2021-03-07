<?php

namespace App;
use App\SurveyResponses;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded=[];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponses::class,'choice_id','id');
    }
}
