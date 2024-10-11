<?php

namespace Database\Factories;

use App\Models\Student;
use App\Models\Parents;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'parents_id' => Parents::factory(),
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'date_of_birth' => $this->faker->date('Y-m-d', '-5 years'),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'grade' => $this->faker->randomElement(['1st', '2nd', '3rd', '4th', '5th', '6th']),
            'enrollment_date' => $this->faker->date('Y-m-d', 'now'),
            'profile_picture' => $this->faker->imageUrl(200, 200, 'people'),
            'address' => $this->faker->address,
            'medical_info' => $this->faker->paragraph,
            'notes' => $this->faker->sentence,
        ];
    }
}