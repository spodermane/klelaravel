<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
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
    public function register(RegisterRequest $request)
    {
        
        User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
        ]);
        return redirect()->route("login")->with("success","Kayıt başarılıyla olundu! lütfen giriş yapın.");
    }
    
    
    public function showLoginForm()
    {
        return view("login");
    }
    public function login(LoginRequest $request)
    {
         $credentials = $request->only("email","password");

         if (Auth::attempt($credentials)){
            return redirect()->intended('/mainpage');
         }
         return back()->withErrors(['email' => 'E-posta veya Şifre Hatalı.']);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}