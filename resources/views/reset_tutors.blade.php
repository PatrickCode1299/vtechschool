@extends('layouts.app')
@section('content')
<div class="container">
	<form method="POST" action="{{route('reset_admin')}}">
		@csrf
		<div class="form-group m-2">
			<input type="email" required class="form-control" name="email" placeholder="Enter Registered email">
		</div>
		<div class="form-group m-2">
			<input type="text" required class="form-control" name="password" placeholder="Enter New Password">
		</div>
		<button type="submit" name="update" class="btn m-2 btn-primary btn-md">Update Password</button>
	</form>
</div>
@endsection