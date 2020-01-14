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

    public function urlToProducts()
    {
        return route('products', [
          'category' => $this->id,
          'minPrice' => '0',
          'maxPrice' => '0',
          'orderBy' => 'created_at',
        ]);
    }
}
