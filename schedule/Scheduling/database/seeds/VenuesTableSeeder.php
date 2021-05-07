<?php

use App\Venue;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VenuesTableSeeder extends Seeder
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
             DB::table('venues')->insert([
                'wing_id' => $faker->numberBetween(1,6),
                'name' => $faker->name,
                'capacity' => $faker->randomNumber()
             ]);
         }
    }
}
