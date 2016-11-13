

<div class="component">
            <div class="row" style="margin-top:51px;">
                <form method = "get" action="{{ url('/search') }}">
                    <div class="col-md-1">
                        <button type="button" class="btn btn-link">
                        <span class="glyphicon glyphicon-search" aria-hidden="divue" ></span>
                        </button>
                    </div>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="search" size="50" placeholder="Search for..." required>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
            </div>
            <table>
                <thead>
                    <tr>
                    	<th>ID</th>
                        <th>Product</th>
                        <th>Unit</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Catagory</th>
                        <th>Quantity</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                	<form method = "post" action="{{ url('/profit') }}">
	                    @foreach ($item as $item):
	                    <tr> 
		                    <td class="user-email">{{ $item->ID }}</td>
		                    <td class="user-email">{{ $item->Product }}</td>
	                        <td class="user-phone">{{ $item->Unit }}</td>
	                        <td class="user-mobile">{{ $item->Cost }}</td>
	                        <td class="user-mobile">{{ $item->Price }}</td>
	                        <td class="user-mobile">{{ $item->Category }}</td>
	                        <td class="user-mobile">{{ $item->Quantity }}</td>
	                        <td class="user-mobile">
			                    <input type="text" class="form-control" name="sold{{ $item->ID }}" size="50" placeholder="......." required>
				                <input type="hidden" name="{{$item->ID}}" value="{{$item->ID}}">	                    
			                </td>
	                    </tr> 
	                    @endforeach
                    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                    	<button type="submit" class="btn btn-default">kuy Submit </button>
                    </form>	 
                </tbody>
            </table>
            @if (Session::get('Noitem'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('Noitem') }}
            </div>
            @endif
        </div>