@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex">
<div class="card bg-white p-4  all-modules-container">
	<div class="list-group">
		@foreach($module as $modules)
		<div class="list-group-item p-4" style="margin-top: 10px;">
		<img alt="user-content" src="{{asset('storage/preview/'.$modules->preview)}}" height="100px" width="100px" class="float-left img-rounded img-thumbnail">
		<span onclick="changeVideo('<?php echo $modules->file1; ?>')" style="font-weight:bold; cursor:pointer;">{{$modules->module_title}}</span>
		
		</div>
		@endforeach
	</div>
</div>
<div class="video-container" style="flex:2; position:relative;">
		<div  id="loading" height="100%" width="100%" style="display:flex; justify-content:center; align-items:center;"><img height="100" width="100" src="{{asset('img/loader.gif')}}"></div>
	    <video width="100%" height="auto"  ontimeupdate="currentVideoTime()"   id="my-video" loading="lazy" >
  		<source id="video-display" src="{{asset('storage/uploads/'.$video_details->file1)}}" type="video/mp4">
  		
		</video>
		<div class="play-pause-container">
		<span  style="cursor:pointer; width: 60px; border: 2px solid red; border-radius: 50%; color: red; font-size: 45px;" class="d-flex fs-1  justify-content-center p-2 align-items-center"><i onclick="playVideo()" id="play-icon" class="fa fa-play"></i><i id="pause-icon" onclick="pauseVideo()" class="d-none fa fa-pause"></i></span>
	  </div>
		<div class="d-flex justify-content-start">
		<span style="color:red;" id="currentTime"></span>
		<span id="length" style="margin-left: 10px; flex: 2; margin-right: auto; "></span>
		<span style="color:red;" id="duration"></span>
		</div>
		<div card="card p-4">
		@if(empty($tutor_info->avatar))
		<img height="40px" style="border-radius:50%;" width="40px" class="m-2 img-circle float-left" src="{{asset('storage/profile_pic/default.jpg')}}">
		@else
		<img height="40px" style="border-radius:50%;" width="40px" class="m-2 img-circle float-left" src="{{asset('storage/profile_pic/'.$tutor_info->avatar)}}">
		@endif
		<span style="font-weight:bolder; margin-bottom:0px;">{{$tutor_info->name}}</span>
		@if($course_views > 1)
		<h6 style="margin-left:60px; margin-top:0px;">{{number_format($course_views)}} Views</h6>
		@else
		<h6 style="margin-left:60px; margin-top:0px;">{{number_format($course_views)}} Views</h6>
		@endif
		<h1 class="m-2" style="clear:both;">{{$video_details->course_title}}</h1>
		<p class="m-2" style="clear:both;" class="fs-5">{{$video_details->description}}</p>
		<div class="list-group">
		@foreach($module as $modules)
		<div class="list-group-item p-4" style="margin-top: 10px;">
		<img alt="user-content" src="{{asset('storage/preview/'.$modules->preview)}}" height="100px" width="100px" class="float-left img-rounded img-thumbnail">
		<span onclick="changeVideo('<?php echo $modules->file1; ?>')" style="font-weight:bolder; cursor:pointer;">{{$modules->module_title}}</span>
		</div>
		 <?php
        $parameter=[
            'tutor_email' => $modules->unique_id,
            'course_title' => $modules->course_title
        ];
        $parameter=Crypt::encrypt($parameter);
        ?>
		@endforeach
		@if(empty($course_exam))
		<a href="#" class="btn m-2 btn-success btn-lg"><b class="text-danger">Exam not set</b></a>
		@else
		<a href="{{route('exam.show',$parameter)}}" class="btn m-2 btn-success btn-lg"><b>Take Exam</b></a>
		@endif
	</div>
		</div>
</div>
</div>
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript">
	document.title='{{$video_details->course_title}}';
</script>
<script type="text/javascript">
	function changeVideo(source){
		var video_viewer=document.getElementById("video-display");
		
		var setCurrentVideo=document.createElement("source");
		var videoContainer=document.getElementById("my-video");
		videoContainer.removeChild(videoContainer.firstElementChild);
		setCurrentVideo.setAttribute("src","/storage/uploads/"+source);
		setCurrentVideo.setAttribute("type","video/mp4");
		videoContainer.appendChild(setCurrentVideo);
		videoContainer.load();
		videoContainer.play();
		var playIcon=document.getElementById("play-icon");
		var pauseIcon=document.getElementById("pause-icon");
		playIcon.style.display="none";
		pauseIcon.setAttribute("class","fa fa-pause");
		pauseIcon.style.display="block";


		
	}
	var video = document.getElementById("my-video");
video.onloadstart = function() {
   var loadingicon= document.getElementById("loading");
   loadingicon.style.display="block";
};
var videoloaded = document.getElementById("my-video");
videoloaded.onloadeddata = function() {
var loadingicon= document.getElementById("loading");
loadingicon.style.display="none";
};
function playVideo(){
	var currentVideo=document.getElementById("my-video");
	if(currentVideo.play()){
	var playIcon=document.getElementById("play-icon");
	var pauseIcon=document.getElementById("pause-icon");
	playIcon.style.display="none";
	pauseIcon.setAttribute("class","fa fa-pause");
	pauseIcon.style.display="block";
	}else{
		currentVideo.play();
	}
} 
function pauseVideo(){
	var currentVideo=document.getElementById("my-video");
	if(currentVideo.pause()){
	var playIcon=document.getElementById("play-icon");
	var pauseIcon=document.getElementById("pause-icon");
	playIcon.style.display="block";
	pauseIcon.setAttribute("class","d-none fa fa-pause");
	pauseIcon.style.display="none";
	}else{
		var playIcon=document.getElementById("play-icon");
		var pauseIcon=document.getElementById("pause-icon");
		playIcon.style.display="block";
		pauseIcon.setAttribute("class","d-none fa fa-pause");
		pauseIcon.style.display="none";
		currentVideo.pause();
	}
}
function currentVideoTime(video){
	var video=document.getElementById("my-video");
	var showCurrentTime=document.getElementById("currentTime");
	var showDuration=document.getElementById("duration");

	var current_time=Math.floor(video.currentTime).toString();
	var duration= Math.floor(video.duration).toString();
	showCurrentTime.innerHTML=formatSecondsAsTime(current_time);
	if(isNaN(duration)){
		showDuration.innerHTML='00:00';
	}else{
		showDuration.innerHTML=formatSecondsAsTime(duration);
		

	}
}
function formatSecondsAsTime(secs, format){
	var getLength=secs;
	var lengthHolder=document.getElementById("length");
	
	
	var hr=Math.floor(secs/3600);
	var min=Math.floor((secs- (hr * 3600))/60);
	var sec=Math.floor(secs - (hr * 3600) - (min * 60));
	if(min < 10){
		min = "0"+min;

	}
	if(sec < 10){
		sec = "0" + sec;
	}
	return min + ":" + sec;
}

</script>
@endsection