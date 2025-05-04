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
        Schema::create('return_purchases', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('supplier_id');
            $table->decimal('discount', 10 , 2)->default(0.00);
            $table->decimal('shipping', 10 , 2)->default(0.00);
            $table->enum('status', ['Return','Pending','Ordered'])->default('Pending');
            $table->text('note')->nullable();
            $table->decimal('grand_total', 15 , 2);
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('ware_houses')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('return_purchases');
    }
};
