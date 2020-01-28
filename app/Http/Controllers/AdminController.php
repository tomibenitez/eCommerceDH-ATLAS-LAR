<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

class AdminController extends Controller
{
    public function showDashBoard()
    {
        $products = Auth::user()->activeCreatedProducts();
        $categories = Category::all();
        return view('admin.dash-board', compact(['products', 'categories']));
    }
}
