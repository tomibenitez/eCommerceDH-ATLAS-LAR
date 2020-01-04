<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Address;

class Province extends Model
{
    protected $guarded = [];

    public function addresses()
    {
      return $this->hasMany('App\Address');
    }
}
