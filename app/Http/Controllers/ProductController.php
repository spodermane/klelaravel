<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function __construct(){
        $this->middleware("auth")->except(['mainPage','showDescription']);
    }

    public function create()
    {
    return view("products.create");
    }
    
    public function store(Request $request){

        $request->validate([
            'name' =>'required|string|max:255',
            'price'=>'required|numeric|min:0',
            'description'=>'required|string|max:500',
        ]);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $file_name = time().".".request()->image->getClientOriginalExtension();
        request()->image->move(public_path("images"), $file_name);
        $product->image = $file_name; 
        
        $product->save();

        return redirect()->route("mainpage");
    }
    public function mainPage()
    {
        $products = Product::all();
        return view("mainpage",compact("products"));
    }
    
    public function edit($id){
        $product = Product::findOrFail($id);
        return view("products.edit",compact("product"));
    }
   public function update(Request $request, $id){

      $request->validate([
            'name' =>'required|string|max:255',
            'price'=>'required|numeric|min:0',
            'description'=>'required|string|max:500',
        ]);

     $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        if($request->hasFile('image')){
        $image_path = public_path()."/images/";
        $image = $image_path.$product->image;
        if(file_exists($image)){
        @unlink($image);
        }
             $file_name = time().".".request()->image->getClientOriginalExtension();
            request()->image->move(public_path("images"), $file_name);
            $product->image = $file_name; 
        
        }
      
        $product->save();

        return redirect()->route("mainpage");
    }
   public function destroy($id){
    $product = Product::findOrFail($id);
    $image_path = public_path() . "/images/";
    $image = $image_path.$product->image;
    if(file_exists($image)){
        @unlink($image);
    }
    $product->delete();
    return redirect()->route("mainpage");
   }
   public function showDescription($id){
    $product = Product::findOrFail($id);
    return view('products.description',compact('product'));
   }
}


