<?php

namespace Database\Seeders;

use App\Models\Level;
use App\Models\Classroom;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = Level::all();
        $levels->each(function ($level) {
            Classroom::factory()->count(3)->create(['level_id' => $level->id]);
        });
    }
}
