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
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete();
            $table->string('student_code')->unique();
            $table->string('seat_number')->nullable();
            $table->enum('academic_year', ['first', 'second', 'third']);
            $table->enum('section', ['scientific', 'literature']);
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female']);
            $table->string('guardian_phone')->nullable();
            $table->boolean('is_banned')->default(false);
            $table->timestamp('ban_until')->nullable();
            $table->text('ban_reason')->nullable();
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
