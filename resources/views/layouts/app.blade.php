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
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
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
                   <!-- <li class= "nav-item"> <a class="nav-link" href="{{action([App\Http\Controllers\CommentController::class, 'index'])}}">Comments</a></li>
                    <li class= "nav-item"> <a class="nav-link" href="{{action([App\Http\Controllers\GenreController::class, 'index'])}}">Genres</a></li>
                   <li class = "nav-item"> <a class="nav-link" href="{{action([App\Http\Controllers\TitleController::class, 'index'])}}">Titles</a></li>
                    <li class= "nav-item"> <a class="nav-link" href=" {{action([App\Http\Controllers\ReviewController::class, 'index'])}} "> Reviews</a></li>
                    <li class= "nav-item"> <a class="nav-link" href=" {{action([App\Http\Controllers\WatchlistController::class, 'index'])}} ">Watchlists</a></li>
                    <li class= "nav-item"> <a class="nav-link" href=" {{action([App\Http\Controllers\WatchlistItemController::class, 'index'])}} ">Watchlists items</a></li> -->
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

    <!-- Footer -->
    <footer class="bg-dark text-center text-white">
           <div class="container p-4">
            <!-- Section: Social media -->
               <!-- Font Awesome -->
{{--               <link--}}
{{--                   href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"--}}
{{--                   rel="stylesheet"--}}
{{--               />--}}
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-3" href="#" role="button">
                    <i class="fab fa-facebook-f"></i></a>
                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-3" href="#" role="button">
                    <i class="fab fa-twitter"></i></a>
                <!-- Google -->
                <a class="btn btn-outline-light btn-floating m-3" href="#" role="button">
                    <i class="fab fa-google"></i></a>
                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-3" href="#" role="button">
                    <i class="fab fa-instagram"></i></a>
                <!-- Youtube -->
                <a class="btn btn-outline-light btn-floating m-3" href="#" role="button">
                    <i class="fab fa-youtube"></i></a>
            </section>

            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <div class="row d-flex justify-content-center">
                        <div class="col-auto">
                            <p class="pt-2">
                                <strong>Sign up for our newsletter</strong>
                            </p>
                        </div>
                        <div class="col-md-5 col-12">
                            <div class="form-outline form-white mb-4">
                                <input type="email" id="formEmail" class="form-control" />
                                <label class="form-label" for="formEmail">Email address</label>
                            </div>
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-outline-light mb-4">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </form>
            </section>

               <section class="mb-4">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
                    repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
                    eum harum corrupti dicta, aliquam sequi voluptate quas.
                </p>
            </section>

            <!-- Section: Links -->
            <section class="">
                <div class="row">
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <a class="text-white" href=""> <h5 class="text-uppercase">News</h5> </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <a class="text-white" href=""> <h5 class="text-uppercase">About us</h5> </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <a class="text-white" href=""> <h5 class="text-uppercase">Contacts</h5> </a>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <a class="text-white" href=""> <h5 class="text-uppercase">Help</h5> </a>
                    </div>
                </div>
            </section>
           </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2021 Copyright:
            <a class="text-white" href="">IMDb:Fake.com</a>
        </div>
    </footer>

</body>
</html>
