@extends('layouts.app')
@section('content')
	<section class="popular-courses-form p-4">
        <div class="container-fluid p-2" style="margin-top: 0px;">
            <h1 class="p-2" style="font-weight:bold; color: #000000;">We have found this courses for you.</h1>
        <div class="p-2 showcase-course">
        @foreach($courses_detail as $course)
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
<section class="footer" style="margin-top:150px;">
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
                <a target="_blank" href="https://wa.me/2347030818711"><i class="fab fa-whatsapp"></i></a>
                <a target="_blank" href="https://t.me/+VBWOhYfBKOUAYu0a"><i class="fab fa-telegram"></i></a>
                VtechSchool &copy;     <?php echo date('Y'); ?></p>
        </footer>
        </section>
@endsection