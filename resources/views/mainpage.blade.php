
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ana Sayfa</title>
    <link rel="stylesheet" href="{{ asset('css/mainpage.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
<nav class="navbar navbar-expand-lg d-flex h-90px">
    <div class="container-fluid background">
        @guest
            <a href="{{ route('login') }}" class="user_login">Giriş Yap</a>
        @else
            <h1 class="title">Hoş Geldin, {{ Auth::user()->name }}!</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-3">
            <a class="product_add" href="products/create">Ürün Ekle</a>
            <form method="POST" action="{{ route('logout') }}">
    @csrf
    @method("DELETE")
    <button type="submit" class="user_logout">Çıkış Yap</button>
</form>
                @csrf
            </form>
        @endguest
        </ul>
      </div>
    </div>
  </nav>



  <div class=" container-fluid productlist">
      <h1 class="products">Ürünler</h1>
        <div class="row bodyinf row-cols-md-3">
            @foreach($products as $product)
                <div class="col colbody justify-content-center">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{asset("images/".$product->image) }}" class="productimage">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->description }}</p>
                            <p><strong>Fiyat:</strong> ₺{{ $product->price }}</p>
                            <a class="explanation" href="{{ route('products.description', $product->id) }}">Ürün Açıklaması</a>
                            <a class="itemedit" href="{{ route('products.edit', $product->id) }}">Ürün Güncelle</a>
                            <form method="POST" action="products/{{ $product->id }}" class="productdelete">
                                {{ method_field('DELETE') }}
                                @csrf()
                                <button class="productdeletebutton" type="submit">
                                    Ürünü Kaldır
                                </button>
                            </form>
 
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>







 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q"
      crossorigin="anonymous"></script>

    
</body>
</html>


