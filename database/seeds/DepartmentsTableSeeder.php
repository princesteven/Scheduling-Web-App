<?php

use App\Department;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsTableSeeder extends Seeder
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
         	$name = array('Computer Department', 'Mechanical Department', 'Civil Department', 'Medicine Department', 'Medicine Department');
         	$code = array('ICT', 'MECH', 'CIVIL', 'MED', 'MED');
             DB::table('departments')->insert([
                'name' => $name[$index],
                'code' => $name[$index],
                'user_id' => $faker->numberBetween(1,6),
             ]);
         }
    }
}
