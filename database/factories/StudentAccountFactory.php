<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\FeeInvoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StudentAccount>
 */
class StudentAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date,
            'type' => $this->faker->randomElement(['invoice', 'payment']),
            'fee_invoice_id' => FeeInvoice::factory(),
            'student_id' => Student::factory(),
            'Debit' => $this->faker->randomFloat(2, 0, 1000),
            'credit' => $this->faker->randomFloat(2, 0, 1000),
            'description' => $this->faker->sentence,
        ];
    }
}
