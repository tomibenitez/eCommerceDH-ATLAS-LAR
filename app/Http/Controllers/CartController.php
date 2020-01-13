<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Cart;

class CartController extends Controller
{
    public function addProduct(Request $req)
    {
        $product = Product::find($req['product']);
        if ($product != null) {

            $req->user()->cart->products()->attach($product->id);
        }

        return \redirect()->back();
    }

    public function removeProduct(Request $req)
    {
        if (isset($req['product'])) {

          $product = $req->user()->cart->products->first(function ($product, $key) use($req){
            return $product->pivot->id == $req['product'];
          });

          $product->pivot->delete();

        }else{

          foreach ($req->user()->cart->products as $key => $product) {
            $product->pivot->delete();
          }

        }

        return \redirect()->back();
    }

    public function buyCart(Request $req)
    {
        $req->user()->cart->update([
          'is_active' => '0',
          'bought_at' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);

        $req->user()->createNewCart();

        return \redirect()->back();
    }

    public function showBoughtCart(Cart $cart)
    {
        if(Auth::user()->carts->contains($cart) && $cart->is_active == false){
          return view('user.cart')->with(['cart' => $cart]);
        }
        else{
          return \abort(404);
        }
    }
}
