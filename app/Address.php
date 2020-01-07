<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Province;

class Address extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function province()
    {
      return $this->belongsTo(Province::class);
    }
}
