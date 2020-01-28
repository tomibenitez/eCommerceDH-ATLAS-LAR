<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\address;

class UserController extends Controller
{
    public function delete(Request $req)
    {
        $req->user()->delete();

        return \redirect()->route('home');
    }
}
