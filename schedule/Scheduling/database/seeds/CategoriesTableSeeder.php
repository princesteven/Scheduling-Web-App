<?php

use App\Category;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
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
         	$name = array('student', 'academician');
             DB::table('categories')->insert([
                'name' => $name[$index],
             ]);
         }
    }
}
