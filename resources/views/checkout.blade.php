@extends('layouts.app')
@section('content')
<section class="container">
<div class="card p-5 shadow-sm">
    <div class="container">
    <div class="row">
    <div class="col">
    <span><img alt="coldigify-logo" src="{{asset('img/vtechlogo.png')}}" style="max-height:150px; width: 150px;">Fill in the required information and proceed to merchant site.</span>
<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
    @csrf
    <div class="row" style="margin-bottom:40px;">
        <div class="col-md-8 col-md-offset-2">
            <label style="font-weight:bold;" class="m-2 fs-5">Your Phone Number</label>
            <input type="text" placeholder="Your Phone Number" class="form-control" name="phone">
           <input type="hidden" name="email" value="{{Auth::user()->email}}">
           <input type="hidden" name="student_name" value="{{Auth::user()->name}}">
            <label style="font-weight:bold;" class="m-2 fs-5">Your City</label>
            <input type="text" placeholder="Your City e.g Owerri" class="form-control" name="city">
           <input type="hidden" name="course_name" value="{{$course_info->course_title}}"> 
           <input type="hidden" name="instructor_name" value="{{$course_info->unique_id}}"> 
           {{-- required --}}
           <?php 
               session_start();
        $_SESSION['course_title'] = $course_info->course_title;
        $_SESSION['tutors_email'] = $course_info->unique_id;
        $_SESSION['student_email'] = Auth::user()->email;
        $_SESSION['student_name'] = Auth::user()->name;
        $_SESSION['course_price'] = $course_info->price;
        
           $newprice=$course_info->price."00.00";
           ?>
            <input type="hidden" name="amount" value="{{$newprice}}"> {{-- required in kobo --}}
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <p>
                <button class="btn m-2 float-right btn-success btn-lg btn-block" type="submit" value="Pay Now!">
                    <i class="fa fa-plus-circle fa-lg"></i> To Payment
                </button>
            </p>
        </div>
    </div>
</form>
</div>
<div class="col">
   <h2>Summary</h2>
   <table border="1" class="table table-striped">
       <tr>
           <td>Original Price</td>
           <td>&#8358;{{$course_info->price}}</td>
           
       </tr>
       <tr>
            <td>Total</td>
           <td>&#8358;{{$course_info->price}}</td>
       </tr>
       <tr>
        <h5>The course you are purchasing:</h5>
           <td><img alt="item" loading="lazy" class="img-rounded img-thumbnail" height="50px" width="50px"  class="buy-showcase img-rounded img-thumbnail" src="{{asset('storage/preview/'.$course_info->preview)}}">{{$course_info->course_title}}</td>
       </tr>
   </table>
</div>
</div>
</div>
</div>
</section>
@endsection