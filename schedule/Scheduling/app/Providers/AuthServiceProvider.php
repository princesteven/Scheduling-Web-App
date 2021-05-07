<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        // Check Admin
        // Return true if auth user is admin
        $gate->define('admin', function($user){
            return $user->privilage == 'admin';
        });

        // Check Student
        // Return true if auth user is student
        $gate->define('student', function($user){
            return $user->privilage == 'student';
        });

        // Check CR
        // Return true if auth user is CR
        $gate->define('cr', function($user){
            return $user->privilage == 'cr';
        });

        // Check HOD
        // Return true if auth user is HOD
        $gate->define('hod', function($user){
            return $user->privilage == 'hod';
        });

        // Check Timetable Member
        // Return true if auth user is Timetable Member
        $gate->define('timetable', function($user){
            return $user->privilage == 'timetable';
        });

        // Check faculty
        // Return true if auth user is faculty
        $gate->define('faculty', function($user){
            return $user->privilage == 'faculty';
        });

        // Check if user category is student
        // Return true if auth user category is student
        $gate->define('student_category', function($user){
            return $user->category_id == '1';
        });
    }
}
