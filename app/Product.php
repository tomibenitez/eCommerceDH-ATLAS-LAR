<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

class Product extends Model
{
    protected $guarded = [];

    static $validations = [
      'name' => 'required|string|max:200',
      'description' => 'required|string|min:20',
      'category_id' => 'required|numeric|min:0',
      'price' => 'required|numeric|min:0',
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
}
