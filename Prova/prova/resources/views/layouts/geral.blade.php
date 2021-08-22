<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts.head')

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('geral') }}">
                    Área Geral
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('vacinadas') }}">
                                <i class="fas fa-id-badge fa-lg"></i>
                                Total geral vacinadas aplicadas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('aplicacoes') }}">
                                <i class="fas fa-notes-medical fa-lg"></i>
                                Total de aplicações por vacinas
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    @include('layouts.right-navbar')
                </div>
            </div>
        </nav>

        <main class="py-0">
            <div class="container page-container fill">
                <div class="row justify-content-center py-4">
                    <div class="col-md-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
