<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>LIA</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    </head>
    <body>
        <div class="profile-container">
            <ul class="nav justify-content-start">

            </ul>

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
                        <div class="nav-link"><a href="{{ route('carrinho') }}" class="bx bxs-cart"></a></div>

                    </li>

                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        @if (Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a href="{{ route('admin.home') }}" class="nav-link">ADMIN</a>
                            </li>
                        @endif
                        @if (Auth::user()->user_type == 2 || Auth::user()->isAdmin())
                            <li class="nav-item">
                                <a href="/reservarEspaco" class="nav-link">ESPAÇO.LIA</a>
                            </li>
                        @endif
                    @endguest
            </ul>
        </div>

        <div class="wrapper">

            @yield('content')

        </div>
    </body>
</html>
