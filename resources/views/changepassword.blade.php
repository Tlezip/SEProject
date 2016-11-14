@extends('home')

@section('content')

<form class="form-horizontal form-signin" id='login_form' method="post" action="{{ url('/changepassworded') }}" style="padding-top: 7%;">
	<fieldset>
		<!-- Password input-->
		<div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }}">
			{{ csrf_field() }}
			<label class="col-md-4 control-label">Enter Old Password</label>
			<div class="col-md-4">
				<input type="password" name="oldpassword" placeholder="password" id="oldpassword" class="form-control input-md" required>
                @if (Session::get('oldpasserror'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('oldpasserror') }}
                </div>
                @endif
            </div>
		</div>

		<!-- Password input-->
		<div class="form-group{{ $errors->has('newpassword') ? ' has-error' : '' }}"">
			<label class="col-md-4 control-label">Enter New Password</label>
			<div class="col-md-4">
				<input type="password" name="newpassword" placeholder="New password at least 6 character" id="newpassword" class="form-control input-md" required>
                @if (Session::get('checkerror'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('checkerror') }}
                </div>
                @endif
            </div>
		</div>

		<!-- Password input-->
		<div class="form-group{{ $errors->has('newpassword_confirmation') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Enter New Password Again</label>
			<div class="col-md-4">
				<input type="password" name="newpassword_confirmation" placeholder="New password at least 6 character" id="newpassword_confirmation" class="form-control input-md" required>

			</div>
		</div>

		<!-- Button (Double) -->
		<div class="form-group">
			<label class="col-md-4 control-label"></label>
			<div class="col-md-8">
				<button id="signInBtn" class="btn btn-primary" type="submit" role="button">Change Password</button>
			</div>
		</div>

	</fieldset>
</form>
@endsection