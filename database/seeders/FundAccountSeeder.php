<?php

namespace Database\Seeders;

use App\Models\FundAccount;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FundAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        FundAccount::factory()->count(30)->create();
    }
}