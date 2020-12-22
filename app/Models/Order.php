<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'status',
        'ship',
        'payment'
    ];

    public function customer() {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function items() {
        return $this->hasMany(OrderItem::class,'order_id', 'id');
    }
}
