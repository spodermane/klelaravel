<meta name="viewport" content="width=device-width, initial-scale=1">
<section>   
<title>Ürün Açıklaması</title>
<link rel="stylesheet" href="{{ asset('css/description.css') }}">

    <h1 class="descriptiontitle">Description {{ $product->name }}</h1>
     <div class="container-fluid ">
      <div class="textbackground">
          <div class="row  justify-content-center ">
            <div class="col-lg-5 d-flex justify-content-center">
              <div class="description-card">
                <img src="{{asset("images/".$product->image) }}" class="descriptionimage">
                <div class="description-name">
                    <strong>Title:</strong>
                    {{ $product->name }}
                  <div class="description-info">
                    <strong>Content:</strong>
                        {{ $product->description }}
                    <div class="description-price">
                         <strong>Price:</strong>
                        {{ $product->price }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>


    <div class="returnbutton container-fluid">
    <a class="returnmain" href="/mainpage">Geri Dön</a>
    </div>