@extends('layouts.app')
@section('content')
<div class="container-fluid p-2">
	@if(isset($exam_info))
	<h2 class="text-center font-weight-bold">THE INSTRUCTOR HAS NOT SET AN EXAM FOR THIS COURSE</h2>
	@else
	<div class="card p-5" style="display:flex; flex-direction: row;">
	<div id="number_questions">
	</div>
	<ol class="list-group-numbered  list-group list-group-flush">
	<form method="POST" name="exam" action="{{route('submit_exam')}}">
	@csrf
	<input type="hidden" name="tutor" value="{{$tutor_email}}">
	<input type="hidden" name="course" value="{{$course_title}}">
	@foreach($exam_questions as $questions)
	<h4 id="question_id"><span style="color:black;" id="question_no"></span>{{$questions->question}}</h4>
	<li class="list-group-item"><input type="radio" name="{{$questions->question_id}}" value="{{$questions->answer1}}" required><span class="m-2">A</span>{{$questions->answer1}}</li>
	<li class="list-group-item"><input type="radio" name="{{$questions->question_id}}" value="{{$questions->answer2}}" required><span class="m-2">B</span>{{$questions->answer2}}</li>
	<li class="list-group-item"><input type="radio" name="{{$questions->question_id}}" value="{{$questions->answer3}}" required><span class="m-2">C</span>{{$questions->answer3}}</li>	
	<li class="list-group-item"><input type="radio" name="{{$questions->question_id}}" value="{{$questions->answer4}}" required><span class="m-2">D</span>{{$questions->answer4}}</li><br />
	@endforeach
	<button type="submit" class="btn btn-primary btn-md">Submit Exam</button>
</form>
</ol>
<div id="exam_time" style="margin-left: auto; color:green;" class="d-flex  fs-5 bold">
			
</div>
</div>
</div>
<script type="text/javascript">

var number=document.getElementsByTagName('h4');
var q_number=0;
for (var i=1; i <= number.length; i++) {
var number_count=document.createElement('h5');
number_count.innerHTML=i;
number_count.style.marginTop='180px';
document.getElementById("number_questions").append(number_count);


}
 var tim;
 var min = 8;
 var sec = 60;
 var f = new Date();
 function f1() {
    	f2();
}
function f2() {
if (parseInt(sec) > 0) {
 sec = parseInt(sec) - 1;
 document.getElementById("exam_time").innerHTML = "Time left :"+min+" Mins ," + sec+" Seconds";
 tim = setTimeout("f2()", 1000);
}
if(parseInt(sec)==0){
	min=parseInt(min) - 1;
document.getElementById("exam_time").innerHTML = "Time left :"+min+" Mins ," + sec+" Seconds";
	sec=60;
	sec=parseInt(sec) -1;
}
if(parseInt(min)==2){
	document.getElementById("exam_time").style.color="red";
}
if(parseInt(min)==0){
	clearTimeout(tim);
	document.exam.submit();
}
}
 f1();       
</script>
<script type="text/javascript">
	document.title='User Exam';
</script>

@endif
@endsection
