<!DOCTYPE html>
<html lang="tr">
    
<head>
<title>Giriş Yap</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
    </head>

<body>
<form method="POST" action="{{ route("login") }}">
    @csrf
     <input type="email" name="email" class="logemail" placeholder="Email">
    <input type="password" name="password" class="logpassword" placeholder="Password">
    <button type="submit" class="logbutton">Giris yap</button>
    @if ($errors->any())
        <div class="alertlog">
            {{ $errors->first() }}
        </div>
    @endif
</form>
    <div class="register_user">
     <a href="{{ route('register') }}" class="user_register">Kayıt Ol</a>
    </div>
</body>