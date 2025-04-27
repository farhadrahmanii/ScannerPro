<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('site_id')->constrained('sites')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('driver_id')->constrained('drivers')->onDelete('cascade'); // Foreign Key
            $table->string('vehicle_make', 255);
            $table->string('vehicle_model', 255);
            $table->string('year', 255);
            $table->string('capacity', 255);
            $table->string('type', 255);
            $table->integer('plate_number');
            $table->string('vin', 255);
            $table->string('colour', 255);
            $table->string('extended_body_type', 255);
            $table->bigInteger('system_code')->default(0);
            $table->timestamps();
            $table->softDeletes(); // Add soft delete column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
