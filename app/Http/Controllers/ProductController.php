<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductaddRequest;
use App\Http\Requests\ProducteditRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Exception;
class ProductController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
    }

    public function create()
    {
    return view("products.create");
    }
    
    public function store(ProductaddRequest $request){

        try{ 
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $file_name = time().".".$request->image->getClientOriginalExtension();
        $request->image->move(public_path("images"), $file_name);
        $product->image = $file_name; 

        $product->save();

        return redirect()->route("mainpage");
        }
        catch (\Exception $e){
            return redirect()->back()->with("error","Bir Hata Oluştu lütfen tekrar deneyin.".$e->getMessage());
        }
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
   public function update(ProducteditRequest $request, $id){

         try{
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

        $file_name = time().".".$request->image->getClientOriginalExtension();
        $request->image->move(public_path("images"), $file_name);
        $product->image = $file_name; 
        } 

        $product->save();

         return redirect()->route("mainpage")->with('success', 'Ürün başarıyla güncellendi!');
      }catch(Exception $e){
        return redirect()->back()->with('error',"Bir Hata Oluştu!" .$e->getMessage());
      }
    }
   public function destroy($id){
    
    try{
        $product = Product::findOrFail($id);
    $image_path = public_path() . "/images/";
    $image = $image_path.$product->image;
    if(file_exists($image)){
        @unlink($image);
    }
    $product->delete();
    return redirect()->route("mainpage")->with("success","Ürün Başarıyla Silindi.");
    }
    catch(Exception $e){
        return redirect()->back()->with("error","Ürünü Silerken Bir Hata Oluştu.". $e->getMessage());
    }
   }
   public function showDescription($id){
    $product = Product::findOrFail($id);
    return view('products.description',compact('product'));
   }
}


