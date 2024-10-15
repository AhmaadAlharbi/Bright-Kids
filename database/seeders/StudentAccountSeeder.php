<?php

namespace Database\Seeders;

use App\Models\StudentAccount;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentAccount::factory()->count(100)->create();
    }
}
