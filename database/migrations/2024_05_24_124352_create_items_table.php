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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('admin_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('seller_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->foreignId('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->float('bid_price');
            $table->string('condition');
            $table->string('image_path');
            $table->boolean('is_approved')->default(false);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
