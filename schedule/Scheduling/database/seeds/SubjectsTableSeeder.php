<?php

use App\Subject;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
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
         	$name = array('Calculus', 'Programming in C', 'Differential Equations', 'Java', 'Python', 'PHP', 'Networking');
             DB::table('subjects')->insert([
                'course_id' => $faker->numberBetween(1,4),
                'name' => $name[$index],
                'code' => $faker->numberBetween(1,7),
                'unit_id' => $faker->numberBetween(1,3),
                'semester_id' => '1',
                'study_level_id' => $faker->numberBetween(1,7),
             ]);
         }
    }
}
