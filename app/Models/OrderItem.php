<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table ='orderItems';

    public $timestamps = true;

    protected $fillable = [
        'product_id',
        'order_id',
        'count'
    ];

    public function product() {
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
