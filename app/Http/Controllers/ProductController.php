<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Product;
use Illuminate\Support\Facades\Auth;
use App\Category;

class ProductController extends Controller
{
    public function store(NewProductRequest $req)
    {
        $data = $req->all();
        $picture = \basename($req->all()['picture']->store('public/products_pics'));

        $data['picture'] = $picture;

        Auth::user()->createdProducts()->create($data);

        return \redirect(route('admin'));
    }

    public function index()
    {
        return view('product.products')->with('products', Product::all());
    }

    public function show($id)
    {
        return view('product.details')->with(['product' => Product::find($id)]);
    }

    public function showEditForm(Product $product)
    {
        $categories = Category::all();
        return view('admin.edit-product', compact(['product', 'categories']));
    }

    public function update(UpdateProductRequest $req, Product $product)
    {
        $data = $req->all();

        $picture = $product->picture;

        if ($req->has('picture')) {
          $picture = \basename($req->all()['picture']->store('public/products_pics'));
        }

        $data['picture'] = $picture;

        $product->update($data);

        return \redirect(route('admin'));
    }

    public function delete(Request $req)
    {
        $product = Product::find($req['product']);

        if ($product != null) {
            $product->delete();
        }

        return \redirect(route('admin'));
    }
}
