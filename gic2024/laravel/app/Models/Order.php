<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes; 
class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable=[
        'total_price',
        'customer_id',
        'order_date'
    ];
    protected function orderDate():Attribute
    {
        return Arribute::make(
            set:fn ($value)=>Carbon::createFormFormat('d/m/Y H:i:s',$value)->format('Y-m-d H:i:s'),
            get:fn ($value)=>Carbon::parse($value)->format('d/m/Y H:i:s')
        );
    }
    public function payment(){
        return $this->hasMany(Payment::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function order_product(){
        return $this->belongsTo(OrderProduct::class);
    }
}
