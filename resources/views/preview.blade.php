<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Vtechschool is number one e-learning platform in Nigeria targeted to everyone across Africa who wants to learn a certain skill either for knowledge or getting a job. Our mission is to provide a huge impact on the students who enrol for the courses on our platform and give them the opportunity to start their own career across various fields.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="VtechSchool"/>

<meta property="og:url" content="" />

<meta property="og:description" content="{{$about->description}}"/>

<meta property="og:image" content="{{asset('img/'.$about->preview)}}"/>

<meta property="og:type" content="Vtechschool is number one e-learning platform in Nigeria targeted to everyone across Africa who wants to learn a certain skill either for knowledge or getting a job. Our mission is to provide a huge impact on the students who enrol for the courses on our platform and give them the opportunity to start their own career across various fields." />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{$about->course_title}}</title>

    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <link href="{{ asset('css/app.css')}}" rel="stylesheet">    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
    <link rel="icon" type="img/png" href="{{asset('img/favicon-32x32.png')}}">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
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

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
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
    </div>


<section style="positon:relative; background:#eaeaea;"  class="container-fluid">
	<div class=" preview-card p-2 justify-content-center align-items-center">
		<div  class="card nobg preview-content-card  p-2">
			<div  class="p-2 justify-content-start align-items-center">
			<span class="text-indicator" style="font-weight:bold;">{{$about->category}} &#8594;</span>
			<span class="text-indicator" style="font-weight:bold;">{{$about->course_title}}</span>
			</div>
			<h2 class="m-2" style="font-weight:bold;">{{$about->course_title}}</h2>
			<p class="p-2 fs-4" style=" font-weight:bold;">{{$about->description}}</p>
            <h5 class="p-2">{{number_format($buyers_count[0])}} Person have bought this course</h5>
			<div  class="p-2 d-flex justify-content-start">
			<?php
        $parameter=[
            'id' => $about->unique_id,
           
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
			<a href="{{route('instructor',$parameter)}}"><small>Created by &#8594;<span style="font-weight:bolder;">@if(empty($avatar->avatar))
				<img class="img-rounded" height="30px" width="30px" src="{{asset('storage/profile_pic/default.jpg')}}"> 
				@else
				<img class="img-rounded" height="30px" width="30px" src="{{asset('storage/profile_pic/'.$avatar->avatar)}}"> 
				@endif
				{{$about->tutors_name}}</span></small></a>


			</div>
            <h1 style="font-weight:bold;" class="text-bold">&#8358;{{$about->price}}</h1>

@if(Auth::guard('web')->check())
<?php
$course=$about->course_title;
$checkout_course=Crypt::encrypt($course);
?>
<a style="color:white;" href="{{route('checkout',$checkout_course)}}" class="btn btn-primary btn-block btn-lg">To Checkout</a>
@else
 <?php
        $parameter=[
            'id' => $about->created_at,
            'owner' => $about->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
<a href="{{route('redirect',$parameter)}}" class="btn btn-primary btn-block btn-lg">Buy now</a>
@endif
		</div>
		<div class="card nobg preview-video-card p-2" style=" border:none; "> 
			<video style="object-fit: cover;" controls autoplay loading="lazy">
  <source src="{{asset('storage/uploads/'.$about->file1)}}" type="video/mp4">
  Your browser does not support the video tag.
</video>
		</div>
	</div>
</section>
<section class="basic-course-content m-2">
    <div class="container-fluid bg-white" style="margin-top:20px;">
        <h3 class="p-2">Course Content</h3>
        <ol>
        @foreach($allmodules as $module_title)
        <li class="p-2">{{$module_title->module_title}}</li>
        @endforeach
        </ol>
        <h3>Who is this course for?</h3>
        <p class="fs-5">Anyone who wants to start using their {{$about->category}} skills and get paid for it. Newbies, amateurs and any creatives who want to improve themselves and learn the basics of {{$about->category}} from scratch...</p>
        <h3>Are the videos downloadable?</h3>
        <p class="fs-5">The videos are highly compressed and downloadable..</p>
        <h3>What are the course requirements?</h3>
        <p class="fs-5">Access to a laptop or computer, Tablet or Smart Tv</p>
        <h3>Will i be certified after this course?</h3>
        <p class="fs-5">Yes, a certificate of completion will be issued at the end of the course.</p>
        <div style="width:100%;" class="d-flex justify-content-center align-items-center">
        <img style="width:100%; height: auto;" class="img-responsive" src="{{asset('img/certificate.jpg')}}">
        </div>
    </div>
</section>
<section class="footer">
        <footer>
            <div class="flex-footer-info">
            <div class="flex-footer-div">
               <h3>Elearn</h3>
               <ul>
                   <a href="{{ route('about') }}"><li>About</li></a>
                   <li>What we offer</li>
                   <li>Leadership</li>
                   <li>Careers</li>
                   <li>Catalog</li>
               </ul>
            </div>
            <div class="flex-footer-div">
                <h3>Courses</h3>
                <ul>
                   <li><a href="{{route('explore')}}">Classroom Courses</a></li>
                    <li><a href="{{route('explore')}}">Virtual Classroom Courses</a></li>
                    <li><a href="{{route('explore')}}">E-learning Courses</a></li>
                    <li><a href="{{route('explore')}}">Video Courses</a></li>
                    <li><a href="{{route('explore')}}">Offline Courses</a></li>
                </ul>
            </div>
            <div class="flex-footer-div">
                <h3>Community</h3>
                <ul>
                    <li>Learners</li>
                    <li>Partners</li>
                    <li>Developers</li>
                    <li>Transactions</li>
                    <li>Blogs</li>
                    <li><a href="{{ route('admin_login') }}">Tutor</a></li>
                </ul> 
            </div>
            <div class="flex-footer-div">
                 <h3>Quick Links</h3>
                <ul>
                    <li>Home</li>
                    <li>Proffessional Education</li>
                    <li>Courses</li>
                    <li>Admissions</li>
                    <li>Testimonials</li>
                </ul>
            </div>
            </div>
           <p class="text-center fs-5 text-black">
                <a target="_blank" href="#"><i class="fa-brands fa-instagram"></i></a>
                <a target="_blank" href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a target="_blank" href="#B"><i class="fa-brands fa-linkedin-in"></i></a>
                <a target="_blank" href="https://wa.me/2349031726942"><i class="fab fa-whatsapp"></i></a>
                <a target="_blank" href="https://t.me/+TPxtxDhzB1dmYT10"><i class="fab fa-telegram"></i></a>
                VtechSchool &copy;     <?php echo date('Y'); ?></p>
        </footer>
        </section>
</body>
</html>