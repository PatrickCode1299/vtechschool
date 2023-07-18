@extends('layouts.app')
@section('content')
      <section class="site-introduction" style="margin-top:0px;">
        <div class="container-fluid site-intro-container justify-content-center align-items-center">
        <div class="intro-content m-5">
            <h1 style='font-weight:bold;'>Learn any Skill on the Go.</h1>
            <p>Vtechschool is number one e-learning platform in Nigeria targeted to everyone across Africa who wants to learn a certain skill either for knowledge or getting a job. Our mission is to provide a huge impact on the students who enrol for the courses on our platform and give them the opportunity to start their own career across various fields.<br /> 
                We crush the barriers to getting a degree....</p>
                <a style="color:white;" href="{{route('explore')}}" class='btn btn-md btn-primary'>Explore Courses</a>
        </div>
    <div class='static-user-img m-5'>
      <img  class="img-responsive img-rounded student-pic"  alt="Student Pic" src="{{asset('img/vtechlogo.png')}}" />
        </div>
        </div>
      </section>
      <section class="popular-courses-form p-4 m-2">
        <div class="container-fluid p-2" style="margin-top: 30px;">
            <h1 class="p-2" style="font-weight:bold; color: #000000;">We have prepared this courses for you.</h1>
        <div class="p-2 showcase-course">
        @foreach($courses as $course)
          <?php
        $parameter=[
            'id' => $course->created_at,
            'owner' => $course->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
        <div class="col-sm-4" style=" margin-top: 20px;">
        <img loading="lazy"  class="buy-showcase img-rounded img-thumbnail" src="{{asset('storage/preview/'.$course->preview)}}">
        <small style="letter-spacing:5px; margin-top: 10px; color: darkgreen; font-weight: bold; font-size: 14px;" class="block">{{$course->price}}&#8358;</small>
        <small style="letter-spacing:5px; margin-top: 10px; color: black; font-weight: bold; font-size: 14px;" class="block"><s>25,000</s>&#8358;</small>
        <span style="color:black;"> {{$course->views}}</span>
        <h5 style="font-weight:bolder; color:black;">{{$course->course_title}}</h5>
        <a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
       </div>
        
        @endforeach
        </div>
        </div>
        </section>
        <section class="learn-from-us m-10">
        <div class="container shadow-lg">
        <div class="d-flex justify-content-center align-items-center">
        <div class='static-user-img'>
        <img loading="lazy" height="100px" width="100px"  class="img-responsive"  alt="Student Pic" src="{{asset('img/vtechlogo.png')}}" />
        </div>
        <div class="why-learn">
            <h1>Why We Learn <br /> From VtechSchool</h1>
            <p>Education is not just about gaining knowledge, but also about developing critical thinking, building character, and unlocking opportunities. That's why we choose to learn from VtechSchool - to shape our minds, expand our knowledge across various fields, and pave the way for a brighter future."</p>
            <h2>Why you should take our Courses</h2>
                <ul>
                    <li>Word Class</li>
                    <li>Flexible</li>
                </ul>
                <ul>
                    <li>Affordable</li>
                    <li>Job relevant</li>
                </ul>
                @if(Auth::guard('web')->check())
                <a style="color:white;" href="{{route('explore')}}" class="ml-5 btn btn-md btn-primary">Explore Courses</a>
                @else
                <a style="color:white;" href="{{ route('register') }}" class="ml-5 btn btn-md btn-primary">Register Now</a>
                @endif
        </div>
        </div>
        </div>
        </section>
        <section  class="explore m-5">
        <div class='container explore-container shadow-lg'>
        <div class="explore-heading">
        <h1 class="text-center bold">Explore Company Courses.</h1>
        <p class="text-center" style="word-wrap:break-word;">Vtechschool is number one e-learning platform in Nigeria targeted to everyone across Africa who wants to learn a certain skill either for knowledge or getting a job. Our mission is to provide a huge impact on the students who enrol for the courses on our platform and give them the opportunity to start their own career across various fields.<br /> 
                We crush the barriers to getting a degree....</p>
        </div> 
            <div class="row explore explore-card bg-none">
            @foreach($category as $cat)
            <div class='col-sm-4'>
             <div class="card">
            <div class="card-body fs-3 text-center">
            <?php
            $category=Crypt::encrypt($cat->category);
            ?>
            <a href="{{route('showcourse',$category)}}">{{$cat->category}}</a>
            </div>
            </div>
            </div>
            @endforeach
            </div>
            <center><button style='margin-top:40px' class="btn btn-md btn-primary"><a href="{{route('explore')}}">Explore all</a></button></center>
        </div>
        </section>
        <section  class="explore m-5">
        <div class='container shadow-lg explore-container'>
        <div class="explore-heading">
        <h1 class="text-center bold">People Say About Our Courses</h1>
        <p class="text-center" style="word-wrap:break-word;">Vtechschool is number one e-learning platform in Nigeria targeted to everyone across Africa who wants to learn a certain skill either for knowledge or getting a job. Our mission is to provide a huge impact on the students who enrol for the courses on our platform and give them the opportunity to start their own career across various fields.<br /> 
                We crush the barriers to getting a degree....</p>
        </div> 
            <div class="row justify-content-center explore explore-card bg-none">
            <div class='col-md-4'>
             <div class="card shadow-sm" style="max-height: auto;">
            <div class="card-body d-flex fs-6">
            <img loading="lazy" class="img-rounded" src="{{asset('img/ME.jpg')}}" style="width:50%; max-height:80px;">
            <div class="p-2">
                <h3>Amazing Courses</h3>
                <p>I enjoy training students on Vtechschool, they have a wonderful resource to help me impact my skills...</p>
                <small><i>Akintola Patrick</i></small>
            </div>
            </div>
            </div>
            </div>
           <div class='col-md-4'>
             <div class="card" style="max-height: auto;">
            <div class="card-body d-flex fs-6">
            <img loading="lazy" class="img-circle" src="{{asset('img/onthego.jpeg')}}" style="width:80%; max-height:80px;">
            <div class="p-2">
                <h3>Best Learning Platform</h3>
                <p style="word-wrap:break-word;" class="break-word word-wrap">They are a great learning platform, i can always agree to that. The courses on their platform are well taught.</p>
                <small><i>Jane Gordon</i></small>
            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
        </section>
        <section class="container update-section">
            <div class="center-sub-div">
            <h2 class="sub-text">Subscribe For Get Update<br /> Every New Courses</h2>
            <form class="input-group" onsubmit="clickAction()">
                <input class="form-control" placeholder="Your Email Adddress" type="email" name="subscribe_mail">
                <button class="btn btn-lg btn-primary" disabled>Subscribe</button>
            </form>
            <script type="text/javascript">
                function clickAction(){
                    return false;
                }
            </script>
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
    @endsection
</html>
