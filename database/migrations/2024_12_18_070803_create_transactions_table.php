<?php

use App\Models\Category;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('vehicle_id')->constrained('vehicles')->cascadeOnDelete();
            $table->string('goods_id', 255);
            $table->string('transaction_id', 255);
            $table->string('bill_of_landing', 255);
            $table->string('exporting_country', 255);
            $table->string('production_origin', 255)->nullable();
            $table->string('item_name', 255);
            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->string('total_tonnage', 255);
            $table->string('number_of_items', 255);
            $table->string('consignee_company', 255);
            $table->string('consignee_company_tin', 255);
            $table->string('item_list', 255);
            $table->string('delivery_location', 255);
            $table->boolean('scan_status')->default(false);
            $table->timestamp('scan_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
