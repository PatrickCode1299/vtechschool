@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="p-4 large-heading flex-direction-column justify-content-center align-items-center">
		<h1 class="fs-1 m-5 instructor-register-text"><b>BECOME AN INSTRUCTOR</b></h1>
		<img class="show-small-screen" width="100%" height="auto" src="{{asset('img/developer.jpg')}}">
		<p class='fs-3 instructor-register-paragraph'>Share your knowledge and skill on VtechSchool, help thousands reach their goals and potential.</p>
	</div>
</div>
<div class="container-fluid instructor-intro">
	<div class="p-4 m-4">
		<h1 class="fs-1 m-3"><b>EARN AS YOU HELP AND EMPOWER LIVES</b></h1>
		<p style="word-wrap:break-word;">Share your skill at VtechSchool, an avenue that helps you convert your skills to earnings, and make your skills beneficial via empowering others.</p>
		<center><div><img class="img-responsive" width="100px" height="auto" src="{{asset('img/backhand.gif')}}"></div></center>
		<center><button target="_blank" onclick="window.location.href='https://wa.me/2349031726942'" class="btn btn-block btn-success btn-lg">Join</button></center>
	</div>
	<div class="p-4">
		<img  width="100%" height="auto" src="{{asset('img/designer.png')}}">
	</div>
</div>
<section class="footer m-5">
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
                <a target="_blank" href="https://instagram.com/coldigify"><i class="fa-brands fa-instagram"></i></a>
                <a target="_blank" href="https://facebook.com/coldigify1"><i class="fa-brands fa-facebook-f"></i></a>
                <a target="_blank" href="https://linkedin.com/company/coldigify"><i class="fa-brands fa-linkedin-in"></i></a>
                <a target="_blank" href="https://wa.me/2349031726942"><i class="fab fa-whatsapp"></i></a>
                <a target="_blank" href="https://t.me/+TPxtxDhzB1dmYT10"><i class="fab fa-telegram"></i></a>
                VtechSchool &copy;     <?php echo date('Y'); ?></p>
        </footer>
        </section>
@endsection