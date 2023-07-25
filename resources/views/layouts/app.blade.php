<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/app-298ba296.css') }}">
    <script src="{{ asset('build/assets/app-43ed9472.js') }}"></script>

    {{-- <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}

    {{-- for the icones --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <script>
        function confirmUserDelete() {
            return confirm("Bu Kullanici Kalici Olarak Silmekten Emin Misiniz ?");
        }

        function confirmCustomerDelete() {
            return confirm("Bu Musteri Kalici Olarak Silmekten Emin Misiniz ?");
        }
    </script>

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="font-family: Arial Black; font-size:xx-large">
                    MYP SUARESOFT
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('anasayfa'))
                                <li class="nav-item {{ request()->is('/') ? 'active' : '' }} btn btn-outline btn-lg m-2">
                                    <b>
                                        <a class="nav-link" href="{{ route('anasayfa') }}">
                                            <h3><b>Ana Sayfa</b></h3>
                                        </a>
                                    </b>
                                </li>
                            @endif
                            @if (Route::has('login'))
                                <li
                                    class="nav-item  {{ request()->is('login') ? 'active' : '' }} btn btn-outline btn-lg m-2">
                                    <b>
                                        <a class="nav-link" href="{{ route('login') }}">
                                            <h3><b>Login</b></h3>
                                        </a>
                                    </b>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li
                                    class="nav-item  {{ request()->is('register') ? 'active' : '' }} btn btn-outline btn-lg m-2">
                                    <b>
                                        <a class="nav-link" href="{{ route('register') }}">
                                            <h3><b>Register</b></h3>
                                        </a>
                                    </b>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span style="font-family: Arial Black; font-size:large">{{ Auth::user()->name }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <ul>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('anasayfa') }}">
                                                <h3><b>Ana Sayfa</b></h3>
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('home') }}">
                                                <h3><b>Home</b></h3>
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('profile') }}">
                                                <h3><b>Profile</b></h3>
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('musteri.showArchive') }}">
                                                <h3><b>Customer Archives</b></h3>
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <h3><b>Logout</b></h3>
                                            </a>
                                        </li>
                                    </ul>


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

        <div class="py-4">
            @yield('content')
        </div>
    </div>



</body>



</html>
