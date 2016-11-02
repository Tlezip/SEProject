@extends('home')

@section('content')
	<p>Username : {{ Auth::user()->name }}</p>
	<p>Shopname : {{ Auth::user()->shopname }}</p>
	<a href="{{ url('changepassword') }}"><button>ChangePassword</button></a>
@endsection