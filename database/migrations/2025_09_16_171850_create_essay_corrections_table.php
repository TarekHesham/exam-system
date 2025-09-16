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
        Schema::create('essay_corrections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('answer_id')->constrained('student_answers')->cascadeOnDelete();
            $table->foreignId('corrected_by')->constrained('teachers')->cascadeOnNull();
            $table->integer('score_awarded');
            $table->text('correction_notes')->nullable();
            $table->text('correction_criteria')->nullable();
            $table->boolean('is_final')->default(false);
            $table->dateTime('corrected_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('essay_corrections');
    }
};
