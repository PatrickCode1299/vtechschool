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
},
error: function(data){
alert('Fake File Please Upload an Mp4 File');
console.log(data.responseJSON.errors);
}
});
});
});