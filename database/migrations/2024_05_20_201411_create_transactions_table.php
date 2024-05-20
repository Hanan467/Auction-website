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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->foreignId('bid_id')->references('id')->on('bids')->onDelete('cascade');
            $table->foreignId('bidbidder_id')->references('id')->on('bidbidders')->onDelete('cascade');
            $table->boolean('payment_status');
            $table->decimal('payment_amount');
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
