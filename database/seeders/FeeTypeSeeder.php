<?php

namespace Database\Seeders;

use App\Models\FeeType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some predefined fee types
        $predefinedTypes = [
            ['name' => 'Tuition Fee', 'description' => 'Monthly tuition fee', 'is_recurring' => true],
            ['name' => 'Registration Fee', 'description' => 'One-time registration fee', 'is_recurring' => false],
            ['name' => 'Meal Plan', 'description' => 'Monthly meal plan fee', 'is_recurring' => true],
            ['name' => 'Transportation Fee', 'description' => 'Monthly transportation fee', 'is_recurring' => true],
            ['name' => 'Book Fee', 'description' => 'Annual book and supplies fee', 'is_recurring' => false],
        ];

        foreach ($predefinedTypes as $type) {
            FeeType::create($type);
        }

        // Create some random fee types
        FeeType::factory()->count(5)->create();

        $this->command->info('Fee types seeded successfully!');
    }
}
