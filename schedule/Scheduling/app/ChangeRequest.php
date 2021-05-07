<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChangeRequest extends Model
{
    protected $fillable = ['schedule_id','proposed_schedule_id','status'];
}
