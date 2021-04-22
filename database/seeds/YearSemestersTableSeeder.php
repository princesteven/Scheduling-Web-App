<?php

use App\YearSemester;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class YearSemestersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
             DB::table('year_semesters')->insert([
                'study_year_id' => '1',
                'semester_id' => '1',
             ]);
    }
}
