<!DOCTYPE html>
<html lang="tr">

<head>
<title>Kayıt Ol</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
<form method="POST" action="{{ route("register") }}">
    @csrf
    <input type="text" name="name" class="register_name" placeholder="Name">
     @error('name')
        <div class="alertlog">
            {{ $message }}
        </div>
    @enderror
    <input type="email" name="email" class="register_email" placeholder="Email">
     @error('email')
        <div class="alertlog">
            {{ $message }}
        </div>
    @enderror
    <input type="password" name="password" class="register_password" placeholder="Password">
     @error('password')
        <div class="alertlog">
            {{ $message }}
        </div>
    @enderror
     <input type="password" name="password_confirmation" class="register_password_confirmation" placeholder="Password Confirm">
      @error('password')
        <div class="alertlog">
            {{ $message }}
        </div>
    @enderror
    <button type="submit" class="registerbutton">Kayıt Ol</button>



    
</form>
</body>