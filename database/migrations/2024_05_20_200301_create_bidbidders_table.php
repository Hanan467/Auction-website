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
        Schema::create('bidbidders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('bidder_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('bid_id')->references('id')->on('bids')->onDelete('cascade');
            $table->decimal('bid_amount');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bidbidders');
    }
};
