@extends('home')

@section('content')
	<form class="form-signin" id='login_form' method="post" action="{{ url('/changepassworded') }}">
        {{ csrf_field() }}
           
       <div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }}">
       	<p>Enter Old Password</p>
           <input type="password" name="oldpassword" placeholder="password" id="oldpassword" required>
            	@if (Session::get('oldpasserror'))
				  <div class="alert alert-danger" role="alert">
				    {{ Session::get('oldpasserror') }}
				  </div>
				@endif
       </div>

       <div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }}">
       	<p>Enter New Password</p>
           <input type="password" name="newpassword" placeholder="New password" id="newpassword" required>

            	@if (Session::get('checkerror'))
				  <div class="alert alert-danger" role="alert">
				    {{ Session::get('checkerror') }}
				  </div>
				@endif
       </div>

       <div class="form-group{{ $errors->has('newpassword_confirmation') ? ' has-error' : '' }}">
       	<p>Enter New Password Again</p>
           <input type="password" name="newpassword_confirmation" placeholder="New password" id="newpassword_confirmation" required>
       </div>
		
       <button id="signInBtn" class="btn btn-lg btn-primary btn-block" type="submit" role="button">Log In</button>
    </form>
@endsection