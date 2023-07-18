@extends('layouts.app') 
@section('content')
<div class="container-fluid">
<div class="container justify-content-center align-items-center">
	@if($final_score >= 55)
	<div class="d-flex exam-announce-div justify-content-center align-items-center">
	<h1  style="font-weight:bolder; margin-top:20px;" class="p-2">Hug me you made it and passed the exam...
		<div style="display:flex; flex-direction: column; justify-content:center; align-items: center;" class="card p-4">
			<h3>Your final score is:</h3>
			<p class="fs-1">{{$final_score}}&#37;</p>
			<button class="btn hide-across-screen btn-md btn-primary" onclick="generatePDF()">Get Certificate</button>
		</div>
	</h1>
	<img style="border-radius:20px;" class="m-2 img-rounded" src="{{asset('img/happy.png')}}" height="300px" width="300px" class="img-responsive">
	</div>
		<div id="container_content" style="border:none; position: relative; background: none;" class="card nobg">
		<h1 class="tutor-cert-course">{{$user_course}}</h1>
		<h1 class="user-cert-name">{{Auth::user()->name}}</h1>
		<img src="{{asset('img/certificate_present.jpg')}}" class="img-responsive">
	</div>
	@else
	<div  class="d-flex exam-announce-div justify-content-start">
	<h1  style="font-weight:bolder; margin-top:20px;" class="p-2">You failed the exam please watch the course again
		<div style="display:flex; flex-direction: column; justify-content:center; align-items: center;" class="card p-4">
			<h3>Your final score is:</h3>
			<p class="fs-1">{{$final_score}}&#37;</p>
			<a onclick="generatePDF()" style="color:white;" class="btn btn-md btn-primary" href="{{route('dashboard')}}">You didn't earn your certificate</a>
		</div>
	</h1>
	<img style="border-radius:20px;" class="m-2 img-rounded" src="{{asset('img/sad.jpg')}}" height="300px" width="300px" class="img-responsive">
	</div>
	@endif
</div>
<script type="text/javascript">
	history.pushState(null, null, document.title);
	window.addEventListener('popstate', function(){
		history.pushState(null, null, document.title);
	});
</script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <script>
   function generatePDF() {
   const element = document.getElementById('container_content');
   var opt = {
      margin:       0.0,
      filename:     '{{$user_course}}',
      image:        { type: 'jpeg', quality: 4.0 },
      html2canvas:  { scale: 0.9 },
      jsPDF:        { unit: 'mm', format: 'A4', orientation: 'landscape' }
    };
    // Choose the element that our invoice is rendered in.
    html2pdf().set(opt).from(element).save();
   }
  </script>
</div>
@endsection
