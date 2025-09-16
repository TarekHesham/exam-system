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
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subject_id')->constrained()->cascadeOnDelete();
            $table->foreignId('created_by')->constrained('teachers')->cascadeOnDelete();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('exam_type', ['practice', 'final']);
            $table->enum('academic_year', ['first', 'second', 'third']);
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->integer('duration_minutes');
            $table->integer('total_score');
            $table->boolean('allow_late_entry')->default(false);
            $table->integer('late_entry_limit_minutes')->nullable();
            $table->integer('minimum_battery_percentage')->nullable();
            $table->boolean('require_video_recording')->default(false);
            $table->boolean('is_published')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exams');
    }
};
