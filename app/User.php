<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Address;
use App\Product;
use App\Cart;
use App\Category;

class User extends Authenticatable
{
    use Notifiable;

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_pic','address_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    static $validations = [
      'name' => 'required|string|min:5|max:20',
      'email' => 'required|string|email|max:180|unique:users',
      'password' => 'required|string|min:8|confirmed',
      'userPic' => 'file|image|max:2500'
    ];

    public function address()
    {
      return $this->belongsTo('App\Address');
    }

    public function isAdmin()
    {
        return $this->type == self::ADMIN_TYPE;
    }

    public function makeAdmin()
    {
        $this->type = self::ADMIN_TYPE;
        $this->save();
    }

    public function removeAdmin()
    {
        $this->type = self::DEFAULT_TYPE;
        $this->save();
    }

    public function createdProducts()
    {
        return $this->hasMany(Product::class, 'admin_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function boughtCarts()
    {
        return $this->carts()->where('is_active','0')->get()->loadMissing('products');
    }

    public function createNewCart()
    {
        $newCart = Cart::create([
          'user_id' => $this->id,
        ]);

        $this->cart()->associate($newCart);
        $this->save();
    }

    public function favCategories()
    {
        return $this->belongsToMany(Category::class, 'user_likes_category')->withPivot(['id']);
    }
}
