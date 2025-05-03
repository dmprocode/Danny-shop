<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    protected $table = 'expenses';
    protected $fillable  =[
       'amount',
       'description',
       'date',
       'user_id'

    ];

    public function getFormattedDateTimeAttribute()
{
    $time = $this->date->format('h:i A');
    $period = match(true) {
        $this->date->hour >= 5 && $this->date->hour < 12 => 'Morning',
        $this->date->hour >= 12 && $this->date->hour < 17 => 'Afternoon',
        $this->date->hour >= 17 && $this->date->hour < 21 => 'Evening',
        default => 'Night',
    };
    
    return $this->date->format('F j, Y') . " ($time - $period)";
}

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function customerProducts()
{
    return $this->belongsToMany(CustomerProduct::class, 'customer_product_expense');
}



}
