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
        Schema::create('return_purchase_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('return_purchase_id');
            $table->unsignedBigInteger('product_id');
            $table->decimal('net_unit_cost', 10 , 2);
            $table->integer('stock');
            $table->integer('quantity');
            $table->decimal('discount', 10 , 2)->default(0.00);
            $table->decimal('subtotal', 10 , 2);
            $table->timestamps();

            $table->foreign('return_purchase_id')->references('id')->on('return_purchases')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_purchase_items');
    }
};
