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
        'measerments',
        'price_per_set',
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
            // Default values to avoid errors
            $product->price_per_item = 0;
            $product->price_per_dozen = 0;
            $product->price_per_set = 0;
    
            if ($product->number_pieces > 0 && $product->number_carton > 0) {
                switch ($product->measerments) {
                    case 'Piecess':
                        $product->price_per_item = round($product->buying_price / $product->number_pieces, 2);
                        break;
                    
    
                        case 'Dazeen':
                            // Ensure we are working with valid numbers
                            $product->number_dozen = round(floatval($product->number_pieces) / 12, 2);
                            
                            if ($product->number_dozen > 0) {
                                // Calculate price per dozen
                                $total_buying_price = floatval($product->buying_price) * floatval($product->number_carton);
                                $product->price_per_dozen = round($total_buying_price / $product->number_dozen, 2);
                        
                                // Calculate price per item
                                $product->price_per_item = round($product->price_per_dozen / 12, 2);
                            } else {
                                $product->price_per_dozen = 0;
                                $product->price_per_item = 0;
                            }
                            break;
                        
    
                        
                        
    
                    default:
                        // In case measurement is invalid
                        $product->price_per_item = 0;
                        $product->price_per_dozen = 0;
                        $product->price_per_set = 0;
                        break;
                }
            }
        });
    }
    

    public function costomers()
    {
        return $this->belongsToMany(Product::class, 'customer_products', 'customer_id', 'product_id')
                    ->withPivot('selling_price','product_quantity','pieceSellingPrice') 
                    ->withTimestamps(); 
    }

    public function parchasses(){
        return $this->hasMany(Purchase::class,'product_id','id');
    }
    
}