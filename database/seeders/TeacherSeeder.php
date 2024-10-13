<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = Teacher::factory()->count(10)->create();
        Classroom::all()->each(function ($classroom) use ($teachers) {
            $classroom->teachers()->attach(
                $teachers->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
