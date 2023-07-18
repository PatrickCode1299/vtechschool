@extends('layouts.tutor')
@section('content')
<section class="main-content">
  <div class="instructor-view container">
    <div class="card card-head-tutor shadow-lg">
      <div>
      <h2 class="tutor-heading">Hello, {{Auth::guard('admin')->user()->name}}</h2>
      <p class="welcome-text">
      Welcome back to VtechSchool, do well to make your courses updated and make a well detailed video thanks.
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
     <div class="container mt-5">
    <h2 class="text-center">Upload Your Course Modules</h2>
    <div>
    <form id="multi-file-upload-ajax" method="POST"  action="javascript:void(0)" accept-charset="utf-8" enctype="multipart/form-data">
      @csrf
        <div class="form-group">
        <label for="Course Title" class="fs-5 text-success bold-text">Select Category<span class="text-danger">(make sure to select the right category)</span></label>
       <select class="form-control" name="category" required>
        <option value="Web Development">Web Development</option>
        <option value="Copywriting">Copywriting</option>
        <option value="Desktop Publishing">Desktop Publishing</option>
        <option value="Data Analytics">Data Analytics</option>
        <option value="Graphics Design">Graphics Design</option>
        <option value="Product Management">Product Management</option>
        <option value="Marketing">Marketing</option>
         <option value="Real Estate">Real Estate</option>
         <option value="UI/UX Design">UI / UX Design</option>
         <option value="Photography">Photography</option>
         <option value="Others">Others</option>
       </select>
      </div>
       <div class="form-group">
        <label class="fs-5 text-success bold-text" for="Course Title">Course Title (e.g Microsoft Excel Advance Masterclass)</label>
        <input id="coursename" placeholder="Course Title e.g Data Analytics Masterclass" type="text" class="form-control" name="course_title" required>
      </div>
      <div class="form-group">
      <label class="fs-5 text-success bold-text" for="Module Title">Module Title</label>
        <input id="modulename" placeholder="e.g Module 1 Introduction" type="text" class="form-control" name="module_title" required>
      </div>
      <div class="form-group">
      <label class="fs-5 text-success bold-text" for="Course Description">Course Description</label>
        <textarea style="resize: none;" id="modulename" placeholder="Write a short description about the course you are creating, this would appear whenever the students wants to buy the course... example:Master Python by building 100 projects in 100 days. Learn data science, automation, build websites, games and apps!" type="text" class="form-control create-description" name="description"></textarea>
      </div>
      <div class="form-group">
        <input id="username" type="hidden" name="tutor_name" value="{{$users->name}}">
        <input id="uniqueid" type="hidden" name="unique_id" value="{{$users->email}}">
      </div>
      <div class="form-group">
        <label for="Course Price">Course Price</label>
        <input id="courseprice" placeholder="Course Price" type="text" class="form-control" value="2500" name="price" disabled="true" required>
      </div>
      <div class="form-group">
        <label class="fs-5 text-success bold-text" for="Course Price">Preview Image (This is what the user see when they want to buy the course only jpeg,jpg, png not greater than 200kb size supported)</label>
        <input id="previewimage"  type="file" class="form-control" name="preview">
      </div>
      <div class="form-group">
      <label class="fs-5 text-success bold-text" for="Modules">Module('You can upload multiple videos here MP4 only')</label>
      <input class="form-control" type="file" name="files[]" id="files" placeholder="Choose files" multiple >
      </div>         <br /> 
    
    <div id="percent"  class="text-danger percent"></div>


<div id="status"></div><br />
      <button type="submit" class="btn btn-primary" id="submit" >Submit</button>
      </div>     
      </form> 
     </div>
   </div>
 </section>
<section class="main-content">
  <div class="instructor-view container">
  <div class="card card-head-tutor shadow-lg">
<table class="table table-striped">
  @foreach ($courses as $course)
  <thead>
    <tr>
      <th scope="col">Course Title</th>
      <th scope="col">Module</th>
      <th scope="col">Content</th>
      <th scope="col">Option</th>
    </tr>
  </thead><br/>
  <tbody>
    <tr>
      <td>{{$course->course_title}}</td>
      <td>{{$course->module_title}}</td>
      <td>
        <div class="embed-responsive embed-responsive-4by3">
        <video loading="lazy" width="100%" height="auto" controls>
  <source src="{{asset('storage/uploads/'.$course->file1)}}" type="video/mp4">
  

</video>
    </div>
    </td>
      <td><form method="POST" class="form-inline" action="{{route('delete')}}">
        @csrf
        <input type="hidden" name="id" value="{{$course->id}}">
        <input type="hidden" name="video" value="{{$course->file1}}">
        <input type="hidden" name="picture" value="{{$course->preview}}">
        <button class="btn btn-danger btn-sm" type="submit">DELETE</button></form></td>
    </tr>
  </tbody><br/>
    @endforeach
</table>
</div>
</div>
</section>
 <script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>
 <script type="text/javascript">
$(document).ready(function (e) {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$('#multi-file-upload-ajax').submit(function(e) {
e.preventDefault();
$("#submit").attr('disabled','true');
var formData = new FormData(this);
let courseName=$('#coursename').val();
let userName=$('#username').val();
let uniqueID=$('#uniqueid').val();
let courseprice=$('#courseprice').val();
let modulename=$('#modulename').val();
let previewimage=$('#previewimage')[0];
var bar = $('.bar');


let TotalFiles = $('#files')[0].files.length; //Total files
let files = $('#files')[0];
for (let i = 0; i < TotalFiles; i++) {
formData.append('files' + i, files.files[i]);
}
formData.append('TotalFiles', TotalFiles);
formData.append('tutors_name', userName);
formData.append('unique_id', uniqueID);
formData.append('course_title', courseName);
formData.append('price', courseprice);
formData.append('module_title',modulename);
formData.append('preview',previewimage);
$.ajax({
xhr:function(){
  var xhr=new window.XMLHttpRequest();
  xhr.upload.addEventListener("progress", function(evt){
    if(evt.lengthComputable){
      var percentComplete = (evt.loaded / evt.total) * 100;
      var percent = $('.percent');
      percent.html(Math.round(percentComplete) + "%");
      percent.css('width',percentComplete);
    }
  }, false);
  return xhr;
},


type:'POST',
url: "{{ route('course.create')}}",
data: formData,
cache:false,
contentType: false,
processData: false,
dataType: 'json',
success: (data) => {
this.reset();
$("#submit").removeAttr('disabled');
alert('Files has been uploaded Successfully');
window.location.href="{{route('main_dashboard')}}";
},
error: function(data){
alert('Something went wrong please upload again');
console.log(data.responseJSON);
}
});
});
});
</script>
@if(route('main_dashboard'))
<script type="text/javascript">
  document.title='Main Dashboard';
  var document_name=document.title;
  if(document_name){
    $("#profile").attr("class","list-group-item list-group-item-action main py-2 ripple");
    $("#main").attr("class","list-group-item list-group-item-action main py-2 ripple active");

  }
</script>
@endif
@endsection


