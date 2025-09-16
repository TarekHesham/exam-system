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
        Schema::create('jamming_devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('school_id')->constrained()->cascadeOnDelete();
            $table->string('device_serial')->unique();
            $table->string('device_model');
            $table->enum('device_status', ['active', 'inactive', 'maintenance']);
            $table->decimal('coverage_radius_meters', 8, 2)->nullable();
            $table->string('location_description')->nullable();
            $table->dateTime('last_maintenance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamming_devices');
    }
};
