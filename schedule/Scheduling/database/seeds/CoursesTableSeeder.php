<?php

use App\Course;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
         foreach (range(0,4) as $index) {
         	$name = array('Computer Engineering', 'Mechanical Engineering', 'Civil Engineering', 'Medicine','Law');
         	$code = array('ICT', 'MECH', 'CIVIL', 'MED', 'LLB');
             DB::table('courses')->insert([
                'department_id' => $faker->numberBetween(1,6),
                'name' => $name[$index],
                'code' => $name[$index],
             ]);
         }
    }
}
