<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $table = 'purchases';
    protected $fillable = [
      'product_id',
      'buying_price',
      'number_catton',
      'number_picess',
      'sales_point',
    ];


    public function products()
{
    return $this->belongsTo(Product::class, 'product_id', 'id');
}

}
