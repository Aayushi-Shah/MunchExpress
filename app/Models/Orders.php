<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $guarded = [];

    protected $casts = [
        'order_details' => 'array'
    ];

    public function resturant(){
        return $this->belongsTo(Resturant::class, 'resto_id');
    }
}
