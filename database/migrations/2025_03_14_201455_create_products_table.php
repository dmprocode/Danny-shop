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
            $table->string('name', 255)->unique();
            $table->string('image')->nullable();
            $table->string('category', 100);
            $table->decimal('buying_price', 10, 2);
            $table->string('number_carton'); 
            $table->integer('number_dozen')->nullable();
            $table->decimal('price_per_dozen', 10, 2)->nullable();
            $table->integer('number_of_set')->nullable();
            $table->integer('number_pieces')->nullable();
            $table->string('measerments'); 
            $table->decimal('price_per_set', 10, 2)->nullable();
            $table->decimal('selling_price_per_piece', 10, 2)->nullable();
            $table->decimal('selling_price_per_dozen', 10, 2)->nullable();
            $table->decimal('price_per_item', 10, 2)->nullable();
            $table->string('color', 50)->nullable();
            $table->string('size', 50)->nullable();
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
