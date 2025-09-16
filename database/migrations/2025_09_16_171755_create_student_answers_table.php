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
        Schema::create('student_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->constrained('exam_sessions')->cascadeOnNull();
            $table->foreignId('question_id')->constrained('exam_questions')->cascadeOnDelete();
            $table->text('answer_text')->nullable();
            $table->text('answer_image')->nullable();
            $table->json('answer_data')->nullable();
            $table->boolean('is_flagged')->default(false);
            $table->dateTime('answered_at')->nullable();
            $table->integer('time_spent_seconds')->nullable();
            $table->boolean('needs_review')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_answers');
    }
};
