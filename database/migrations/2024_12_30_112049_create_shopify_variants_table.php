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
        Schema::create('shopify_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('shopify_products')->onDelete('cascade');
            $table->string('shopify_variant_id');
            $table->string('title');
            $table->decimal('price', 10, 2);
            $table->string('sku')->nullable();
            $table->integer('inventory_quantity')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopify_variants');
    }
};
