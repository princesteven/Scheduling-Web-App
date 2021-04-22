<?php

use App\Unit;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
         foreach (range(0,2) as $index) {
         	$name = array('12', '9', '6');
         	$periods_per_week = array('5', '4', '3');
             DB::table('units')->insert([
                'name' => $name[$index],
                'periods_per_week' => $periods_per_week[$index]
             ]);
         }
    }
}
