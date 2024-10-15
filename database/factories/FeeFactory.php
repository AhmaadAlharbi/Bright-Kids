<?php

namespace Database\Factories;

use App\Models\Fee;
use App\Models\FeeType;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fee>
 */
class FeeFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'description' => $this->faker->sentence,
            'year' => $this->faker->year,
        ];
    }
}
