<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class HomeController extends Controller
{

    public function mainPage()
    {
        $products = Product::all();
        return view('mainpage', compact('products'));
    }
}
