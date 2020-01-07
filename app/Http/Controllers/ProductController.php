<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewProductRequest;
use App\Product;
use Illuminate\Support\Facades\Auth;

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
        return view('product.details', compact('id'));
    }
}
