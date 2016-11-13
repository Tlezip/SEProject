@extends('home')

@section('content')

        <div class="component">
            <div class="row" style="margin-top:51px;">
                <form method = "get" action="{{ url('/search') }}">
                    <div class="col-md-1">
                        <button type="button" class="btn btn-link">
                        <span class="glyphicon glyphicon-search" aria-hidden="true" ></span>
                        </button>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="search" size="50" placeholder="Search for..." required>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
            </div>
            <table class="tabledark">
                <thead>
                    <tr>
                    	<th>ID</th>
                        <th>Product</th>
                        <th>Unit</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Catagory</th>
                        <th>Quantity</th>
                        <th>Item Ramain</th>
                    </tr>
                </thead>
                <tbody>
                	<form method = "post" action="{{ url('/profit') }}">
	                    @foreach ($item as $item)
	                    <tr> 
		                    <td class="user-email">{{ $item->ID }}</td>
		                    <td class="user-email">{{ $item->Product }}</td>
	                        <td class="user-phone">{{ $item->Unit }}</td>
	                        <td class="user-mobile">{{ $item->Cost }}</td>
	                        <td class="user-mobile">{{ $item->Price }}</td>
	                        <td class="user-mobile">{{ $item->Category }}</td>
	                        <td class="user-mobile">{{ $item->Quantity }}</td>
	                        <td class="user-mobile">
			                    <input type="text" class="form-control" name="sold{{ $item->ID }}" size="50" placeholder="Fill the number of items remaining" required>
				                <input type="hidden" name="{{$item->ID}}" value="{{$item->ID}}">	                    
			                </td>
	                    </tr> 
	                    @endforeach

                    </form>	 
                </tbody>
            </table>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <button type="submit" class="btn btn-secondary" style="float: right; margin-right: 20px;">Submit</button>

            @if (Session::get('Noitem'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('Noitem') }}
            </div>
            @endif
        </div>

@endsection