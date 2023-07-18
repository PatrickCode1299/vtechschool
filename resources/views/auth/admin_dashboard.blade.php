@extends('layouts.tutor')
@section('content')
<section class="main-content">
  <div class="instructor-view container">
    <div class="card card-head-tutor shadow-sm">
      <div>
      <h2 class="tutor-heading">Hello, {{Auth::guard('admin')->user()->name}}</h2>
      <p class="welcome-text">
      You can always update your profile information on here for necessary changes thanks.
    </p>
    </div>
    <div>
    <img class="welcome-img" src=" {{asset('img/welcome.png')}}" width="100" height="200" loading="lazy">
    </div>
    </div>
  </div>
</section>
<section class="some-info">
  <div class="card card-short-details shadow-sm" style="height: auto;">
    <h2>Your Location</h2>
    <p><i class="fa fa-location"></i>{{$users->location }}</p>
  </div>
  <div class="card card-short-details shadow-sm" style="height:auto;">
  <h2>Date Joined</h2>
  {{$users->created_at }}
  </div>
</section>


@if(empty($users->school))
<section class="education-info">
  <div class="flex-div-edu-info shadow-lg">
    <h2>Complete your education info</h2>
    <form method="POST" action="{{route('edu.info')}}" class="form-inline">
      @csrf
      <div class="form-group">
        <label for="school attended">University | College</label>
        <input type="hidden" value="{{$users->email}}" name="email">
        <input type="text" class="form-control" placeholder="What school did you attend" name="school" required>
      </div><br />
      <div class="form-group">
        <label for="qualificatiion">Qualification Obtained</label>
        <input type="text" class="form-control" placeholder="e.g B.SC, HND, B.A, M.SC" name="qualification">
      </div><br />
      <button class="btn btn-primary btn-md">Save</button>
    </form>
  </div>
</section>
@else
<br />
<section class="education-info-bg">
  <div class="card  card-edu-info">
     <h2>Educational Background</h2>
    <h4>School Attended</h4>
    <p><b>{{$users->school}}</b></p>
    <h4>Educational Qualification</h4>
    <p><b>{{$users->qualification}}</b></p>
  </div>
</section>
@endif
@if(empty($users->avatar))
<section class="education-info">
  <div class="flex-div-edu-info shadow-lg">
    <h2>Update your profile picture</h2>
    <form method="POST" action="{{route('upload.pic')}}" enctype="multipart/form-data" class="form-inline">
      @csrf
      <div class="form-group">
       
          <input type="hidden" name="unique_id" value="{{$users->email}}">
          <input type="hidden" name="tutor_name" value="{{$users->name}}">
          <label for="about-user">About   (<span class="text-danger">required</span>)</label>
          <textarea name="about" style="resize: none; height: 400px;" placeholder="Write something lenghty about yourself e.g I am Patrick a Web developer at Veritas Technology School , i have worked as a Website Developer for over a decade, my area of specialization involves Web Development......" class="form-control" required></textarea>
          <label>Upload your profile Picture</label>
          <input type="file" name="file" class="form-control file">
        </div><br />
      <button class="btn btn-primary btn-md">Upload</button>
    </form>
  </div>
</section>
@else
<section class="background-info">
  
</section>
@endif
    </div>
@endsection
@if(route('admin_dashboard'))
<script type="text/javascript">
  document.title='Profile';
</script>
@endif