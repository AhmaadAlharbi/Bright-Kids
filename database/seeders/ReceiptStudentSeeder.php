<?php

namespace Database\Seeders;

use App\Models\ReceiptStudent;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ReceiptStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ReceiptStudent::factory()->count(50)->create();
    }
}
