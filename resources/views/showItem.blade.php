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
                        <th colspan="2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                     <tr>
                        <td class="user-name">{{ $item->ID }}</td>
                        <td class="user-email">{{ $item->Product }}</td>
                        <td class="user-phone">{{ $item->Unit }}</td>
                        <td class="user-mobile">{{ $item->Cost }}</td>
                        <td class="user-mobile">{{ $item->Price }}</td>
                        <td class="user-mobile">{{ $item->Category }}</td>
                        <td class="user-mobile">{{ $item->Quantity}}</td>
                        <td class="user-mobile">{{ $item->updated_at}}</td>
                        <td class="user-mobile">
                            <div class="dropdown">
                                <button style="padding-top:0%;" type="button" class="btn dropdown-toggle btn btn-link" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-option-vertical" aria-hidden="true" ></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><button class="btn btn-link" data-toggle="modal" data-target="#editstock{{ $item->ID }}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit</button></li>
                                    <li>
                                        <form method ="post" action="{{ url('/delItem') }}">
                                            <button class="btn btn-link"><span class="glyphicon glyphicon-trash" aria-hidden="true" ></span>Remove</button>
                                            <input type="hidden" name="ID" value="{{ $item->ID }}">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if (Session::get('Noitem'))
            <div class="alert alert-danger" role="alert">
                {{ Session::get('Noitem') }}
            </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    <div>

        <footer style="position:absolute;position:fixed;top:86%;right:1%;">
            <button class="btn-link">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/VisualEditor_-_Icon_-_Add-item.svg/2000px-VisualEditor_-_Icon_-_Add-item.svg.png" width="60" height="60" data-toggle="modal" data-target="#addstock">
            </button>
        </footer>
    </div>
</div>

@foreach ($items as $item)
<!-- Modal edit stock-->
<div id="editstock{{ $item->ID }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        @if (Session::get('Noitem'))
        @else
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Item</h4>
            </div>
            <div class="modal-body">
                <form method="post" action ="{{ url('/editItem') }}">
                    <div class="form-group">
                        <label for="Product">Product:</label>
                        <input type="text" class="form-control" id="Type" value="{{ $item->Product }}" name = "product">
                    </div>
                    <div class="form-group">
                        <label for="Type">Unit:</label>
                        <input type="text" class="form-control" id="Type" value="{{ $item->Unit }}" name = "unit">
                    </div>
                    <div class="form-group">
                        <label for="Quentity">Cost:</label>
                        <input type="text" class="form-control" id="Cost" value="{{ $item->Cost }}" name="cost">
                    </div>
                    <div class="form-group">
                        <label for="Quentity">Price:</label>
                        <input type="text" class="form-control" id="Price" value="{{ $item->Price }}" name="price">
                    </div>
                    <div class="form-group" >
                        <label for="Quentity">Category:</label>
                        <select id="Category" name="category">
                            <option value="Assessories" {{ $item->Category == 'Assessories' ? 'selected' : '' }}> Assessories</option>
                            <option value="Beverages" {{ $item->Category == 'Beverages' ? 'selected' : '' }}>Beverages</option>
                            <option value="Book" {{ $item->Category == 'Book' ? 'selected' : '' }}>Book</option>
                            <option value="Cosmetic" {{ $item->Category == 'Cosmetic' ? 'selected' : '' }}>Cosmetic</option>
                            <option value="DairyProduct" {{ $item->Category == 'DairyProduct' ? 'selected' : '' }}>Dairy Product</option>
                            <option value="Electronic" {{ $item->Category == 'Electronic' ? 'selected' : '' }}>Electronic</option>
                            <option value="Groceries" {{ $item->Category == 'Groceries' ? 'selected' : '' }}>Groceries</option>
                            <option value="Phamaceuticals" {{ $item->Category == 'Phamaceuticals' ? 'selected' : '' }}>Phamaceuticals</option>
                            <option value="Snack" {{ $item->Category == 'Snack' ? 'selected' : '' }}>Snack</option>
                            <option value="Tobacco" {{ $item->Category == 'Tobacco' ? 'selected' : '' }}>Tobacco</option>
                            <option value="ToyGames" {{ $item->Category == 'ToyGames' ? 'selected' : '' }}>Toy&games</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Quentity">Quantity:</label>
                        <input type="text" class="form-control" id="Quentity" value="{{ $item->Quantity }}" name="quantity">
                    </div>
                    <div class="form-group">
                        <BUTTON type="submit" class="btn btn-default"> Submit </BUTTON>
                        <input type="hidden" name="ID" value="{{ $item->ID }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
@endforeach

    <!-- Modal add stock -->
    <div id="addstock" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Item</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action ="{{ url('/addItem') }}">
                        <div class="form-group">
                            <label for="Product">Product:</label>
                            <input type="text" class="form-control" id="Product" placeholder="Enter Product name" name = "product">
                        </div>
                        <div class="form-group">
                            <label for="Type">Unit:</label>
                            <input type="text" class="form-control" id="Type" placeholder="Enter Product Type" name = "unit">
                        </div>
                         <div class="form-group">
                            <label for="Quentity">Cost:</label>
                            <input type="text" class="form-control" id="Cost" placeholder="Enter Product Quentity" name="cost">
                        </div>
                         <div class="form-group">
                            <label for="Quentity">Price:</label>
                            <input type="text" class="form-control" id="Price" placeholder="Enter Product Quentity" name="price">
                        </div>
                         <div class="form-group">
                            <label for="Quentity">Category:</label>
                             <select id="Category" name="category">
                                 <option value="" selected="selected" disabled="disabled">Choose Category</option>
                                 <option value="Assessories"> Assessories</option>
                                 <option value="Beverages">Beverages</option>
                                 <option value="Book">Book</option>
                                 <option value="Cosmetic">Cosmetic</option>
                                 <option value="DairyProduct">Dairy Product</option>
                                 <option value="Electronic">Electronic</option>
                                 <option value="Groceries">Groceries</option>
                                 <option value="Phamaceuticals">Phamaceuticals</option>
                                 <option value="Snack">Snack</option>
                                 <option value="Tobacco">Tobacco</option>
                                 <option value="ToyGames">Toy&games</option>
                             </select>
                        </div>
                        <div class="form-group">
                            <label for="Quentity">Quantity:</label>
                            <input type="text" class="form-control" id="Quentity" placeholder="Enter Product Quentity" name="quantity">
                        </div>
                        <div class="form-group">
                            <BUTTON type="submit" class="btn btn-default"> Submit </BUTTON>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
