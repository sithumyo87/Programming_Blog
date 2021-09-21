<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Programming Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/category.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/category.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.css"
        rel="stylesheet"
    />

    <!--boostrap Accordian-->



</head>
<style>

</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm bg-dark p-2">
            <div class="container-fluid ">
                <a class="navbar-brand text-white" href="{{ url('/home') }}">
                    Programming Blog
                </a>
                @if(Auth::check())
                    <ul class="nav">
                        <li class="nav-item pl-4">
                            <a class="btn btn-outline-white text-white" href="{{url('/post/create')}}"><i class="bi bi-plus-circle pr-2"></i>Article</a>
                        </li>
                    </ul>
                    @endif
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if(Auth::check())
                            <form action="{{url('/search')}}" method="GET">
                                @csrf
                                <div class="input-group text-white mr-2 ">
                                    <div class="form-outline" >
                                        <input type="search" id="form1" class="form-control text-white" name="search" />
                                        <label class="form-label text-white" for="form1">Search</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary text-white mr-3">
                                        <i class="fas fa-search "></i>
                                    </button>
                                </div>
                            </form>
                            @endif

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="btn btn-outline-secondary bg-dark rounded-3 text-white" href="{{ route('login') }}">
                                    <i class="bi bi-person-circle text-white pr-1"></i>Login
                                </a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item ml-1">
                                    <a class="btn btn-outline-success bg-success rounded-3 text-white" href="{{ route('register') }}"><i class="bi bi-people-fill p-1"></i>Register</a>
                                </li>
                            @endif
                        @else

                            <div class="dropdown">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item " href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                        <button>Logout</button>
                                    </form>
                                </ul>
                            </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-0">
            @yield('content')

        </main>

    </div>

</body>

</html>
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
