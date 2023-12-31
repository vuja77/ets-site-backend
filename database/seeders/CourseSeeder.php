<?php


namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('courses')->insert([
            ['id' => 1, 'name' => 'Working for home', "course_type_id" => 2],
            ['id' => 2, 'name' => 'Vibrant orange', "course_type_id" => 2],
            ['id' => 3, 'name' => 'Leading Remote Teams ', "course_type_id" => 2],
            ['id' => 4, 'name' => 'New course', "course_type_id" => 1],
            ['id' => 5, 'name' => 'Test course', "course_type_id" => 2],
         
        ]);
    }
}
