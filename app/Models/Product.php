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
        'category_id'
    ];
    public function category() {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }
}