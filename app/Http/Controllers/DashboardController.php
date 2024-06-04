<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view("dashboard.index", [
            "title" => "Shopping Cart",
            // "carts" => Transaction::where("id")
        ]);
    }

    public function profile(){
        $user_login = User::where("id", auth()->user()->id)->get();
        return view("dashboard.user.profile", [
            "user" => $user_login
        ]);
    }
    public function carts(){
        $user_login = User::where("id", auth()->user()->id)->get();
        return view("dashboard.user.index", [
            "user" => $user_login
        ]);
    }

    public function updateUser(Request $user)
    {
        $validateData = $user->validate([
            "name" => "required",
            "username" => "required",
            "addres" => "required",
            "phone" => "required",
            "email" => "required"
        ]);

        User::where("id", auth()->user()->id)->update($validateData);

        // succes
        return redirect("/dashboard/user/profile")->with("succes", "Your Profile has ben Updated!");
    }
}
