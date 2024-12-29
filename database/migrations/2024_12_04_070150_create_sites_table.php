<?php

use App\Models\Provinces;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Provinces::class)->references('id')->on('provinces')->onDelete('cascade');
            $table->string('site_name', 255);
            $table->string('site_manager', 255)->nullable();
            $table->text('site_manager_contact_Details')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
