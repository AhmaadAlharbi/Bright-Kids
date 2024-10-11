<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Parents>
 */
class ParentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'father_first_name' => $this->faker->firstName('male'),
            'father_last_name' => $this->faker->lastName,
            'father_occupation' => $this->faker->jobTitle,
            'father_phone' => $this->faker->phoneNumber,
            'father_email' => $this->faker->unique()->safeEmail,
            'mother_first_name' => $this->faker->firstName('female'),
            'mother_last_name' => $this->faker->lastName,
            'mother_occupation' => $this->faker->jobTitle,
            'mother_phone' => $this->faker->phoneNumber,
            'mother_email' => $this->faker->unique()->safeEmail,
            'home_address' => $this->faker->address,
        ];
    }
}