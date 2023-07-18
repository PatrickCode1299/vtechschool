<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Vtechschool is number one e-learning platform in Nigeria targeted to everyone across Africa who wants to learn a certain skill either for knowledge or getting a job. Our mission is to provide a huge impact on the students who enrol for the courses on our platform and give them the opportunity to start their own career across various fields.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="VtechSchool"/>

<meta property="og:url" content="http://vtechschool.com/" />

<meta property="og:description" content="Vtechschool is number one e-learning platform in Nigeria targeted to everyone across Africa who wants to learn a certain skill either for knowledge or getting a job. Our mission is to provide a huge impact on the students who enrol for the courses on our platform and give them the opportunity to start their own career across various fields."/>

<meta property="og:image" content="{{asset('img/vtechlogo.png')}}"/>

<meta property="og:type" content="Vtechschool is number one e-learning platform in Nigeria targeted to everyone across Africa who wants to learn a certain skill either for knowledge or getting a job. Our mission is to provide a huge impact on the students who enrol for the courses on our platform and give them the opportunity to start their own career across various fields." />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>VtechSchool</title>

    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <link href="{{ asset('css/app.css')}}" rel="stylesheet">    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
     <link rel="icon" type="img/png" href="{{asset('img/favicon-32x32.png')}}">
    <link rel="icon" type="img/png" href="{{asset('img/favicon-32x32.png')}}">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KDD8QMZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light my-nav shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <span><img src="{{asset('img/vtechlogo.png')}}" style="max-height:100px; width: 50px;"></span> VtechSchool
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    <form method="POST" action="{{route('find_course')}}" class="form-inline d-flex align-items-center justify-content-space-between">
                     @csrf
                    <input class="form-control mr-sm-2" name="course" type="search" placeholder="Search" aria-label="Search" required>
                    <button class="btn btn-md btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->

                        @guest
                            @if (Route::has('login'))
                                <li style="margin-right: 20px; " class="important-link-1 p-2 nav-item shadow-sm ">
                                    <a  class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li style=" color:black;" class="important-link-2 nav-item p-2 shadow-sm">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                 <li class="nav-item p-2"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                                <li class="nav-item p-2"><a class="nav-link" href="{{route('prospective_tutor')}}">Become an Instructor</a></li>
                                <li class="nav-item p-2"><a class="nav-link" href="#">Affilliate</a></li>
                            @endif
                        @else
                            <li style="cursor:pointer;" class="nav-item m-2"><a href="{{route('home')}}">Home</a></li>
                            <li style="cursor:pointer;" class="nav-item m-2"><a href="{{route('dashboard')}}">Courses</a></li>
                            <li style="cursor:pointer;" class="nav-item m-2"><a href="{{route('payments')}}">Payments</a></li>
                            <li class="nav-item dropdown">
                                <a style="color:black;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
            @yield('content')
        </main>
    </div>
    
</body>
</html>
