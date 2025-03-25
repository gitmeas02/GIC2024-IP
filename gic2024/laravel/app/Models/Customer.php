<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Customer extends Model
{   
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'address',
        'phone',
    ];
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function wishlist() {//wishlists
        return $this->hasMany(Wishlist::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }
    public function payment(){
        return $this->hasMany(Payment::class);
    }
    public function products(){
        return $this->hasManyThrough(Product::class,Cart::class);
    }

}
