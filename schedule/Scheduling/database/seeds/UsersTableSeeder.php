<?php

use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create();
         foreach (range(1,50) as $index) {
             DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'regno' => $faker->unique()->creditCardNumber,
                'mobile' => $faker->unique()->randomNumber.'423',
                'gender' => 'Female',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'rank_id' => $faker->numberBetween(1,5),
                'category_id' => $faker->numberBetween(1,2),
                'study_level_id' => $faker->numberBetween(1,7),
                'dpt_id' => $faker->numberBetween(1,4),
                'course_id' => $faker->numberBetween(1,4),
                'privilage' => 'student',
             ]);
         }
    }
}
