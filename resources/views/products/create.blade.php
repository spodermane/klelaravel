<meta name="viewport" content="width=device-width, initial-scale=1">

<section>
    <form method="post" action="{{ route("products.store") }}" enctype="multipart/form-data">
        @csrf
        @include("products.form",["formMode"=>"create"])
    </form>
</section>

