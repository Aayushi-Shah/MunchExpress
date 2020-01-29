<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Resturant extends Model
{
    protected $guarded = [];

    protected $appends = ['slug'];

    public function owner(){
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function getSlugAttribute()
    {
        return route('restos.menu', $this->id);
    }

    // public function getOrdersSlugAttribute()
    // {
    //     return route('resto.orders', $this->id);
    // }

}
