@extends('layouts.app')
@section('content')
<div class="container p-5">
	<form method="POST" action="{{route('validate')}}">
		@csrf
		<div class="form-group">
			<label>Student Full Name</label>
			<input type="text" placeholder="student name e.g Johnson Emmanuel" class="form-control" name="student_name">
		</div>
		<div class="form-group">
			<label>Student Email</label>
			<input type="email" placeholder="student email e.g john@gmail.com" class="form-control" name="student_email">
		</div>
		<div class="form-group">
			<label>Course Title</label>
			<input type="text" placeholder="e.g Photoshop Master Class" class="form-control" name="student_course">
		</div>
		<div class="form-group">
			<label>Course Price</label>
			<input type="text" placeholder="example: 2500" class="form-control" name="student_course_price">
		</div>
		<div class="form-group">
			<label>Tutor Email address</label>
			<input type="email" placeholder="tutor email john@example.com" class="form-control" name="tutor_email">
		</div>
		<button type="submit" class="btn m-2 btn-md btn-primary">Validate</button>
	</form>
</div>
@endsection