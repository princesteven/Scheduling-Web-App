<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'regno' => $faker->unique()->creditCardNumber,
        'mobile' => $faker->unique()->randomDigit,
        'gender' => 'Female',
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'rank_id' => $faker->numberBetween(1,6),
        'category_id' => $faker->numberBetween(1,2),
        'study_level_id' => $faker->numberBetween(1,7),
        'department_id' => $faker->numberBetween(1,6),
        'course_id' => $faker->numberBetween(1,5),
        'privilege' => 'student',
    ];
});
