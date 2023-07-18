@extends('layouts.app')
@section('content')
<section class="container-fluid d-flex justify-content-center">
	<div  class="card  bg-white p-5">
		<div class="container p-2">
		<h2>New Courses</h2>
		
			@if(!empty($new_course))
			<div class="row">
			@foreach($new_course as $newcourse)
			<div class="col-sm-4  shadow-sm">
				<div class="card p-2 m-2 dashboard-card" style="width: 80%;">
				<div class="d-flex align-items-center p-2 justify-content-center shadow-sm">
					<img loading="lazy" alt="profile-pic" src="{{asset('storage/preview/'.$newcourse->preview)}}" class="course-profile-img">
				</div>
				 <?php
        	$parameter=[
            'id' => $newcourse->created_at,
            'owner' => $newcourse->unique_id
        	];
        	$parameter=Crypt::encrypt($parameter);
        	?>
				<a href="{{route('preview.show',$parameter)}}"><small class="fs-5" style="margin-left: 10px; font-weight:bolder;"><i class="fa-solid fa-book"></i> {{$newcourse->course_title}}</small></a>
				</div>
			</div>
			@endforeach
				</div>
			@else
			<h5>Featured course will be here..</h5>
			@endif
	
		<div class="list-group dashboard-list" style="margin-top:20px;">
			<h4>My Courses</h4>
			<span class="fs-6">Course Name</span>
			@if(!empty($user_course))
			@foreach($user_course as $getcourse)
			 <?php
        $parameter=[
            'id' => $getcourse->course_name,
            'owner' => $getcourse->instructor_name
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>

			<a href="{{route('watch.show',$parameter)}}" style="font-weight:bold;" class="p-4 list-group-item"><i class="fa-solid fa-book m-2"></i>{{$getcourse->course_name}}</a>
			@endforeach
			@else
			<a href="{{route('explore')}}"><h5>Start here by purchasing a course</h5></a>
			@endif
		</div>
		</div>
	</div>
	<!--
	<div class="card d-mobile-none student-detail-short bg-white p-5">
		
		<div class="container p-2">
			<div class="card d-flex align-items-center p-2 justify-content-center shadow-sm">
				<img class="img-circle user-profile-img" src="../img/vtechlogo.png">
				<small class="text-center">{{Auth::guard('web')->user()->name}}</small>
			</div>
		</div>
		<div class="list-group dashboard-list" style="margin-top:20px;">
			<h4>Course Progress</h4>
			<a href="" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</a>
			<a href="" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</a>
			<a href="" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</a>
			<a href="" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</a>
			<a href="" class="list-group-item">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</a>
		</div>
	
	</div>
	-->
</section>
@endsection
