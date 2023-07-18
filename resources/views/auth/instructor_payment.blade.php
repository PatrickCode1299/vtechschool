@extends('layouts.tutor')
@section('content')
<section class="main-content">
  <div class="instructor-view container-fluid">
  <div class="card card-default p-4">
  	<ul class="d-flex tutor_payment_info  list-unstyled">
  		<li class="fs-3">Total Revenue</li>
  		<li class="fs-3">Total Students</li>
  	</ul>
  	<ul class="d-flex tutor_payment_info  list-unstyled">
  		<li class="fs-5">
  			<b>&#8358;{{$tutor_revenue}}</b>
  		</li>
  		<li class="fs-5"><b>{{number_format($student_count[0])}}</b></li>
  	</ul>
  </div>
    </div>
  </div>
</section>
<section class="main-content">
  <div class="instructor-view container-fluid">
  <div class="card card-default p-4">
  	<ul class="d-flex tutor_payment_info  list-unstyled">
  		<li class="fs-3">Current Month Revenue</li>
  		<li class="fs-3">Student Count</li>
  	</ul>
  	<ul class="d-flex tutor_payment_info  list-unstyled">
  		<li class="fs-5">
  			<b>&#8358;{{$current_month_revenue}}</b>
  		</li>
  		<li class="fs-5"><b>{{number_format($monthly_student_count[0])}}</b></li>
  	</ul>
  </div>
    </div>
  </div>
</section>
@if(route('tutor_payment'))
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript">
  document.title='Tutor Payment';
  var document_name=document.title;
  if(document_name){
    $("#profile").attr("class","list-group-item list-group-item-action main py-2 ripple");
    $("#payment").attr("class","list-group-item list-group-item-action main py-2 ripple active");

  }
</script>
@endif
@endsection