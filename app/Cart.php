<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;

class Cart extends Model
{
    protected $guarded = [];

    protected $with = ['products'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'carts_products', 'cart_id', 'product_id')->withPivot(['id']);
    }

    public function total()
    {
        $total = $this->products->reduce(function ($carry, $product){
            return $carry + $product->price;
        });

        $product = new Product();

        return $product->price($total);
    }
}
