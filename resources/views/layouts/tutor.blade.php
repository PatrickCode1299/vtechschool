<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VtechSchool</title>
  
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css')}}"  rel="stylesheet">
    <link href="{{ asset('css/tutor.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link rel="icon" type="img/png" href="{{asset('img/favicon-32x32.png')}}">


</head>
<body>
   
      <header>
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
    <div class="position-sticky">

      <div class="list-group side-nav-logo-container side-bar-list list-group-flush mx-3 mt-4">
        <img src="{{asset('img/vtechlogo.png')}}" loading="lazy" width="80" height="80" class="site-logo"/>
      </a>
      @if(empty($users->avatar))
        <img src="{{asset('storage/profile_pic/default.jpg')}}"
              height="100" class="img-circle avatar img-rounded" alt="Avatar" loading="lazy" />
        @else
        <img src="{{asset('storage/profile_pic/'.$users->avatar)}}"
              height="100" width="100" class="img-circle avatar img-rounded" alt="Avatar" loading="lazy" />
        @endif
            <small>{{ Auth::guard('admin')->user()->name}}</small>
            <small>{{ Auth::guard('admin')->user()->email}}</small>
      </div>
     <div class="list-group m-2 tutor-list-profile">
       <a id="main"  href="{{route('main_dashboard')}}" class="list-group-item list-group-item-action main py-2 ripple" aria-current="true">
          <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
        </a>
        <a id="profile"  href="{{route('admin_dashboard')}}" class="list-group-item list-group-item-action profile py-2 ripple active">
          <i class="fas fa-chart-area fa-fw me-3"></i><span>Profile</span>
        </a>
        <a id="examset" href="{{route('exam')}}" class="list-group-item list-group-item-action py-2 examset ripple"><i
            class="fas fa-lock fa-fw me-3"></i><span>Examine</span></a>
        <a id="payment" href="{{route('tutor_payment')}}" class="list-group-item payment list-group-item-action py-2 ripple"><i
            class="fas fa-chart-line  fa-fw me-3"></i><span>Payment</span></a>
        <a id="settings" href="{{route('help')}}" class="list-group-item settings  list-group-item-action py-2 ripple">
          <i class="fas fa-chart-pie  fa-fw me-3"></i><span>Settings</span>
        </a>
     </div>
    </div>
  </nav>
      <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
    <!-- Container wrapper -->
    <div class="container-fluid">

      <!-- Brand -->
      <a class="navbar-brand" href="#">

      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <li class="nav-item dropdown">
          <a onclick="dropDown()" class="nav-link dropdown-toggle hidden-arrow d-flex align-items-center" href="#"
            id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
            {{ Auth::guard('admin')->user()->name}}
             @if(empty($users->avatar))
        <img src="{{asset('storage/profile_pic/default.jpg')}}"
              height="22" alt="Avatar" loading="lazy" />
        @else
        <img src="{{asset('storage/profile_pic/'.$users->avatar)}}"
              height="22" class="img-circle img-rounded" alt="Avatar" loading="lazy" />
        @endif
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item" href="{{route('main_dashboard')}}">Main Dashboard</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('admin_dashboard')}}">Profile</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('exam')}}">Examine</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('help')}}">Settings</a>
            </li>
            <li>
              <a class="dropdown-item" href="{{route('tutor_payment')}}">Payment</a>
            </li>
             <li>
              <a class="dropdown-item" href="{{route('admin_logout')}}">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- Container wrapper -->
  </nav>-->
</header>
 <main class="py-4">
            @yield('content')
</main>
<script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
<script type="text/javascript">
  function dropDown(){
    $(".dropdown-menu").toggle();
  }
</script>
</body>

</html>
