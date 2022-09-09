<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluation extends Model
{
    public function shop()
    {
        return $this->belongsTo('App\shop');
    }
}
