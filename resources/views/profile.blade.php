@extends('home')

@section('content')

<div class="container" style="padding-top: 5%;">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-6">
			<div class="well well-sm">
				<div class="row">
					<div class="col-sm-6 col-md-4">
						@if (  Auth::user()->photoname  === "avatar" )
                            <img src="http://placehold.it/300x300"  class="img-rounded img-responsive" />
                        @else
                            <img src="images/{{ Auth::user()->photoname }}" />
                        @endif
                        <form enctype="multipart/form-data" method="POST" action="{{ url('/image-upload') }}">
                            {{ csrf_field() }}
                            <input type="file" name="image" id="image"/>
                            <button type="submit" class="btn btn-primary">
                                Upload
                            </button>
                        </form>
						<form method="get" action="{{ url('/image-delete') }}">
                            <button type="submit" class="btn btn-danger">
                                Delete Current
                            </button>
                        </form>

                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                            </div>

                        @endif
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