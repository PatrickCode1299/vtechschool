@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row p-5">
        @if(!empty($user_course))
        <h2 style="font-weight:bolder;">Courses You're Taking</h2>
        @foreach($user_course as $course)
        <?php
        $parameter=[
            'id' => $course->course_title,
            'owner' => $course->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
         <div class="col-sm-4" style=" margin-top: 20px;">
        <img loading="lazy"  class="buy-showcase img-rounded img-thumbnail" src="{{asset('storage/preview/'.$course->preview)}}">
        <small style="letter-spacing:5px; margin-top: 10px; color: darkgreen; font-weight: bold; font-size: 14px;" class="block">{{$course->price}}&#8358;</small>
        <span> {{$course->views}}</span>
        <h5 style="font-weight:bolder; color:black;">{{$course->course_title}}</h5>
        <a class="btn btn-md btn-primary" href="{{route('watch.show',$parameter)}}">View</a>
       </div>
    </div>
    @endforeach
    @else
     <section class="site-introduction" style="margin-top:0px;">
        <div class="container-fluid d-flex justify-content-center align-items-center">
        <div class="intro-content m-5">
            <h1 style='font-weight:bold;'>Purchase a course by starting from here</h1>
            <p>Checkout some of the courses on our website to help kickstart a wonderful career and start a life changing moment and earn well to boost your career.</p>
                <a style="color:white;" href="{{route('explore')}}" class='btn btn-md btn-primary'>Find Courses</a>
        </div>
    <div class='static-user-img m-5'>
      <img  class="img-responsive img-rounded" style="border-radius: 10px;max-width:200px; max-height:200px;" alt="Student Pic" src="{{asset('img/vtechlogo.png')}}" />
        </div>
        </div>
      </section>
</div>
@endif
@endsection
