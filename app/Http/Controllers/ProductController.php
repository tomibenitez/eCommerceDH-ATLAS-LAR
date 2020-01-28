<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\ProductsFilterRequest;
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

    public function index(ProductsFilterRequest $req)
    {

        if (
            $req->has('category') &&
            $req->has('minPrice') &&
            $req->has('maxPrice') &&
            $req->has('orderBy')
        ){

            $categories = [];
            $categories[] = $req['category'];
            if ($categories[0] == 0) {
                $categories = ['1','2','3','4','5'];
            }

            $maxPrice = $req['maxPrice'];
            if ($maxPrice < 1) {
                $maxPrice = 999999;
            }

            $minPrice = $req['minPrice'];
            $orderBy = $req['orderBy'];

            return view('product.products')
                ->with('products', Product::whereIn('category_id', $categories)
                                            ->where('price', '>', $minPrice)
                                            ->where('price', '<', $maxPrice)
                                            ->orderBy($orderBy, 'asc')
                                            ->get())
                ->with('categories', Category::all());

        }

        return view('product.products')
            ->with('products', Product::all())
            ->with('categories', Category::all());
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
            $product->update([
              'is_active' => '0'
            ]);
        }

        return \redirect(route('admin'));
    }
}
