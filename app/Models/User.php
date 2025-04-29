<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'email',
        'password',
        'dob',
        'gender',
        'userRole',
        'address',
        'userImage',


    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function capital()
    {  
       return $this->hasMany(CapitalModel::class, 'user_id', 'id');
    }
    public function product(){
        return $this->hasMany(Product::class,'user_id','id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'customer_products', 'customer_id', 'product_id')
                    ->withPivot('selling_price','product_quantity','product_profit','pieceSellingPrice')
                    ->withTimestamps(); 
    }
    
    public function expenses(){
        return $this->hasMany(Expenses::class,'user_id','id');
    }

}
