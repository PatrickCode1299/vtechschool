@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="card  flex-card justify-content-center flex-direction-row  m-2 p-4  text-center">
		<div class="wrapper">
		<div style="font-weight:bold;">
		<h2 class="text-center m-2">ABOUT VTECHSCHOOL</h2>
		<p class="fs-5">Welcome to VtechSchool an Educational Technology platform, where learning is made easy, convenient, and accessible to everyone, everywhere across Africa.</p>
		<p class="fs-5">We are dedicated to providing you with the best learning experience through our platform, which offers a wide range of courses tailored to your needs. Whether you're a student, a professional, or simply looking to expand your knowledge, we have something for everyone.
		 </p>
		<p class="fs-5">Our courses are designed by experts in their respective fields, and they are constantly updated to ensure that they remain relevant and up-to-date. You can learn at your own pace, anywhere and at any time, making it easy for you to fit learning into your busy schedule.</p>
		<p class="fs-5">We also offer a variety of features to enhance your learning experience, such as interactive quizzes, assessments, and discussion forums.
		Our user-friendly interface makes it easy for you to navigate the platform and acess your courses quickly.</p>
		<p class="fs-5">We believe that everyone should have access to quality education, regardless of their location or financial situation.</p>
		<p class="fs-5">That's why we offer affordable pricing options and scholarships for those in need.</p>
		<p class="fs-5">Join our community of learners today and take the first step towards achieving your learning goals. Start exploring our courses now and discover the possibilities that await you.</p>
		</div>
		</div>
		<div class="row">
			<div class="col-sm-4 ">
				<a href="#" target="_blank"><div class="card p-5 d-flex justify-content-center align-items-center">
					<img height="150px" width="150px" src="{{asset('img/instagram.jpg')}}">
				</div></a>
			</div>
			<div class="col-sm-4">
				<a href="#" target="_blank"><div class="card p-5 justify-content-center align-items-center">
					<img height="150px" width="150px" src="{{asset('img/facebook.png')}}">
				</div></a>
			</div>
			<div class="col-sm-4">
				<a href="#" target="_blank"><div class="card p-5 justify-content-center align-items-center">
					<img height="150px" width="150px" src="{{asset('img/linkedin.png')}}">
				</div></a>
			</div>
			</div>
		</div>

	</div>
	<div class="card m-2 p-5 about-card text-center">
	<h2 class="text-center">Our Mission and Vision</h2>
	<p class="fs-5">VtechSchool is a Digital Learning Platform established with the major aim of creating an interface, a platform that guides those who are hungry for digital skills, Global Skills & Entrepreneurial Skills with or without prior experience across africa.</p>
	<p class="fs-5">Our vision is to train and propagate knowledge via sharing ideas in a more efficient learning process by creating short and efficient exercises in your course of choices.</p>
	<p class="fs-5">Our Mission is to breed Digital Experts Globally that will disrupt the learning industry, bring positive digital changes to the Global workforce and become entrepreneurs to solve world economic and business problems.</p>
	</div>
</div>
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
@if(route('about'))
<script type="text/javascript">
  document.title='About';
</script>
@endif
@endsection