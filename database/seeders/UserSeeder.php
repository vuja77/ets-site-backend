<?php


namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ['id' => 1, 'first_name' => 'Danka', "last_name" => 'Danka', 'mail' => 'danka@gmail.com', 'password' => '$2y$10$zMGpoIZx9PM/QNZC/UEiyOHvbkqcW077ZZ71jJCM2016mtEqKCadK', 'gender' => 'Zenski', 'role_id' => 2],
            
           
        ]);
    }
}

