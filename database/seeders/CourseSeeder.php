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
            ['id' => 1, 'name' => 'Matematika', "course_type_id" => 2],
            ['id' => 2, 'name' => 'CSBH', "course_type_id" => 2],
            ['id' => 3, 'name' => 'Engleski', "course_type_id" => 2],
            ['id' => 4, 'name' => 'Programiranje', "course_type_id" => 1],
            ['id' => 5, 'name' => 'Fizicko', "course_type_id" => 2],
         
        ]);
    }
}
