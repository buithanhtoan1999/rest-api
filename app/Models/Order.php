<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'status'
    ];

    public function customer() {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
