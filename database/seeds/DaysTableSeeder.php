<?php

use App\Day;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         foreach (range(0,4) as $index) {
         	$name = array('Monday', 'Tuesday', 'Wednesday', 'Thursday','Friday');
             DB::table('days')->insert([
                'day' => $name[$index],
             ]);
         }
    }
}
