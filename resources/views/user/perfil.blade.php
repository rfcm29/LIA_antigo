<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>LIA</title>
</head>
<body>
<div class="profile-container">
        <ul class="nav justify-content-end">
        @if(Auth::check())
            <li class="nav-item">
                <a href="/perfil/{{Auth::user()->id}}" class="nav-link">Olá, {{Auth::user()->name}}</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('auth.logout') }}" class="nav-link">LOGOUT</a>
            </li>  
        @else
        <li class="nav-item">
            <a href="{{ route('login') }}" class="nav-link">LOGIN</a>
        </li>  
        @endif
        @if (Auth::check() && Auth::user()->isAdmin())
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link">ADMIN</a>
        </li>
        @endif
        </ul>
</div>
    
<div class="container">

    <a href="{{ route('home') }}">
        <img src="images/logo_1.png" width="30%">
    </a>

    <form action="">
        @csrf
        <h3>Nome</h3>
        <input type="text" id="nome" name="nome" value="{{$user->name}}" class="form-control"><br><br>
        <h3>Email</h3>
        <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control"><br><br>
        <h3>Password</h3>
        <input type="password" class="form-control" name="password" placeholder="Enter password" class="form-control"><br><br>
        <h3>Confirmar Password</h3>
        <input type="password" class="form-control" name="password" placeholder="Enter password" class="form-control"><br><br>
        <h3>Telemóvel</h3>
        <input type="text" id="telemovel" name="telemovel" value="{{$user->telefone}}" class="form-control"><br><br>
        <h3>Centro de Custos</h3>
        <input type="text" id="centro_custos" name="centro_custos" class="form-control"><br><br>
        <input type="submit" value="ALTERAR" class="btn btn-primary">
    </form>

    <br><br>

</div>
</body>
</html>