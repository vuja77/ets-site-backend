<?php


namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CourseProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_professors')->insert([
            ['id' => 1, 'professor_id' => 1, "course_id" => 1],
            ['id' => 2, 'professor_id' => 1, "course_id" => 2],
            ['id' => 3, 'professor_id' => 1, "course_id" => 3],
            ['id' => 4, 'professor_id' => 1, "course_id" => 4],
            ['id' => 5, 'professor_id' => 1, "course_id" => 5],
           
        ]);
    }
}

