<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;
use App\Cart;

class Product extends Model
{
    protected $guarded = [];

    protected $with = ['category'];

    static $validations = [
      'name' => 'required|string|max:200',
      'description' => 'required|string|min:20',
      'category_id' => 'required|numeric|min:0',
      'price' => 'required|numeric|min:0|max:999999.99',
      'picture' => 'required|file|image|max:10000',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function path()
    {
        return route('product.show', ['product' => $this->id]);
    }

    public function cart()
    {
        return $this->belongsToMany(Cart::class, 'carts_products', 'product_id', 'cart_id');
    }

    public function boughtByUsers()
    {
        return $this->belongsToMany(User::class, 'user_bought_product')->withTimestamps();
    }

    public function price($notFormattedPrice = null)
    {
        if (\is_float($notFormattedPrice) && $notFormattedPrice != null) {

          return '$'. \number_format($notFormattedPrice, 2);

        }

        return '$'. \number_format($this->price, 2);
    }
}
