@extends('layouts.app')
@section('content')
<div class="container">
	<div class="jumbotron" style="margin-bottom: 20px; height: ; position: relative;">
		<img  src="{{asset('storage/preview/ad.jpg')}}" style="border-radius: 10px;width:100%; object-fit: cover; height:300px;">

		<div style="height:auto;"  class="card explore-info shadow-lg p-4 image-rounded">
			<a href="{{route('register')}}">
			<h3 style="font-weight:bolder;" class="fs-2">Explore Courses</h3>
			<p class="fs-5">That boost your creativity and prepare you for a world full of dreams</p></a>
		</div>
	</div>
	@if(isset($user_category))
	<div class="row">
		<h2 style="margin-bottom:30px; font-weight:bold; margin-top: 20px;">You are interested in</h2>
		@foreach($user_category as $users_category)
		<div class="col-sm-4">
            <?php
        $parameter=[
            'id' => $users_category->created_at,
            'owner' => $users_category->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
			<a href="{{route('preview.show',$parameter)}}"><div class="card p-2">
				<img loading="lazy" style="object-fit:cover;"  class="buy-showcase img-rounded img-thumbnail" src="{{asset('storage/preview/'.$users_category->preview)}}">
				<h5 style="font-weight:bold;">{{$users_category->course_title}}</h5>
				<small>{{$users_category->tutors_name}}</small>
				<h5>{{$users_category->price}}</h5>
                <h5><s>25,000&#8358;</s></h5>
			</div></a>
		</div>
		@endforeach
	</div>
	@endif
	<div class="container">
		<h2 style="margin-bottom:5px; font-weight:bold; margin-top: 20px;">Our Users are Learning</h2>
        <div class="p-2 showcase-course" style="margin-bottom:20px;">
		@foreach($all_category as $our_category)
        <?php
        $parameter=[
            'id' => $our_category->created_at,
            'owner' => $our_category->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
		<div class="col-sm-4" style="margin-left:10px; margin-top: 20px; margin-bottom: 40px;">
			<a href="{{route('preview.show',$parameter)}}">
                <div class="card p-2">
                <h4 style="font-weight:bold;">{{$our_category->category}}</h4>
				<img loading="lazy" style="object-fit:cover;"  class="buy-showcase img-rounded img-thumbnail" src="{{asset('storage/preview/'.$our_category->preview)}}">
				<h5 style="font-weight:bold;">{{$our_category->course_title}}</h5>
				<small>{{$our_category->tutors_name}}</small>
				<h5>{{$our_category->price}}</h5>
                <h5><s>25,000&#8358;</s></h5>
			</div>
        </a>
	</div>
	@endforeach
    </div>
	</div>
	<div class="container-fluid get-started">
		<h3  style="font-weight:bolder; margin-top: 10px; color:black;">Courses to get you started</h3>
		<div class="slideshow-container embed-responsive-item">
<div class="embed-responsive takearrow embed-responsive-4by3">
<div class="mySlides ">
 <div class="row">
 	<h5>Graphics Design</h5>
 	@foreach($graphics as $ttl)
 	<?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
 	<div class="col-sm-4">
 		<div class="card shadow-sm preview">
 			<img loading="lazy"    class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$ttl->preview)}}">
 			<p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
 			<small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
 			<a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
 		</div>
 	</div>
 	@endforeach
 </div>
</div>

<div class="mySlides ">
  <div class="row">
  	<h5>Web Development</h5>
  	@foreach($web as $ttl)
  	<?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
 	<div class="col-sm-4">
 		<div class="card shadow-sm preview">
 			<img loading="lazy"   class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$ttl->preview)}}">
 			<p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
 			<small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
 			<a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
 		</div>
 	</div>
 	@endforeach
 </div>
</div>

<div class="mySlides">
  <div class="row">
  	<h5>Copywriting</h5>
 @foreach($copy as $ttl)
 <?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
 	<div class="col-sm-4">
 		<div class="card shadow-sm preview">
 			<img loading="lazy"   class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$ttl->preview)}}">
 			<p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
 			<small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
 			<a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
 		</div>
 	</div>
 	@endforeach
 </div>
</div>

<div class="mySlides">
  <div class="row">
  	<h5>Desktop Publishing</h5>
 @foreach($publishing as $ttl)
 <?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
 	<div class="col-sm-4">
 		<div class="card shadow-sm preview">
 			<img loading="lazy"   class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$ttl->preview)}}">
 			<p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
 			<small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
 			<a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
 		</div>
 	</div>
 	@endforeach
 </div>
</div>
<div class="mySlides">
  <div class="row">
  	<h5>Data Analytics</h5>
 @foreach($data as $ttl)
 <?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
 	<div class="col-sm-4">
 		<div class="card shadow-sm preview">
 			<img loading="lazy"  class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$ttl->preview)}}">
 			<p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
 			<small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
 			<a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
 		</div>
 	</div>
 	@endforeach
 </div>
</div>
<div class="mySlides">
  <div class="row">
  	<h5>Product Marketing</h5>
 @foreach($product as $ttl)
 <?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
 	<div class="col-sm-4">
 		<div class="card shadow-sm preview">
 			<img loading="lazy"  class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$ttl->preview)}}">
 			<p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
 			<small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
 			<a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
 		</div>
 	</div>
 	@endforeach
 </div>
</div>
<div class="mySlides">
  <div class="row">
  	<h5>Marketing</h5>
 @foreach($marketing as $ttl)
 <?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
 	<div class="col-sm-4">
 		<div class="card shadow-sm preview">
 			<img loading="lazy"  class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$ttl->preview)}}">
 			<p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
 			<small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
 			<a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
 		</div>
 	</div>
 	@endforeach
 </div>
</div>
<div class="mySlides">
  <div class="row">
  	<h5>Real Estate</h5>
 @foreach($estate as $ttl)
 <?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
 	<div class="col-sm-4">
 		<div class="card shadow-sm preview">
 			<img loading="lazy"  class="img-rounded img-thumbnail" src="/{{asset('storage/preview/'.$ttl->preview)}}">
 			<p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
 			<small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
 			<a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
 		</div>
 	</div>
 	@endforeach
 </div>
</div>
<div class="mySlides">
  <div class="row">
  	<h5>Photography</h5>
 @foreach($photo as $ttl)
 <?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
 	<div class="col-sm-4">
 		<div class="card shadow-sm preview">
 			<img loading="lazy"   class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$ttl->preview)}}">
 			<p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
 			<small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
 			<a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
 		</div>
 	</div>
 	@endforeach
 </div>
</div>
<div class="mySlides">
  <div class="row">
  <h5>UI Design</h5>
 @foreach($ui as $ttl)
 <?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
 	<div class="col-sm-4">
 		<div class="card shadow-sm preview">
 			<img loading="lazy"  class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$ttl->preview)}}">
 			<p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
 			<small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
 			<a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
 		</div>
 	</div>
 	@endforeach
 </div>
</div>
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>
</div>
	</div>
   <div class="container" style="margin-top:100px;">
       <h3>By Category</h3>
       <div class="row">
    <h5 style="margin-top:10px;">Web Development</h5>
    @foreach($web as $ttl)
    <?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
    <div class="col-sm-4">
        <div class="card shadow-sm preview">
            <img loading="lazy"   class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$ttl->preview)}}">
            <p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
            <small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
            <a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
        </div>
    </div>
    @endforeach
 </div><br /><br />
<div class="row">
    <h5 style="margin-top:10px;">Graphics Design</h5>
    @foreach($graphics as $ttl)
    <?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
    <div class="col-sm-4">
        <div class="card shadow-sm preview">
            <img loading="lazy"    class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$ttl->preview)}}">
            <p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
            <small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
            <a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
        </div>
    </div>
    @endforeach
 </div><br /><br />
 <div class="row">
    <h5 style="margin-top:10px;">Data Analytics</h5>
 @foreach($data as $ttl)
 <?php
        $parameter=[
            'id' => $ttl->created_at,
            'owner' => $ttl->unique_id
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
    <div class="col-sm-4">
        <div class="card shadow-sm preview">
            <img loading="lazy"  class="img-rounded img-thumbnail" src="{{asset('storage/preview/'.$ttl->preview)}}">
            <p class="fs-6" style="font-weight: bold; word-wrap:break-word;">{{$ttl->course_title}}</p>
            <small style="word-wrap:break-word;">{{$ttl->tutors_name}}</small>
            <a class="btn btn-md btn-primary" href="{{route('preview.show',$parameter)}}">Enrol</a>
        </div>
    </div>
    @endforeach
 </div>
   </div><br /><br />



	<div style="margin-top: 50px;background-color:none;" class="instructor nobg">
		<h3 style="font-weight:bolder; color:black;">Our Instructors</h3>
	 <div class="row">
	 	@foreach($tutor as $tutors)
	 	<?php
        $parameter=[
            'id' => $tutors->email,
           
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
	 	<div class="col-sm-4" style="margin-top:20px;">
	 		<a href="{{route('instructor',$parameter)}}"><div style="height: 200px;" class="card p-4 shadow-lg">
	 			 @if(empty($tutors->avatar))
        <img src="{{asset('storage/profile_pic/default.jpg')}}"
              height="80" class="float-left img-circle tutor-avatar img-rounded" alt="Avatar" loading="lazy" />
        @else
        <img src="{{asset('storage/profile_pic/'.$tutors->avatar)}}"
              height="80" class="float-left img-circle tutor-avatar img-rounded" alt="Avatar" loading="lazy" />
        @endif
        <span style="font-weight:bolder; ">{{$tutors->name}}</span>
        <p>{{$tutors->school}}</p>
        <p>{{$tutors->qualification}}</p>
	 		</div></a>
	 	</div>
	 	@endforeach
	 </div>
	</div>
<script type="text/javascript" src="{{asset('js/slide.js')}}"></script>
<script type="text/javascript">
        var slideIndex = 1;
showSlides(slideIndex);

function addtoSlides(n) {
  displaySlides(slideIndex += n);
}

function currentSlide(n) {
  displaySlides(slideIndex = n);
}

function displaySlides(n) {
  var i;
  var slides = document.getElementsByClassName("webSlides");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  slides[slideIndex-1].style.display = "block";  
  
}
</script>
@endsection