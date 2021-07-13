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
                        <a href="{{ route('admin.home') }}" class="nav-link">ADMIN</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('user.espaco') }}" class="nav-link">ESPAÇO.LIA</a>
                    </li>
                @endif
            @endguest

        </ul>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light" data-toggle="affix">

    <div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{url('/images/logo_1.png')}}" width="90">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" >
            <span class="navbar-toggler-icon"></span>
        </button>

            <div class="collapse navbar-collapse text-center" id="navbarToggler">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/categoria/1">CÂMARAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categoria/2">LENTES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categoria/3">ILUMINAÇÃO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categoria/4">AUDIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categoria/5">TRIPÉS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/categoria/6">ACESSÓRIOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-c" href="{{ route('contactos') }}">CONTACTOS</a>
                    </li>
                </ul>
            </div>   
    </div>
</nav>
