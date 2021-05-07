<?php

use App\Semester;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemestersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
         foreach (range(0,1) as $index) {
         	$name = array('I', 'II');
             DB::table('semesters')->insert([
                'name' => $name[$index]
             ]);
         }
    }
}
