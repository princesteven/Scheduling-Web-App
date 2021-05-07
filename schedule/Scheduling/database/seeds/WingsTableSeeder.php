<?php

use App\Wing;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
         foreach (range(1,6) as $index) {
             DB::table('wings')->insert([
                'name' => $faker->name,
             ]);
         }
    }
}
