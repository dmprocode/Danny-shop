<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'name',
        'image',
        'category',
        'buying_price',
        'number_carton',
        'number_dozen',
        'price_per_dozen',
        'number_of_set',
        'number_pieces',
        'selling_price_per_piece',
        'selling_price_per_dozen',
        'selling_price_per_set', 
        'color',
        'size',
        'user_id',
    ];
    


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            $number_pieces = isset($product->number_pieces) ? $product->number_pieces : 1; // Avoid division by zero
            $number_carton = isset($product->number_carton) ? $product->number_carton : 1;
            
            if ($number_pieces > 0 && $number_carton > 0) {
                $product->price_per_item = round(($product->buying_price * $number_carton) / $number_pieces, 2);
            } else {
                $product->price_per_item = 0; 
            }
        });


        static::saving(function ($product) {
            $number_pieces = isset($product->number_pieces) ? $product->number_pieces : 1; // Avoid division by zero
            $number_carton = isset($product->number_carton) ? $product->number_carton : 1;
            
            if ($number_pieces > 0 && $number_carton > 0) {
                $product->price_per_item = round(($product->buying_price * $number_carton) / $number_pieces, 2);
            } else {
                $product->price_per_item = 0; 
            }
 
            

        });


        static::saving(function ($product) {
            if ($product->number_pieces > 0) {
                $product->number_dozen = round($product->number_pieces / 12, 2);
            } else {
                $product->number_dozen = 0;
            }
        });


        static::saving(function ($product) {
            if ($product->number_pieces > 0) {
                $product->number_dozen = round($product->number_pieces / 12, 2);
            } else {
                $product->number_dozen = 0;
            }
        
            if ($product->number_dozen > 0) {
                $product->price_per_dozen = round($product->buying_price / $product->number_dozen, 2);
            } else {
                $product->price_per_dozen = 0;
            }
        });
        
        


      
        
    }
}
