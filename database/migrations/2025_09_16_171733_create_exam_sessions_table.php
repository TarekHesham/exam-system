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
        Schema::create('exam_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_id')->constrained()->cascadeOnDelete();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete();
            $table->string('session_token')->unique();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('submitted_at')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('device_info')->nullable();
            $table->json('browser_info')->nullable();
            $table->enum('session_status', ['not_started', 'in_progress', 'submitted', 'cancelled', 'expired']);
            $table->integer('battery_level_at_start')->nullable();
            $table->boolean('video_recorded')->default(false);
            $table->string('video_file_path')->nullable();
            $table->text('session_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_sessions');
    }
};
