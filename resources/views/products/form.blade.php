<!DOCTYPE html>
<html lang="tr">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/edit.css') }}">


<div class="titlebar">
        <h1 class="producttitle">{{$formMode === "edit" ? "Edit Product" : "Create Product"}}</h1>
    </div>
    <div class="container-fluid">
         <div class="row  justify-content-center ">
            <div class="col-lg-5 d-flex justify-content-center">
                <div class="card">
                    <label class="productnametext">İsim</label>
                    <input class="productname"type="text" name="name" value="{{ isset($product->name) ? $product->name : "" }}">
                    <label class="productinfotext"> Açıklama</label>
                    <textarea  class="productinfo"name="description"> {{isset($product->description) ? $product->description : ""}}</textarea>
                    <label class="productpricetext"> Fiyat </label>
                    <input class="productprice" type="text" class="input" name="price" value="{{ isset($product->price) ? $product->price : "" }}">
                    <label class="productimgtext">Fotoğraf Ekle</label>
                    <img src ="{{ isset($product->image) ? asset("images/".$product->image) : asset("template/images/no-image.png") }}" alt="" class="productimg" id="file-preview" />
                    <input type="file" name="image" accept="image/*" onchange="showFile(event)">
                    <button class="confirmbutton">{{ $formMode === "edit" ? "Update" : "Save" }}</button>
                </div>
            </div>
        </div>
    </div>
    
    
   
    <script>
    function showFile(event){
        var input=event.target;
        var reader=new FileReader();
        reader.onload=function(){
            var dataURL = reader.result;
            var output = document.getElementById("file-preview");
            output.src=dataURL;
        }
        reader.readAsDataURL(input.files[0]);
    }

    
</script>