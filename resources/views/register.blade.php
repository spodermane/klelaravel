<!DOCTYPE html>
<html lang="tr">
<title>Kayıt Ol</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<form method="POST" action="{{ route("register") }}">
    @csrf
    <input type="text" name="name" class="register_name" placeholder="Name">
    <input type="email" name="email" class="register_email" placeholder="Email">
    <input type="password" name="password" class="register_password" placeholder="Password">
     <input type="password" name="password_confirmation" class="register_password_confirmation" placeholder="Password Confirm">
    <button type="submit" class="registerbutton">Kayıt Ol</button>


    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

</form>
