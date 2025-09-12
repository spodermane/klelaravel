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
       @error('email')
        <div class="alertlog">
            {{ $message }}
        </div>
    @enderror
    <input type="password" name="password" class="logpassword" placeholder="Password">
    @error('password')
        <div class="alertlog">
        {{ $message }}
        </div>
    @enderror
    <button type="submit" class="logbutton">Giris yap</button>
</form>
    <div class="register_user">
     <a href="{{ route('register') }}" class="user_register">Kayıt Ol</a>
    </div>

    @if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
@endif
</body>