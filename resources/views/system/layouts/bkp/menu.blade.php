<div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- Left Side Of Navbar -->
    <ul class="nav nav-pills nav-fill">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('system.client.index') }}">Clientes</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Configurações</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('system.configuration.type-client.index') }}">Tipo de Cliente</a>
                <a class="dropdown-item" href="{{ route('system.configuration.segment-client.index') }}">Segmentos de Cliente</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('system.configuration.user.index') }}">Usuários</a>
            </div>
        </li>
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('system.configuration.user.edit', Auth::user()->id) }}">Meu Perfil</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</div>
