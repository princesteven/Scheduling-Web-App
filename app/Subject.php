<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name', 'course_id', 'unit_id', 'semester_id', 'study_level_id', 'code'];
}
