<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\User;

class Category extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function favOfUsers()
    {
        return $this->belongsToMany(User::class, 'user_likes_category')->withPivot(['id']);
    }
}
