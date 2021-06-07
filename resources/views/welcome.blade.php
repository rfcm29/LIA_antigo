<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LIA</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="profile-container">
        <ul class="nav justify-content-end">
        @if(Auth::check())
            <li class="nav-item">
                <a href="#" class="nav-link">Olá, {{Auth::user()->name}}</a>
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
    
<nav class="navbar navbar-expand-lg navbar-light bg-light" data-toggle="affix">

    <div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="images/logo_1.png" width="90">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHome" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse text-center" id="navbarHome">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">CAT 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CAT 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CAT 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CAT 4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CONTACTOS</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
        

<div class="wrapper">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="categoria-container">
                        <img src="images/camera.jpg" width="100%"/>
                        <div class="nome">
                            <div class="nome-texto">
                                <a href="https://elearning.ipvc.pt/">CÂMARAS</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="categoria-container">
                        <img src="images/camera.jpg" width="100%"/>
                        <div class="nome">
                            <div class="nome-texto">
                                <a href="https://elearning.ipvc.pt/">LENTES</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="categoria-container">
                        <img src="images/iluminacao.jpg" width="100%"/>
                        <div class="nome">
                            <div class="nome-texto">
                                <a href="https://elearning.ipvc.pt/">ILUMINAÇÃO</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <br>
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="categoria-container">
                        <img src="images/audio.jpg" width="100%"/>
                        <div class="nome">
                            <div class="nome-texto">
                                <a href="https://elearning.ipvc.pt/">AUDIO</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="categoria-container">
                        <img src="images/camera.jpg" width="100%" />
                        <div class="nome">
                            <div class="nome-texto">
                                <a href="https://elearning.ipvc.pt/">TRIPÉS</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="categoria-container">
                        <img src="images/camera.jpg" width="100%" />
                        <div class="nome">
                            <div class="nome-texto">
                                <a href="https://elearning.ipvc.pt/">ACESSÓRIOS</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
