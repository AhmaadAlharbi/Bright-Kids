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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('father_first_name', 50);
            $table->string('father_last_name', 50);
            $table->string('father_occupation', 100);
            $table->string('father_phone', 20);
            $table->string('father_email', 100);
            $table->string('mother_first_name', 50);
            $table->string('mother_last_name', 50);
            $table->string('mother_occupation', 100);
            $table->string('mother_phone', 20);
            $table->string('mother_email', 100);
            $table->text('home_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};