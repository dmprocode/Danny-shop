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
        'customer_quantity'
    ];

    public $timestamps = true; 

}
