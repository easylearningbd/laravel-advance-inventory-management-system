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
        Schema::create('sale_returns', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('warehouse_id');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('discount', 10 , 2)->default(0.00);
            $table->decimal('shipping', 10 , 2)->default(0.00);
            $table->enum('status', ['Return','Pending','Ordered'])->default('Pending');
            $table->text('note')->nullable();
            $table->decimal('grand_total', 15 , 2);
            $table->decimal('paid_amount', 10 , 2)->default(0);
            $table->decimal('due_amount', 10 , 2)->default(0);
            $table->decimal('full_paid')->nullable();
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('ware_houses')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_returns');
    }
};
