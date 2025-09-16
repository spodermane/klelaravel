<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    public function __construct(){
        $this->middleware("auth");
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
            "image" => "required|image|mimes:jpg,jpeg,png,gif|max:2048",
        ],[
            "name.required"=> "İsim Alanını doldurmanız zorunludur.",
            "price.required"=> "Fiyat Kısmını doldurmanız zorunludur.",
            "price.numeric"=> "Fiyat Kısmı sadece sayı olmalıdır.",
            "description.required"=> "Açıklama Kısmı Boş bırakılamaz.",
            'image.required' => 'Fotoğraf eklemeniz zorunludur.',
            'image.image' => 'Lütfen geçerli bir resim dosyası yükleyin.',
        ]);
        try{ 
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $file_name = time().".".request()->image->getClientOriginalExtension();
        request()->image->move(public_path("images"), $file_name);
        $product->image = $file_name; 
        
        $product->save();

        return redirect()->route("mainpage");
        }catch (\Exception $e){
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
   public function update(Request $request, $id){
        $request->validate([
            'name' =>'required|string|max:255',
            'price'=>'required|numeric|min:0',
            'description'=>'required|string|max:500',
            "image" => "required|image|mimes:jpg,jpeg,png,gif|max:2048",
        ],[
            "name.required"=> "İsim Alanını doldurmanız zorunludur.",
            "price.required"=> "Fiyat Kısmını doldurmanız zorunludur.",
            "price.numeric"=> "Fiyat Kısmı sadece sayı olmalıdır.",
            "descripton.required"=> "Açıklama Kısmı Boş bırakılamaz.",
            'image.required' => 'Fotoğraf eklemeniz zorunludur.',
            'image.image' => 'Lütfen geçerli bir resim dosyası yükleyin.',
        ]);
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
    }catch(Exception $e){
        return redirect()->back()->with("error","Ürünü Silerken Bir Hata Oluştu.". $e->getMessage());
    }
   }
   public function showDescription($id){
    $product = Product::findOrFail($id);
    return view('products.description',compact('product'));
   }
}


