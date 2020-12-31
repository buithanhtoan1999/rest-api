<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $table ='products';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'status',
        'discount',
        'quantity'
    ];

    public function category() {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function files()
    {
        return $this->hasOne(File::class, 'product_id', 'id');
    }
}
