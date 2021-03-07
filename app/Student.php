<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['student_id','institution_id','institution_name','student_name','student_email',
'certificate','selfi_image','verified_status'];
}
