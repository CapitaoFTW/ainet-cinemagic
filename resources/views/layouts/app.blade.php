<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link rel="cinemagic-icon" type="favicon" href="public/favicon.ico">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex" href="{{ url('/') }}">
                    <div><img src="{{ asset('CineMagicLogo.svg') }}" style="padding-bottom: 7.5px; height: 50px">
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item" style="padding-left: 25px">
                            <b><a class="nav-link" href="{{ route('filmes.index') }}">{{ __('FILMES') }}</a></b>
                        </li>
                        @auth
                            @if (auth()->user()->isCliente())
                                <li class="nav-item" style="padding-left: 25px">
                                    <b><a class="nav-link"
                                            href="{{ route('carrinho.index') }}">{{ __('CARRINHO') }}</a></b>
                                </li>
                                <li class="nav-item" style="padding-left: 25px">
                                    <b><a class="nav-link"
                                            href="{{ route('bilhetes.index') }}">{{ __('BILHETES') }}</a></b>
                                </li>
                                <li class="nav-item" style="padding-left: 25px">
                                    <b><a class="nav-link" href="{{ route('recibos.index') }}">{{ __('RECIBOS') }}</a></b>
                                </li>
                            @else
                                <li class="nav-item" style="padding-left: 25px">
                                    <b><a class="nav-link"
                                            href="{{ route('admin.dashboard') }}">{{ __('PAINEL DE CONTROLO') }}</a></b>
                                </li>
                            @endif
                        @else
                            <li class="nav-item" style="padding-left: 25px">
                                <b><a class="nav-link" href="{{ route('carrinho.index') }}">{{ __('CARRINHO') }}</a></b>
                            </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" type="button" id="navbarDropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->isCliente())
                                        <a class="dropdown-item" href="{{ route('cliente.perfil') }}">
                                            {{ __('Perfil') }}
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('password') }}">
                                        Alterar Senha
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-5">
            @yield('content')
        </main>
        <footer class="d-flex flex-wrap justify-content-between align-items-center pt-3 my-2 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                    <svg class="bi" width="30" height="24">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                </a>
                <span class="text-muted">© 2022 CineMagic, Inc</span>
            </div>
        </footer>
    </div>
</body>

</html>
