@extends('layouts.tutor')
@section('content')
<section class="main-content">
 <div class="instructor-view container">
    <div class="card card-head-tutor shadow-lg">
      <div>
      <h2 class="tutor-heading">Hello, {{Auth::guard('admin')->user()->name}}</h2>
      <p class="welcome-text">
      I am Patrick, and i am here to help you navigate your account
    </p>
    </div>
    <div>
    <img class="welcome-img" src=" {{asset('img/welcome.png')}}" width="100" height="200" loading="lazy">
    </div>
    </div>
  </div>
</section>
<section class="main-content">
 <div class="instructor-view container">
    <div class="card card-head-tutor shadow-lg">
      <div>
      <h4 class="tutor-heading">Hey, {{Auth::guard('admin')->user()->name}}
      If you are a new tutor.</h4>
      <p class="welcome-text">
      Go to profile on a computer you would see the navigation menu on the left, on your mobile device you would find it on the top right corner.
      <p>Upload a co-operate head shot picture of you on it.
        <strong>Before you click the upload button, ensure you add a complete description of yourself, like what you currently do. 
        Places you have worked and your position etc.</strong>
      </p>
      <p><strong>Then proceed to add your highest educational qualification in the complete your educational info part.</strong>
      </p>

    </p>
    </div>
    <div>
    <img class="welcome-img" src=" {{asset('img/welcome.png')}}" width="100" height="200" loading="lazy">
    </div>
    </div>
  </div>
</section>
<section class="main-content">
 <div class="instructor-view container">
    <div class="card card-head-tutor shadow-lg">
      <div>
      <h4 class="tutor-heading">Uploading your Courses</h4>
      <p>As a tutor your role is to create a lecture which means every courses you want to lecture has to have differrent topics</p>
      <p>As to every school is an introductory class, ensure this is the first video you would upload for every of your course.</p>
      <p>As an example: You are teaching a course titled <b>"The Complete Graphics Design Course"</b> The first part of the video should be the introduction where you: <b>Introduce your self, your name, what the students are going to learn in the course, the benefits of purchasing the course and what they get which is a certificate from the company.</b></p>
    </div>
    <div>
    <img class="welcome-img" src=" {{asset('img/welcome.png')}}" width="100" height="200" loading="lazy">
    </div>
    </div>
  </div>
</section>
<section class="main-content">
 <div class="instructor-view container">
    <div class="card card-head-tutor shadow-lg">
      <div>
      <h4 class="tutor-heading">The Practical Part</h4>
      <p>To put your created content online. Ensure the filesize of each video has met the required standard of the website for example: if the required size for a video is <b>80MB and your video is 100MB</b> you would be unable to upload</p>
      <p></p>
      <p>
        <h6>Now to the main uploading part</h6>
        <b>Its important you follow these instructions</b>
        <ol>
          <li>You can't upload multiple videos</li>
          <li>Every topic needs a preview image which can either be the default graphics you provided for the initial upload or a differrent picture</li>
          <li>You can only upload one video at a time</li>
        </ol>
      <h6><b>Ensure you follow these instructions for the right uploading</b></h6>
      <ol>
        <li class="m-2">For every topic upload you need to select the same category example: if you want to upload a course on <b>"The Complete Graphics Design Course"</b> Select Graphics Design Category 
          <div>
          <img src="{{asset('img/category_sample.png')}}" height="auto" width="100%">
        </div>
        </li>
        <li class="m-2">Use thesame course title, as in our previous example: if the title of the course is:<b>"The Complete Graphics Design Course"</b>
        ensure you copy it and put it into the Course Title field again for the next video you want to upload </li>
        <li class="m-2">Module title has to be differrent: <b>For every video you create under a certain course is a topic which means the first video is introduction, then the next video that follows might be elements of graphics design, the fields under graphics design or whatever topic you want to give to it.</b>
        </li>
        <li class="m-2">Course Descriptions are optional only use them for the first introductory video</li>

      </ol>
      </p>
    </div>
    <div>
    <img class="welcome-img" src=" {{asset('img/welcome.png')}}" width="100" height="200" loading="lazy">
    </div>
    </div>
  </div>
</section>
@if(route('tutor_payment'))
<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript">
  document.title='How to Setup Your Account';
  var document_name=document.title;
  if(document_name){
    $("#profile").attr("class","list-group-item list-group-item-action main py-2 ripple");
    $("#settings").attr("class","list-group-item list-group-item-action main py-2 ripple active");

  }
</script>
@endif
@endsection