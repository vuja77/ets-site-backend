<?php


namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CourseTakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_takers')->insert([
            ['class_id' => 1, "course_id" => 1],
            ['class_id' => 1, "course_id" => 2],
            ['class_id' => 1, "course_id" => 3],
            ['class_id' => 1, "course_id" => 4],
            ['class_id' => 1, "course_id" => 5],
           
        ]);
    }
}

