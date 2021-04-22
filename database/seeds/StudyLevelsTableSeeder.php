<?php

use App\StudyLevel;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
         foreach (range(0,6) as $index) {
         	$name = array('NTA 4', 'NTA 5', 'NTA 6', 'UQF 6', 'UQF 7A', 'UQF 7B', 'UQF 8');
             DB::table('study_levels')->insert([
                'name' => $name[$index]
             ]);
         }
    }
}
