<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- <meta http-equiv="refresh" content="3" > -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- Scripts font awesome -->
    <script defer src="{{ asset('js/fontawesome.js') }}"></script>
    <script defer src="{{ asset('js/light.js') }}"></script>
    <script defer src="{{ asset('js/solid.js') }}"></script>

    <!-- custom scripts -->
    <script defer src="{{ asset('js/rebicycle.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-me transparent navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <i class="fal fa-bicycle"></i> Rebicycle
                        <!-- {{ config('app.name', 'Laravel') }} -->
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav"></ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                    <li><a href="/bikes"><i class="fal fa-bicycle fa-fw"></i> aanbod</a></li>
                    
                    
                    <span class="fa-layers fa-fw">
                    <i class="fal fa-shopping-cart fa-2x"></i>
                    <span class="fa-layers-counter fa-4x ">1</span>
                    </span>

                        <!-- Authentication Links -->
                        <!-- <li><a href="/"><i class="fal fa-shopping-cart"></i> winkelwagen</a></li> -->
                        @guest
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fal fa-user"></i> aanmelden <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="/login"></i>aanmelden</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!-- <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li> -->
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a class="btn" href="../myBikes">Mijn fietsen</a></li>                                </li>
                                    <li><a class="btn disabled" href="#">Favorieten</a></li>
                                    <li>
                                        <a class="btn" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content container">
        @yield('content')
        </div>
    </div>

    <!--Scripts-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
