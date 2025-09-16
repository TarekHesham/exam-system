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
        Schema::create('appeals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->cascadeOnDelete();
            $table->foreignId('exam_result_id')->constrained()->cascadeOnDelete();
            $table->text('appeal_reason');
            $table->text('supporting_evidence')->nullable();
            $table->string('video_evidence_path')->nullable();
            $table->decimal('appeal_fee_paid', 10, 2)->default(0);
            $table->enum('appeal_status', ['submitted', 'under_review', 'approved', 'rejected'])->default('submitted');
            $table->foreignId('reviewed_by')->nullable()->constrained('teachers')->nullOnDelete();
            $table->text('review_notes')->nullable();
            $table->dateTime('submitted_at')->nullable();
            $table->dateTime('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appeals');
    }
};
