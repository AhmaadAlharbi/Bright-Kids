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
    protected $model = Fee::class;

    public function definition()
    {
        $totalAmount = $this->faker->randomFloat(2, 50, 1000);
        $paidAmount = $this->faker->randomFloat(2, 0, $totalAmount);
        $remainingAmount = $totalAmount - $paidAmount;

        $dueDate = $this->faker->dateTimeBetween('now', '+6 months');
        $startDate = $this->faker->dateTimeBetween('-3 months', 'now');
        $endDate = $this->faker->dateTimeBetween($startDate, '+6 months');

        return [
            'student_id' => Student::factory(),
            'fee_type_id' => FeeType::factory(),
            'total_amount' => $totalAmount,
            'paid_amount' => $paidAmount,
            'remaining_amount' => $remainingAmount,
            'due_date' => $dueDate,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => $this->faker->randomElement(['paid', 'partial', 'unpaid']),
        ];
    }

    public function paid()
    {
        return $this->state(function (array $attributes) {
            return [
                'paid_amount' => $attributes['total_amount'],
                'remaining_amount' => 0,
                'status' => 'paid',
            ];
        });
    }

    public function unpaid()
    {
        return $this->state(function (array $attributes) {
            return [
                'paid_amount' => 0,
                'remaining_amount' => $attributes['total_amount'],
                'status' => 'unpaid',
            ];
        });
    }

    public function forStudent(Student $student)
    {
        return $this->state(function (array $attributes) use ($student) {
            return [
                'student_id' => $student->id,
            ];
        });
    }

    public function forFeeType(FeeType $feeType)
    {
        return $this->state(function (array $attributes) use ($feeType) {
            return [
                'fee_type_id' => $feeType->id,
            ];
        });
    }
}
