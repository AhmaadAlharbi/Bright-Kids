<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parents_id')->constrained('parents')->onDelete('cascade');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('grade', 20);
            $table->foreignId('classroom_id')->constrained()->onDelete('cascade');
            $table->date('enrollment_date')->nullable();
            $table->string('profile_picture', 255)->nullable();
            $table->text('address')->nullable();
            $table->text('medical_info')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
