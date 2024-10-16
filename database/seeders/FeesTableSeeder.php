<?php

namespace Database\Seeders;

use App\Models\Fee;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Fee::factory()->count(10)->create();
    }
}
