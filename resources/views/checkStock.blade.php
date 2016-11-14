@extends('home')

@section('content')

    <div class="component">
        <div class="row" style="margin-top:51px;">
            <form method = "get" action="{{ url('/searchCheck') }}">
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
        <form method = "post" action="{{ url('/profit') }}">
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
                    <th>Item sold</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($items as $item)
                    <tr>
                        <td class="user-email">{{ $item->ID }}</td>
                        <td class="user-email">{{ $item->Product }}</td>
                        <td class="user-phone">{{ $item->Unit }}</td>
                        <td class="user-mobile">{{ $item->Cost }}</td>
                        <td class="user-mobile">{{ $item->Price }}</td>
                        <td class="user-mobile">{{ $item->Category }}</td>
                        <td class="user-mobile">{{ $item->Quantity }}</td>
                        <td class="user-mobile">
                            <input type="text" class="form-control" name="sold{{ $item->ID }}" size="50" placeholder="Enter the quantity of item sold">
                            <input type="hidden" name="{{$item->ID}}" value="{{$item->ID}}">
                        </td>
                    </tr>
                    @endforeach
                    

                </tbody>
            </table>
            @if (Session::get('Noitem'))
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('Noitem') }}
                </div>
            @elseif (Session::get('sellerror'))
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('sellerror') }}
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-secondary" style="float: right; margin-right: 20px">Submit</button>
            @elseif (Session::get('searchError'))
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('searchError') }}
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-secondary" style="float: right; margin-right: 20px">Submit</button>
            @else
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-secondary" style="float: right; margin-right: 20px">Submit</button>
            @endif


        </form>
    </div>

@endsection