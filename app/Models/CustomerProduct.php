<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProduct extends Model
{
    use HasFactory;

    protected $table = 'customer_products'; 

    protected $fillable = [
        'customer_id',
        'product_id',
        'selling_price',
        'product_quantity',
        'customer_quantity',
        'product_profit',
        'pieceSellingPrice',
    ];

    public $timestamps = true; 

    protected static function boot()
    {
        parent::boot();
    
        static::saving(function ($productProfit) {
            $product = \App\Models\Product::find($productProfit->product_id);
    
            if ($product) {
                $pricePerItem = $product->price_per_item;
    
                $profit = ($productProfit->selling_price * $productProfit->product_quantity) 
                        - ($pricePerItem * $productProfit->product_quantity);
    
                $productProfit->product_profit = $profit;
            }



        });


        static::saving(function($piecePrice){
            $piecePrice->pieceSellingPrice =($piecePrice->selling_price * $piecePrice->product_quantity);


        });


    }
    
    


}
