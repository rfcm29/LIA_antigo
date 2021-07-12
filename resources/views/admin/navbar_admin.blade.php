<div class="profile-container">
        <ul class="nav justify-content-end">

            <li class="nav-item">
                <a href="/perfil/{{Auth::user()->id}}" class="nav-link">Olá, {{Auth::user()->name}}</a>
            </li>

            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                </form>
            </li>

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">WEBSITE</a>
            </li>

        </ul>
</div>