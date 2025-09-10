<!DOCTYPE html>
<html lang="tr">
<title>Edit Product</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/description.css') }}">


<section>
    
 <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    @include('products.form', ['formMode' => 'edit'])
</form>
 <div class="buttonreturn container-fluid">
      <a href="{{ route('mainpage') }}" class="returnbutton">Geri Dön</a>
    </div>
</section>
