<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'rank_id', 'study_level_id', 'dpt_id', 'course_id', 'regno', 'gender', 'privilage', 'mobile', 'category_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeGetFaculties($query)
    {
        return $query->whereRaw('privilage IN ("hod", "faculty", "admin", "timetabler")')
                        ->join('ranks', 'ranks.id', 'users.rank_id')
                        ->join('categories', 'categories.id', 'users.category_id')
                        ->join('departments', 'departments.id', 'users.dpt_id')
                        ->select('users.*', 'ranks.name as r_name', 'ranks.id as r_id', 'categories.name as c_name', 'departments.name as d_name', 'departments.id as d_id');
                        
    }

    public function scopeStudentPopulation($query, $course, $study_level)
    {
        return $query->join('categories', 'categories.id', 'users.category_id')
                    ->join('courses', 'courses.id', 'users.course_id')
                    ->join('study_levels', 'study_levels.id', 'users.study_level_id')
                    ->where('categories.name', 'student')
                    ->where('courses.id', $course)
                    ->where('study_levels.id', $study_level)
                    ->count();
    }
}
