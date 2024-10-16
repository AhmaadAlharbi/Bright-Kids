<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(AppointmentSeeder::class);
        $this->call(ContactMessageSeeder::class);
        $this->call(ParentsSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(FeeTypeSeeder::class);
        $this->call(FeesTableSeeder::class);
        // $this->call(FeeInvoiceSeeder::class);
        // $this->call(StudentAccountSeeder::class);
        // $this->call(FundAccountSeeder::class);
        // $this->call(ReceiptStudentSeeder::class);
    }
}