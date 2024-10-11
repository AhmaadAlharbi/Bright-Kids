<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'child_name'        => $this->faker->name,
            'father_name'       => $this->faker->name,
            'mother_name'       => $this->faker->name,
            'dob'               => $this->faker->date('Y-m-d', 'now'),
            'mother_phone'      => $this->faker->phoneNumber,
            'father_phone'      => $this->faker->phoneNumber,
            'mother_workplace'  => $this->faker->company,
            'father_workplace'  => $this->faker->company,
            'branch'            => $this->faker->word, // You can replace this with actual branch names
            'visit_date_time'   => $this->faker->dateTimeBetween('+1 week', '+1 month'),
        ];
    }
}