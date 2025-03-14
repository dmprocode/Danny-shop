<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = ['products'];

    protected $fillable = [
        'name', 
        'image', 
        'category', 
        'price', 
        'quantity', 
        'price_per_item',
        'selling_price_per_item',
        'items',
        'classification',
        'color', 
        'size',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'id','user_id');
    }
}
