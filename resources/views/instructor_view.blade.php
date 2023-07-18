@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row" style="flex-direction: row-reverse; align-items: center; justify-content: center;">
			<div class="col-sm-4">
				 @if(empty($tutor_info->avatar))
        <img src="{{asset('storage/profile_pic/default.jpg')}}"
              height="200px" width="200px" style="border-radius:50%;" class="float-right img-circle  img-circle" alt="Avatar" loading="lazy" />
        @else
        <img src="{{asset('storage/profile_pic/'.$tutor_info->avatar)}}"
              height="200px" width="200px" style="border-radius:50%;" class="float-right img-circle  img-rounded" alt="Avatar" loading="lazy" />
        @endif
			<h2 class="fs-6" style="margin-bottom:0px;">Instructor</h2>
			<h1 style="font-weight:bold;">{{$tutor_info->name}}</h1>
			<h5>Total Students</h5>
			<small class="fs-4" style="font-weight:bold;">{{number_format($student_count[0])}}</small>
			<div style="border:none;" class="card nobg noborder p-4">
				<h5>Educational Background</h5>
				<p>{{$tutor_info->school}}</p>
				<h5>Educational Qualification</h5>
				<p>{{$tutor_info->qualification}}</p>
			</div>
			<div style="border:none;" class="card nobg noborder p-4">
				<h5>About</h5>
				<p>{{$tutor_info->about}}</p>
			</div>
			</div>
		
	</div>
	<div class="container-fluid">
				<h2 style="margin-top:20px; margin-bottom: 20px;">Tutor courses</h2>
				<div class="row">

				@foreach($tutor_course as $courses)
				<?php
        $parameter=[
            'id' => $courses->created_at,
            'owner' => $courses->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
				<div class="col-sm-4">
				<div class="card shadow-sm preview">
 			<img loading="lazy"   class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$courses->preview)}}">
 			<p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$courses->course_title}}</p>
 			<small style="word-wrap:break-word;">{{$courses->tutors_name}}</small>
 			<a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
 			</div>
				</div>
				@endforeach
				</div>
			</div>
		</div>
</div>
@endsection