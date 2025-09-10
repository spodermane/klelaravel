<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/add.css') }}">
<section>
    <form method="post" action="{{ route("products.store") }}" enctype="multipart/form-data">
        @csrf
        @include("products.form",["formMode"=>"create"])
    </form>

    <div class="returnbutton container-fluid">
    <a class="returnmain" href="/mainpage">Geri Dön</a>

</section>

