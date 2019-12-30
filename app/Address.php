<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Address extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
