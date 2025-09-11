<!DOCTYPE html>
<html lang="tr">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/add.css') }}">
<title>Ürün Oluşturma</title>
</head>

<body>
<section>
    <form method="post" action="{{ route("products.store") }}" enctype="multipart/form-data">
        @csrf
        @include("products.form",["formMode"=>"create"])
    </form>
</section>
<a href="{{ route('mainpage') }}" class="returnbutton">Geri Dön</a>
</body>