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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('image')->nullable();
            $table->string('category'); 
            $table->decimal('price', 10, 2);
            $table->decimal('price_per_item', 10, 2)->nullable();
            $table->decimal('selling_price_per_item', 10, 2)->nullable();
            $table->integer('number_of_set')->nullable();
            $table->unsignedInteger('number_catton'); 
            $table->unsignedInteger('number_of_pieces');
            $table->string('classification')->nullable(); 
            $table->string('color')->nullable();
            $table->string('size')->nullable(); 
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
