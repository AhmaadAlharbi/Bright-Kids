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
        // Create some predefined fee types with amounts
        $predefinedTypes = [
            ['name' => 'Tuition Fee', 'description' => 'Monthly tuition fee', 'is_recurring' => true, 'amount' => 300.00],
            ['name' => 'Registration Fee', 'description' => 'One-time registration fee', 'is_recurring' => false, 'amount' => 150.00],
            ['name' => 'Meal Plan', 'description' => 'Monthly meal plan fee', 'is_recurring' => true, 'amount' => 200.00],
            ['name' => 'Transportation Fee', 'description' => 'Monthly transportation fee', 'is_recurring' => true, 'amount' => 100.00],
            ['name' => 'Book Fee', 'description' => 'Annual book and supplies fee', 'is_recurring' => false, 'amount' => 50.00],
        ];

        foreach ($predefinedTypes as $type) {
            FeeType::create($type);
        }

        // Create some random fee types with random amounts
        FeeType::factory()->count(5)->create();

        $this->command->info('Fee types seeded successfully!');
    }
}
