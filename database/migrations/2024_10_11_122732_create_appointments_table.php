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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('child_name'); // Child's name
            $table->string('father_name'); // Father's name
            $table->string('mother_name'); // Mother's name
            $table->date('dob'); // Child's date of birth
            $table->string('mother_phone'); // Mother's phone number
            $table->string('father_phone'); // Father's phone number
            $table->string('mother_workplace'); // Mother's workplace
            $table->string('father_workplace'); // Father's workplace
            $table->string('branch'); // Branch of the school
            $table->dateTime('visit_date_time'); // Date and time of the visit
            $table->string('status')->default('uncompleted');
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};