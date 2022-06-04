<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->insert([
            [
                'name' => 'John Doe',
                'course' => 'Pro Player',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Stephen Hawking',
                'course' => 'Fisicals',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lara Vel',
                'course' => 'Programming',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
