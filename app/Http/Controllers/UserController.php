<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view("register");
    }
    public function register(Request $request)
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:6|confirmed"
        ]);
        User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
        ]);
        return redirect("/login")->with("success","Kayıt başarılıyla olundu! lütfen giriş yapın.");
    }
    
    
    public function showLoginForm()
    {
        return view("login");
    }
    public function login(Request $request)
    {
        $credentials = $request->only("email","password");

        if (Auth::attempt($credentials)) {
            return redirect()->intended("/mainpage");
        }
        return back()->withErrors([
        'email' => 'E-posta veya şifre hatalı.'
        ]);

    }
}