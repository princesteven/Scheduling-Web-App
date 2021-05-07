<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call([
	        CategoriesTableSeeder::class,
	        CoursesTableSeeder::class,
	        DaysTableSeeder::class,
	        DepartmentsTableSeeder::class,
	        RanksTableSeeder::class,
	        SemestersTableSeeder::class,
	        StudyLevelsTableSeeder::class,
	        StudyYearsTableSeeder::class,
	        SubjectsTableSeeder::class,
	        TimeTableSeeder::class,
	        UnitsTableSeeder::class,
	        VenuesTableSeeder::class,
	        WingsTableSeeder::class,
	        YearSemestersTableSeeder::class,
	        UsersTableSeeder::class,
	        SchedulesTableSeeder::class,
    	]);
    }
}
