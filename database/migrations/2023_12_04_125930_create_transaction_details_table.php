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
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 16, 2);
            $table->integer('qty');
            $table->unsignedBigInteger('transactions_id');
            $table->unsignedBigInteger('products_id');
            $table->timestamps();

            $table->foreign('transactions_id')->references('id')->on('transactions');
            $table->foreign('products_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
