<?php

namespace Database\Factories;

use App\Models\FeeType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeeType>
 */
class FeeTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = FeeType::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word . ' Fee',
            'description' => $this->faker->sentence,
            'is_recurring' => $this->faker->boolean(70), // 70% chance of being recurring
        ];
    }

    public function recurring()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_recurring' => true,
            ];
        });
    }

    public function nonRecurring()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_recurring' => false,
            ];
        });
    }
}
