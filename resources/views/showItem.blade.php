<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">


    <title>STOCK ITEM</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="css/material.min.css" rel="stylesheet">
    <link href="css/dataTables.material.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home">STOCK ITEM</a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i><b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="#">Milk <span class="label label-warning">Low in Stock</span></a>
                    </li>
                    <li>
                        <a href="#">Cookie <span class="label label-danger">Out of Stock</span></a>
                    </li>
                    <li>

                    <li class="divider"></li>
                    <li>
                        <a href="#">View All</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-fw fa-power-off"></i> Logout</a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li >
                    <a href="home"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>

                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-table"></i>  ITEM <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo" class="collapse">
                        <li>
                            <a href="http://localhost/setest/public/allItem">ALL Item</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-edit"></i> Promotion</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-file"></i> Summary</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 form-control fill" style="margin-top: 5%;">
                <div class="col-lg-1" style="padding:8px;">
                    <button type="button" class="btn dropdown-toggle btn btn-link" data-toggle="dropdown" style="position: fixed;">
                        <span class="glyphicon glyphicon-search" aria-hidden="true" ></span>
                    </button>
                </div>
                <div class="col-lg-11"  style="padding:5px;">
                    <div class="form-group" style="position: fixed;">
                        <input type="text" placeholder="  Search for..."  style="width: 1000px; height:40px; border:none;">
                    </div>      
                </div>
            </div>
        </div>
        <div class="row" >
            <table id="example" class="mdl-data-table" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Unit</th>
                        <th>Cost</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($item as $item): ?>
                        <tr>
                            <td>{{ $item->ID }}</td>
                            <td>{{ $item->Product }}</td>
                            <td>{{ $item->Unit }}</td>
                            <td>{{ $item->Cost }}</td>
                            <td>{{ $item->Price }}</td>
                            <td>{{ $item->Category }}</td>
                            <td>{{ $item->Quantity}}</td>
                            <td>{{ $item->created_at}}</td>  
                            <td>
                                <div class="dropdown">
                                    <button style="padding-top:0%;" type="button" class="btn dropdown-toggle btn btn-link" data-toggle="dropdown">
                                        <span class="glyphicon glyphicon-option-vertical" aria-hidden="true" ></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><span class="glyphicon glyphicon-search" aria-hidden="true" ></span>Show Detail</a></li>
                                        <li><a data-toggle="modal" data-target="#editstock"><span class="glyphicon glyphicon-pencil" aria-hidden="true" ></span>Edit</a></li>
                                        <li>
                                            <form method ="post" action="{{ url('/delItem') }}">
                                                <BUTTON type="submit" class="btn btn-default">   remove  </BUTTON>
                                                <span class="glyphicon glyphicon-trash" aria-hidden="true" > </span>
                                                <input type="hidden" name="ID" value="{{ $item->ID }}">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">                                          
                                            </form>
                                        <li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    
                </tbody>
            </table>
            @if (Session::get('Noitem'))
                          <div class="alert alert-danger" role="alert">
                            {{ Session::get('Noitem') }}
                          </div>
                        @endif  
        </div>   
    </div>
	<div>
        <footer style="position:absolute;position:fixed;top:86%;right:1%;">
            <button class="btn-link">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8b/VisualEditor_-_Icon_-_Add-item.svg/2000px-VisualEditor_-_Icon_-_Add-item.svg.png" width="60" height="60" data-toggle="modal" data-target="#addstock">
            </button>
        </footer>
    </div>

    <!-- Modal edit item -->
    <div id="editstock" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">edit item</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="Product">Product:</label>
                            <input type="text" class="form-control" id="editProduct" placeholder="Enter Product name">
                        </div>
                        <div class="form-group">
                            <label for="Type">Type:</label>
                            <input type="text" class="form-control" id="editType" placeholder="Enter Product Type">
                        </div>
                        <div class="form-group">
                            <label for="Price">Price:</label>
                            <input type="text" class="form-control" id="editPrice" placeholder="Enter Product Price">
                        </div>
                        <div class="form-group">
                            <label for="Principle">Principle:</label>
                            <input type="text" class="form-control" id="editPrinciple" placeholder="Enter Product Principle">
                        </div>
                        <div class="form-group">
                            <label for="Quentity">Quentity:</label>
                            <input type="text" class="form-control" id="editQuentity" placeholder="Enter Product Quentity">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>
        </div>


        <!-- Modal add stock -->
    <div id="addstock" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add item</h4>
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
                            <input type="text" class="form-control" id="Category" placeholder="Enter Product Quentity" name="category">
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


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

</body>

</html>
