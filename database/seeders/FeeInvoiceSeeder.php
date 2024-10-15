<?php

namespace Database\Seeders;

use App\Models\FeeInvoice;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeeInvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeeInvoice::factory()->count(50)->create();
    }
}
