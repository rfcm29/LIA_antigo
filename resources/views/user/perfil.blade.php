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
            @guest
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link">LOGIN</a>
            </li>
        @else
            <li class="nav-item">
                <a href="/perfil/{{Auth::user()->id}}" class="nav-link">Olá, {{Auth::user()->name}}</a>
            </li>

            <li class="nav-item">
                <div class="nav-link"><a href="{{ route('carrinho') }}" class="fa fa-shopping-cart"></a></div>

            </li>

            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                </form>
            </li>

            @if (Auth::user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">ADMIN</a>
                </li>
            @endif
        @endguest
        </ul>
</div>

<div class="container">

    <a href="{{ route('home') }}">
        <img src="{{url('/images/logo_1.png')}}" width="30%">
    </a>

    <form action="">
        @csrf
        <h3>Nome</h3>
        <input type="text" id="nome" name="nome" value="{{$user->name}}" class="form-control">
        <h3>Email</h3>
        <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control">
        <h3>Password</h3>
        <input type="password" class="form-control" name="password" placeholder="Enter password" class="form-control">
        <h3>Confirmar Password</h3>
        <input type="password" class="form-control" name="password" placeholder="Enter password" class="form-control">
        <h3>Telemóvel</h3>
        <input type="text" id="telemovel" name="telemovel" value="{{$user->telefone}}" class="form-control">
        <h3>Centro de Custos</h3>
        <select id="centro_custos" name="centro_custos" class="form-control">
        <input type="submit" value="ALTERAR" class="btn btn-primary">
    </form>

    <br><br>

</div>
</body>
</html>
