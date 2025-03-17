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
        'price',
        'price_per_item',
        'selling_price_per_item',
        'number_of_set',
        'number_catton',
        'number_of_pieces',
        'classification',
        'color',
        'size',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id   ');
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            if ($product->number_of_pieces > 0) {
                $product->price_per_item = round(($product->price * $product->number_catton) / $product->number_of_pieces, 2);
            } else {
                $product->price_per_item = 0; 
            }
        });

       
        
            static::saving(function ($product) {
                if ($product->number_of_pieces > 0) {
                    $product->price_per_item = round(($product->price * $product->number_catton) /  $product->number_of_pieces, 2);
                } else {
                    $product->price_per_item = 0; 
                }
            });
        

            
        
    }
}
