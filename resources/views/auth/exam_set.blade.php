@extends('layouts.tutor')
@section('content')
<section class="container-fluid bg-white p-5" style="width:80%; margin:0 auto; margin-top: 50px;">
<h2>All your Courses</h2>
<ul class="list-group">
@foreach($tutor_course as $get_course)
<li class="list-group-item  fs-4 pointer shadow-sm">{{$get_course->course_title}}
<?php

for ($i=1; $i <=20 ; $i++) { 
$duplicate_val=$i.$get_course->course_title;
?>

<form method="POST" id="{{$get_course->course_title.$i}}" action="{{route('set_question')}}">
	@csrf
	<input type="hidden" value="{{$get_course->course_title}}" name="course_title">
	<input type="hidden" value="{{Auth::guard('admin')->user()->email}}" 
	name="tutor_email">
	<input type="hidden" id="question_id" name="question_id" value="{{$get_course->course_title.$i}}">
	<label>Question {{$i}}</label>
	<textarea placeholder="Type the question you want to ask users for this course.. e.g Abuja is the capital of which country?" name="question" class="form-control textarea" style="resize:none; height: 100px;"></textarea>
	<label>Wrong Answer</label>
	<input type="text" placeholder="Write a wrong option e.g England" class="form-control" name="answer1">
	<label>Wrong Answer</label>
	<input type="text" placeholder="Write a wrong option e.g Germany" class="form-control" name="answer2">
	<label>Wrong Answer</label>
	<input type="text" placeholder="Write a wrong option e.g France" class="form-control" name="answer3">
	<label>Right Answer</label>
	<input type="text" placeholder="Write a right option e.g Nigeria" class="form-control" name="answer4">
	<button  type="submit" name="submit" class="btn m-2 btn-md btn-primary">Place question</button>
</form>
@foreach($tutor_question as $question_info)
<?php 
$duplicate_elem=$question_info->question_id;
echo "<script>
var hideForm=document.getElementById('$duplicate_elem');
hideForm.style.display='none';
</script>";
?>
@endforeach
<?php
}
?>
</li>
@endforeach
</ul>
</section>
@if(route('exam'))
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript">
  document.title='Set Exam';
  var document_name=document.title;
  if(document_name){
    $("#profile").attr("class","list-group-item list-group-item-action main py-2 ripple");
    $("#examset").attr("class","list-group-item list-group-item-action main py-2 ripple active");

  }
</script>
@endif
@endsection