<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapitalModel extends Model
{
    use HasFactory;

    protected $table = 'capital_models';
    protected $fillable =[
        'start_amount',
        'update_amount',
        'product_profit',
        'user_id'
    ];

    public function user(){
    return $this->hasMany(User::class,'id','product_id');
    }

}
