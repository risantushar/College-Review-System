<?php

namespace App;

use App\Authority;
use App\Question;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $guarded=[];

    // protected $fillable=['authority_id','title','purpose'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function surveys_answers()
    {
        return $this->hasMany(SurveyAnswer::class);
    }

    public function authority()
    {
        return $this->belongsTo(Authority::class,'authority_id','id');
    }
}
