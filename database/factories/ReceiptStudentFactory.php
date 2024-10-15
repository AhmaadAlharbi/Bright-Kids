<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ReceiptStudent>
 */
class ReceiptStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'student_id' => Student::factory(),
            'Debit' => $this->faker->randomFloat(2, 0, 1000), // Adjust the range as needed
            'description' => $this->faker->sentence(),
        ];
    }
}
