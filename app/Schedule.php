<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['time_id', 'day_id', 'user_id', 'subject_id', 'year_semester_id', 'study_level_id', 'department_id', 'venue_id', 'course_id', 'status'];
    public function scopePeriodsDue($query)
    {
        // $current_day = date('l', strtotime('today'));
        // $now = Carbon::now()->subHours(48);
        // $now_time = $now->format("H:i");
        // $inTenMinutes = $now->addMinutes(10)
        //                     ->format("H:i");
        $now_time = date('H:i', strtotime('08:05'));
        $inTenMinutes = date('H:i', strtotime('08:15'));
        return $query->rightJoin('times','times.id','schedules.time_id')
                     ->rightJoin('subjects','subjects.id','schedules.subject_id')
                     ->rightJoin("venues","venues.id","schedules.venue_id")
                     ->select('start_time','end_time','department_id','schedules.study_level_id','schedules.course_id',"subjects.name as subject_name","venues.name as venue_name", "schedules.status")
                     ->where('schedules.status', null)
                     ->where('start_time', '>', $now_time)
                     ->where('start_time', $inTenMinutes)
                     ->where('days','monday'); //current_day
    }
    public function scopePeriods($query)
    {
       
        return $query->rightJoin('times','times.id','schedules.time_id')
                     ->rightJoin('subjects','subjects.id','schedules.subject_id')
                     ->take(5);
    }
}