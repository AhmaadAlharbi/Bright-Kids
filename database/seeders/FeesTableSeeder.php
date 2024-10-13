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
        // Ensure we have some students
        $studentCount = Student::count();
        if ($studentCount == 0) {
            $this->command->info('Creating some students first...');
            Student::factory()->count(20)->create();
            $studentCount = 20;
        }

        $this->command->info('Creating fees...');

        // Create 30% paid fees
        Fee::factory()->count(intval($studentCount * 0.3))->paid()->create();

        // Create 20% unpaid fees
        Fee::factory()->count(intval($studentCount * 0.2))->unpaid()->create();

        // Create 50% partially paid fees
        Fee::factory()->count(intval($studentCount * 0.5))->create();

        $this->command->info('Fees seeded successfully!');
    }
}
