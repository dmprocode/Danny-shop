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
        Schema::create('customer_product_expense', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('customer_product_id')
                  ->constrained('customer_products')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
                  
            $table->foreignId('expense_id')
                  ->constrained('expenses')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
                  
            $table->timestamps();
            
            // Optional: Add unique constraint to prevent duplicate relationships
            $table->unique(['customer_product_id', 'expense_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_product_expenses');
    }
};
