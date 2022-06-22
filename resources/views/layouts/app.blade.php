<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styles -->
    {{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <title>Hello, world!</title>
    <!-- Font Awesome -->
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous">
    </script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>

    </style>
</head>
<body>

<div class="page">
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo-container">
                <div class="logo-container">
                    <img class="logo-sidebar" src="assets/img/logo.png"/>
                </div>
                <div class="brand-name-container">
                    <p class="brand-name">
                        TorrensApp<br/>
                        <span class="brand-subname">
                              PaulValencia
                            </span>
                    </p>
                </div>
            </div>
        </div>
        <div class="sidebar-body">
            <ul class="navigation-list">
                @guest
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="{{ route('login') }}">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <div class="col-9">
                                    Login
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="{{ route('register') }}">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <div class="col-9">
                                    Registro
                                </div>
                            </div>
                        </a>
                    </li>
                @else
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="/">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                <div class="col-9">
                                    Home
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="/">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="col-9">
                                    Users
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="/">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <div class="col-9">
                                    Tasks
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <div class="row">
                                <div class="col-2">
                                    <i class="fas fa-comments"></i>
                                </div>
                                <div class="col-9">
                                    {{ __('Logout') }}
                                </div>
                            </div>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="navigationBar">
            <button id="sidebarToggle" class="btn sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>

    <main class="py-5 d-flex justify-content-center">
        @yield('content')
    </main>

</div>

<script>
    let sidebarToggle = document.querySelector(".sidebarToggle");
    sidebarToggle.addEventListener("click", function () {
        document.querySelector("body").classList.toggle("active");
        document.getElementById("sidebarToggle").classList.toggle("active");
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>
</html>
