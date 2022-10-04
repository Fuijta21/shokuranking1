<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shop extends Model
{
    public function evaluations()
    {
        return $this->hasMany('App\evaluation');
    }

         protected $fillable = [
             'address',
             'shop_name',
             'kakakutai',
             'keyword',
             'time',
             'distance',
             'telephone', ];
}
