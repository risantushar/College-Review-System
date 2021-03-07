<?php

namespace App;
use App\Questionnaire;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }
}
