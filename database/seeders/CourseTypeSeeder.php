<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('course_types')->insert([
            ['id' => 1, 'name' => 'Stručni'],
            ['id' => 2, 'name' => 'Opšti'],
         
        ]);
    }
}
