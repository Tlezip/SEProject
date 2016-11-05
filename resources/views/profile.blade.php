@extends('home')

@section('content')

<div class="container"style="padding-top: 30px;">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="well well-sm">
				<div class="row">
					<div class="col-sm-6 col-md-4">
						<img src="http://placehold.it/300x300" alt="" class="img-rounded img-responsive" />
					</div>
					<div class="col-sm-6 col-md-8">
						<h4>ShopID : #{{ Auth::user()->shopid }}</h4>
						<h4>Name : {{ Auth::user()->name }}</h4>
						<h4>ShopName : {{ Auth::user()->shopname }}</h4>
						<h4><i class="fa fa-envelope"></i> {{ Auth::user()->email }}</h4>

						<!-- Split button -->
						<a href="{{ url('changepassword') }}"><button class="btn  btn-primary">ChangePassword</button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection