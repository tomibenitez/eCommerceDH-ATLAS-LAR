<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserUpdateController extends Controller
{
    public function updateName(Request $req)
    {
        $req->validate([
          'name' => User::$validations['name']
        ]);

        $user = Auth::user();

        $user->name = $req['name'];
        $user->save();
        return redirect(route('user/profile/edit'));
    }

    public function updateEmail(Request $req)
    {
        $req->validate([
          'email' => User::$validations['email']
        ]);

        $user = Auth::user();

        $user->email = $req['email'];
        $user->save();
        return redirect(route('user/profile/edit'));
    }

    public function updateUserPic(Request $req)
    {
        if ($req->file('userPic')) {
          $req->validate([
            'userPic' => 'required|' . User::$validations['userPic']
          ]);

          $userPic = basename($req->file('userPic')->store('public/users_pics'));
          $this->deleteCurrentProfileImage();
          $user = Auth::user();

          $user->user_pic = $userPic;
          $user->save();
          return redirect(route('user/profile/edit'));
        }
        else{
          return \redirect(route('user/profile/edit'))->withErrors(['userPic' => 'No adjuntaste ninguna foto!']);
        }

    }

    public function updateUserPassword(Request $req)
    {
        if (Hash::check($req['password'], Auth::user()->password)) {

            $req->validate([
              'newPassword' => User::$validations['password']
            ]);

            $user = Auth::user();

            $user->password = Hash::make($req['newPassword']);
            $user->save();

            return \redirect(route('user/profile/edit'));
        }
        else{
            return \redirect(route('user/profile/edit'))->withErrors(['password' => 'La contraseña es incorrecta']);
        }
    }

    public function updateUserInfo(Request $req)
    {
        if ($req->has('name')) {
            return $this->updateName($req);
        }

        if ($req->has('email')) {
            return $this->updateEmail($req);
        }

        if ($req->has('thereIsPic')) {
            return $this->updateUserPic($req);
        }

        if ($req->has('password')) {
            return $this->updateUserPassword($req);
        }

        return \redirect(route('user/profile/edit'))->withErrors(['noChange' => 'No se ha realizado ningún cambio!']);
    }

    public function deleteCurrentProfileImage()
    {
        if (Auth::user()->user_pic != 'default-avatar.jpg') {

            $userPic = 'public/users_pics/' . Auth::user()->user_pic;

            if (Storage::exists($userPic)) {

                Storage::delete($userPic);

            }

        }
    }

    public function setFavCategories(Request $req)
    {
        foreach ($req->user()->favCategories as $category) {
          $category->pivot->delete();
        }

        $categories = $req['favCategories'];

        $req->user()->favCategories()->attach($categories);
        $req->user()->save();

        return \redirect()->back();
    }
}
