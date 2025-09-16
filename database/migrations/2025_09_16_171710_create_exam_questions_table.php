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
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained()->cascadeOnDelete();
            $table->text('question_text');
            $table->text('question_image')->nullable();
            $table->enum('question_type', ['multiple_choice', 'essay', 'true_false', 'fill_blank']);
            $table->json('options')->nullable();
            $table->text('correct_answer')->nullable();
            $table->integer('points');
            $table->integer('order_number');
            $table->boolean('is_required')->default(true);
            $table->text('help_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_questions');
    }
};
