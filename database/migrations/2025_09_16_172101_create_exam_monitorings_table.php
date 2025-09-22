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
        Schema::create('exam_monitorings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')->constrained('exam_sessions')->cascadeOnDelete();
            $table->string('event_type');
            $table->json('event_data')->nullable();
            $table->string('ip_address')->nullable();
            $table->dateTime('event_timestamp');
            $table->enum('severity_level', ['info', 'warning', 'critical']);
            $table->boolean('requires_action')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_monitoring');
    }
};
