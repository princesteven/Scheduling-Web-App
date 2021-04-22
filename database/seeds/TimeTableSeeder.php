<?php

use App\Time;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         	$start_time = array('07:30', '08:15', '09:00', '09:55', '10:40', '11:25', '13:25 PM');
         	$end_time = array('08:15', '09:00', '09:45', '10:40', '11:25', '12:10', '14:10');
         	$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');
         	foreach (range(0, 4) as $day) {
         		foreach (range(0, 6) as $time) {
         			 DB::table('times')->insert([
                     'start_time' => $start_time[$time],
                     'end_time' => $end_time[$time],
                    'days' => $days[$day],
                   ]);
         		}
         	}
            
    }
}
