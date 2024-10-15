<?php

namespace Database\Factories;

use App\Models\Fee;
use App\Models\Level;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeeInvoice>
 */
class FeeInvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_date' => $this->faker->date,
            'student_id' => Student::factory(),
            'level_id' => Level::factory(),
            'classroom_id' => Classroom::factory(),
            'fee_id' => Fee::factory(),
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'description' => $this->faker->sentence,
        ];
    }
}
