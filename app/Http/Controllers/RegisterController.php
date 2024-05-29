<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view("register.index", [
            "title" => "Regist"
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required",
            "username" => "required|unique:users",
            "email" => "required|email",
            "addres" => "required",
            "phone" => "required",
            "password" => "required",
            "gender" => "required"
        ]);

        $validateData["password"] = Hash::make($validateData["password"]);
        $validateData["role"] = "customer";

        User::create($validateData);

        return redirect("/login")->with("succes", "Registration succes! Please login");
    }
}
