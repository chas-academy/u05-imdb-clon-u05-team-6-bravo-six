<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Group 6') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
<script src="https://kit.fontawesome.com/061e52cdfe.js" crossorigin="anonymous"></script>

    {{-- JQUERY  --}}
        <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  {{-- JQUERY UI --}}
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../../../../public/favicon.ico?v=2"  />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Group 6') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                    @if (Auth::check())
                    @if (Auth::user()->user_admin === 1)
                    <li class="nav-item"><a class="nav-link" href=" {{route('admin.dashboard')}} ">Admin Mode</a></li>
                    @endif
                    @endif
                   <li class= "nav-item"> <a class="nav-link" href="{{action([App\Http\Controllers\CommentController::class, 'index'])}}">Comments</a></li>
                    <li class= "nav-item"> <a class="nav-link" href="{{action([App\Http\Controllers\GenreController::class, 'index'])}}">Genres</a></li>
                   <li class = "nav-item"> <a class="nav-link" href="{{action([App\Http\Controllers\TitleController::class, 'index'])}}">Titles</a></li>
                    <li class= "nav-item"> <a class="nav-link" href=" {{action([App\Http\Controllers\ReviewController::class, 'index'])}} "> Reviews</a></li>
                    <li class= "nav-item"> <a class="nav-link" href=" {{action([App\Http\Controllers\WatchlistController::class, 'index'])}} ">Watchlists</a></li>
                    <li class= "nav-item"> <a class="nav-link" href=" {{action([App\Http\Controllers\WatchlistItemController::class, 'index'])}} ">Watchlists items</a></li>
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
                        <x-image-layout :user="Auth::user()"></x-image-layout>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        {{ __('Dashboard') }}
                                    </a>

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

        <main class="py-4">
            <div class="container">
            @yield('content')
            {{--

             --}}
            </div>
             <!-- <div class="container">
                <div class="row">
                    <div class= "col-xl-3 col-lg-4 col-md-6 col-sm-12" style="border:1px solid black">
                        <li>ABC</li>
                        <li>DEF</li>
                        <li>GHI</li>
                        <li>JKL</li>
                    </div>

                    <div class= "col-xl-3 col-lg-4 col-md-6 col-sm-12" style="border:1px solid black">
                        <li>ABC</li>
                        <li>DEF</li>
                        <li>GHI</li>
                        <li>JKL</li>
                    </div>
                    <div class= "col-xl-3 col-lg-4 col-md-6 col-sm-12" style="border:1px solid black">
                        <li>ABC</li>
                        <li>DEF</li>
                        <li>GHI</li>
                        <li>JKL</li>
                    </div>
                    <div class= "col-xl-3 col-lg-4 col-md-6 col-sm-12" style="border:1px solid black">
                        <li>ABC</li>
                        <li>DEF</li>
                        <li>GHI</li>
                        <li>JKL</li>
                    </div>
                </div>
            </div> -->
        </main>
    </div>
</body>
</html>
