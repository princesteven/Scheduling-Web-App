<?php

use App\StudyYear;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyYearsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
             DB::table('study_years')->insert([
                'year' => '2018-0219',
                'status' => 'active',
             ]);
    }
}
