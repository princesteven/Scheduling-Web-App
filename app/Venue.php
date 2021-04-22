<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    protected $fillable = ['name', 'capacity', 'wing_id'];

    public function scopeUsedVenues($query)
    {
    	return $query->rightJoin('schedules','venues.id','schedules.venue_id')
    				->rightJoin('times','times.id','schedules.time_id');
    	             
    }

    public function scopeAllocatedLecturers($query)
    {
    	return $this->scopeUsedVenues($query)->rightJoin('users','users.id','schedules.user_id');

        /*return Schedule::rightJoin('users','users.id','schedules.user_id');*/
    }

    public function scopeAllocatedSubject($query)
    {
    	return $this->scopeAllocatedLecturers($query)->rightJoin('subjects','subjects.id','schedules.subject_id');

        /*return Schedule::rightJoin('subjects','subjects.id','schedules.subject_id');*/
    }

    public function scopeValidSubject($query)
    {
        return $this->scopeAllocatedSubject($query)->rightJoin('study_levels', 'subjects.study_level_id', 'study_levels.id');
    }
}
