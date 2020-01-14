<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewAddressRequest;
use App\Address;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Province;
use App\Category;

class UserProfileController extends Controller
{
    public function showProfile()
    {
      return view('user.profile')->with(['categories' => Category::all()]);
    }

    public function showProfileEdit()
    {
      $provinces = Province::all();
      return view('user.edit-info', compact('provinces'));
    }

    public function showAddAddressForm()
    {
      $provinces = Province::all();
      return view('user.add-address', compact('provinces'));
    }

    public function addAddress(NewAddressRequest $req)
    {
      $newAddress = Address::create([
        'address' => $req['address'],
        'city' => $req['city'],
        'province_id' => $req['province'],
        'zip' => $req['zip']
      ]);

      $user = Auth::user();

      $user->address_id = $newAddress['id'];
      $user->save();

      return \redirect(route('user/profile'));
    }
}
