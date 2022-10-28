<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>
            @yield('title')
        </title>

        {{-- Style Links --}}
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
        @yield('StyleLinks')

    </head>

    <body>

        {{-- Our Nav-bar --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="">Market System </a>

                <div class="collapse navbar-collapse just" id="navbarNav">
                    {{-- Left Links --}}
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('bills.all') }}">Bills</a>
                        </li>
                                
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('users.all') }}">Users</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('products.all') }}">Products</a>
                        </li>

                        
                    </ul>

                </div>

                {{-- Right Links --}}
                <ul class="navbar-nav ml-auto">
                    @guest

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('User.register') }}">Register</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('User.login') }}">Login</a>
                    </li>

                    @endguest

                    @auth

                    <li class="nav-item">
                        <a class="nav-link disabled" aria-current="page" href="#">{{ Auth::user()->name }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('User.logout') }}">Logout</a>
                    </li>

                    @endauth
                </ul>
            </div>
        </nav>

        {{-- Dynamic Content --}}
        <div class="container py-5">

            @yield('content')
        </div>
        
        {{-- Script Links --}}
        <script src="asset('assets/js/jQuery-3.6.1.js')"></script>
        <script src="asset('assets/js/bootstrap.bundle.min.js')"></script>
        @yield('ScriptLinks')
    </body>
</html>
