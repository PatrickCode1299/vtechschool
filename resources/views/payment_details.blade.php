@extends('layouts.app')
@section('content')
<section class="container-fluid payment-details-table">
  <div class="table-responsive">
	@if(!empty($payment_info))
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Course Name</th>
      <th scope="col">Course Price</th>
      <th scope="col">Student Email</th>
      <th scope="col">Instructor Email</th>
      <th scope="col">Payment Date</th>
      <th scope="col">Receipt</th>
    </tr>
  </thead><br/>
  @foreach($payment_info as $payment)
  <tbody>
    <tr>
      <td>{{$payment->course_name}}</td>
      <td>{{$payment->payment_amount}}</td>
      <td>{{$payment->student_email}}</td>
      <td>{{$payment->instructor_name}}</td>
      <td>{{$payment->created_at}}</td>
      <td><button onclick="generatePDF('{{$payment->course_name}}')" class="btn btn-sm btn-primary">Generate</button></td>
      <td>
        <div id="{{$payment->course_name}}">
          <img src="{{asset('img/vtechlogo.png')}}" height="100px" width="100px">
          <h1>Successful Payment</h1>
          <h4>{{$payment->course_name}}</h4>
          <p>This payment was made on this day <b>{{$payment->created_at}}</b></p>
          <h6>Instructor Email:{{$payment->instructor_name}} </h6>
          <h6>Student Email:{{$payment->student_email}} </h6>
          <small><b>Valid Payment</b></small>
          <small><b>Valid Payment</b></small>
          <small><b>Valid Payment</b></small>
        </div>
      </td>
    </tr>
  </tbody><br/>
    @endforeach
</table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
  <script>
   function generatePDF(course) {
   const element = document.getElementById(course);
   var opt = {
      margin:       0.0,
      filename:     '{{$payment->course_name}}',
      image:        { type: 'jpeg', quality: 6.0 },
      html2canvas:  { scale: 1 },
      jsPDF:        { unit: 'mm', format: 'A6', orientation: 'portrait' }
    };
    // Choose the element that our invoice is rendered in.
    html2pdf().set(opt).from(element).save();
   }
  </script>
@else

<div class="container bg-white shadow-lg p-4">
<h2>You haven't bought any courses yet</h2>
<a style="color:white; hover:white;" href="{{route('explore')}}" class="btn btn-md btn-success">I will show you some courses</a>
</div>
@endif
</section>
@endsection