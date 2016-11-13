@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('shopid') ? ' has-error' : '' }}">
                            <label for="shopid" class="col-md-4 control-label">shopid</label>

                            <div class="col-md-6">
                                <input id="shopid" type="integer" class="form-control" name="shopid" required>

                                @if ($errors->has('shopid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shopid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('shopname') ? ' has-error' : '' }}">
                            <label for="shopname" class="col-md-4 control-label">shopname</label>

                            <div class="col-md-6">
                                <input id="shopname" type="text" class="form-control" name="shopname" required>

                                @if ($errors->has('shopname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('shopname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Your Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Key') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Admin Key</label>

                            <div class="col-md-6">
                                <input id="key" type="password" class="form-control" name="key" required>

                                    @if (Session::get('checkkey'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ Session::get('checkkey') }}
                                        </div>
                                    @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
