<?php

use App\Schedule;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  
             DB::table('schedules')->insert([
                'time_id' => 1,
                'day_id' => 1,
                 'user_id' => 2,
                 'subject_id' => 1,
                 'year_semester_id' => 1,
                 'study_level_id' => 1,
                 'department_id' => 1,
                 'venue_id' => 1,
             ]);
             DB::table('schedules')->insert([
                'time_id' => 2,
                'day_id' => 1,
                 'user_id' => 2,
                 'subject_id' => 1,
                 'year_semester_id' => 1,
                 'study_level_id' => 1,
                 'department_id' => 1,
                 'venue_id' => 1,
             ]);
              DB::table('schedules')->insert([
                'time_id' => 3,
                'day_id' => 1,
                 'user_id' => 2,
                 'subject_id' => 1,
                 'year_semester_id' => 1,
                 'study_level_id' => 1,
                 'department_id' => 1,
                 'venue_id' => 1,
             ]);
              DB::table('schedules')->insert([
                'time_id' => 4,
                'day_id' => 1,
                 'user_id' => 4,
                 'subject_id' => 4,
                 'year_semester_id' => 1,
                 'study_level_id' => 2,
                 'department_id' => 1,
                 'venue_id' => 1,
             ]);

             DB::table('schedules')->insert([
                'time_id' => 5,
                'day_id' => 1,
                 'user_id' => 4,
                 'subject_id' => 4,
                 'year_semester_id' => 1,
                 'study_level_id' => 2,
                 'department_id' => 1,
                 'venue_id' => 1,
             ]);
              DB::table('schedules')->insert([
                'time_id' => 6,
                'day_id' => 1,
                 'user_id' => 7,
                 'subject_id' => 3,
                 'year_semester_id' => 1,
                 'study_level_id' => 2,
                 'department_id' => 1,
                 'venue_id' => 1,
             ]);
              DB::table('schedules')->insert([
                'time_id' => 7,
                'day_id' => 1,
                 'user_id' => 2,
                 'subject_id' => 6,
                 'year_semester_id' => 1,
                 'study_level_id' => 2,
                 'department_id' => 1,
                 'venue_id' => 1,
             ]);
             
    }
}
