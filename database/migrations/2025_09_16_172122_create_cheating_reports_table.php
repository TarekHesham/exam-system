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
        Schema::create('cheating_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->constrained('exam_sessions')->cascadeOnDelete();
            $table->foreignId('reported_by')->constrained('teachers')->cascadeOnDelete();
            $table->enum('violation_type', ['ip_change', 'screen_sharing', 'unauthorized_app', 'suspicious_behavior', 'other']);
            $table->text('description')->nullable();
            $table->json('evidence_data')->nullable();
            $table->string('evidence_file_path')->nullable();
            $table->enum('report_status', ['reported', 'investigating', 'confirmed', 'dismissed'])->default('reported');
            $table->foreignId('investigated_by')->nullable()->constrained('teachers')->nullOnDelete();
            $table->text('investigation_notes')->nullable();
            $table->dateTime('reported_at')->nullable();
            $table->dateTime('investigated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheating_reports');
    }
};
