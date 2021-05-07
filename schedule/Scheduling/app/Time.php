<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = ['start_time', 'end_time', 'days'];

    public function scopeGetDays($query)
    {
    	return $query;
    }

    public function scopeReturnAllDays($query)
    {
    	$mondays = $this->scopeGetDays($query)->orderBy('start_time', 'asc')->where('days', 'monday')->get();
		$tuesdays = $this->scopeGetDays($query)->orderBy('start_time', 'asc')->where('days', 'tuesday')->get();
		$wednesdays = $this->scopeGetDays($query)->orderBy('start_time', 'asc')->where('days', 'wednesday')->get();
		$thursdays = $this->scopeGetDays($query)->orderBy('start_time', 'asc')->where('days', 'thursday')->get();
		$fridays = $this->scopeGetDays($query)->orderBy('start_time', 'asc')->where('days', 'friday')->get();
    }
}

		/*$indices = array();
		foreach (range(0,count($mondays) - 1) as $index) {
			$indices[$index] = array(
									'monday' => $mondays[$index], 
									'tuesday' => $tuesdays[$index], 
									'wednesday' => $wednesdays[$index], 
									'thursday' => $thursdays[$index], 
									'friday' => $fridays[$index]
								);
		}
			return $indices;*/

/*$mon = Schedule::rightJoin('times', function($join){
					     		$join->on('times.id', 'time_id')
					     			 ->where('schedules.study_level_id', '1');
					     	})
     						->leftJoin('users', 'users.id', 'user_id')
     						->leftJoin('subjects', 'subjects.id', 'subject_id')
     						->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
     						->leftJoin('venues', 'venues.id', 'venue_id')
     						->leftJoin('departments', 'departments.id', 'department_id')
     						->where('days', 'monday')
     						->select('time_id', 'schedules.id as schedules_id', 'times.start_time', 'times.end_time', 'times.days', 'users.name as user_name', 'subjects.name as subject_name', 'subjects.code as subject_code', 'study_levels.name as study_level_name', 'venues.name as venue_name', 'departments.name as department_name')
     						->orderBy('start_time', 'asc')
     						->orderByRaw(\DB::raw("FIELD(days, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
     						->get();*/

     	/*$tue = Schedule::rightJoin('times', function($join){
					     		$join->on('times.id', 'time_id')
					     			 ->where('schedules.study_level_id', '1');
					     	})
     						->leftJoin('users', 'users.id', 'user_id')
     						->leftJoin('subjects', 'subjects.id', 'subject_id')
     						->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
     						->leftJoin('venues', 'venues.id', 'venue_id')
     						->leftJoin('departments', 'departments.id', 'department_id')
     						->where('days', 'tuesday')
     						->select('time_id', 'schedules.id as schedules_id', 'times.start_time', 'times.end_time', 'times.days', 'users.name as user_name', 'subjects.name as subject_name', 'subjects.code as subject_code', 'study_levels.name as study_level_name', 'venues.name as venue_name', 'departments.name as department_name')
     						->orderBy('start_time', 'asc')
     						->orderByRaw(\DB::raw("FIELD(days, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
     						->get();

     	$wed = Schedule::rightJoin('times', function($join){
					     		$join->on('times.id', 'time_id')
					     			 ->where('schedules.study_level_id', '1');
					     	})
     						->leftJoin('users', 'users.id', 'user_id')
     						->leftJoin('subjects', 'subjects.id', 'subject_id')
     						->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
     						->leftJoin('venues', 'venues.id', 'venue_id')
     						->leftJoin('departments', 'departments.id', 'department_id')
     						->where('days', 'Wednesday')
     						->select('time_id', 'schedules.id as schedules_id', 'times.start_time', 'times.end_time', 'times.days', 'users.name as user_name', 'subjects.name as subject_name', 'subjects.code as subject_code', 'study_levels.name as study_level_name', 'venues.name as venue_name', 'departments.name as department_name')
     						->orderBy('start_time', 'asc')
     						->orderByRaw(\DB::raw("FIELD(days, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
     						->get();

     	$thu = Schedule::rightJoin('times', function($join){
					     		$join->on('times.id', 'time_id')
					     			 ->where('schedules.study_level_id', '1');
					     	})
     						->leftJoin('users', 'users.id', 'user_id')
     						->leftJoin('subjects', 'subjects.id', 'subject_id')
     						->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
     						->leftJoin('venues', 'venues.id', 'venue_id')
     						->leftJoin('departments', 'departments.id', 'department_id')
     						->where('days', 'Thursday')
     						->select('time_id', 'schedules.id as schedules_id', 'times.start_time', 'times.end_time', 'times.days', 'users.name as user_name', 'subjects.name as subject_name', 'subjects.code as subject_code', 'study_levels.name as study_level_name', 'venues.name as venue_name', 'departments.name as department_name')
     						->orderBy('start_time', 'asc')
     						->orderByRaw(\DB::raw("FIELD(days, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
     						->get();

     	$fri = Schedule::rightJoin('times', function($join){
					     		$join->on('times.id', 'time_id')
					     			 ->where('schedules.study_level_id', '1');
					     	})
     						->leftJoin('users', 'users.id', 'user_id')
     						->leftJoin('subjects', 'subjects.id', 'subject_id')
     						->leftJoin('study_levels', 'study_levels.id', 'schedules.study_level_id')
     						->leftJoin('venues', 'venues.id', 'venue_id')
     						->leftJoin('departments', 'departments.id', 'department_id')
     						->where('days', 'Friday')
     						->select('time_id', 'schedules.id as schedules_id', 'times.start_time', 'times.end_time', 'times.days', 'users.name as user_name', 'subjects.name as subject_name', 'subjects.code as subject_code', 'study_levels.name as study_level_name', 'venues.name as venue_name', 'departments.name as department_name')
     						->orderBy('start_time', 'asc')
     						->orderByRaw(\DB::raw("FIELD(days, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday')"))
     						->get();*/