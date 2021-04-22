<?php

use App\Rank;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RanksTableSeeder extends Seeder
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
         	$name = array('Tutor', 'Ass. Lecture I', 'Ass. Lecture II', 'Professor', 'Doctor');
             DB::table('ranks')->insert([
                'name' => $name[$index]
             ]);
         }
    }
}
