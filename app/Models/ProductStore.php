<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStore extends Model
{
    use HasFactory;
    
     protected $table = 'productStore';
     protected $fillable = [
        'product_id',
        'number_of_cartons',
        'carton_price',
     ];

     public function product()
{
    return $this->belongsTo(Product::class,'product_id','id');
}


}
