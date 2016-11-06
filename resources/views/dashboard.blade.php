@extends('home')

@section('content')


<!-- Page Content -->
<div>
    <div>
        <div class="col-md-12">
            <h1 class="page-header">Dashboard</h1>
        </div
    </div>
    <div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">107</div>
                                    <div>Product</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel" style="background-color: #5cb85c; color: white">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">5</div>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel" style="background-color: #f0ad4e; color: white">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">1000$</div>
                                    <div>Future Profits</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel" style="background-color: #d9534f; color: white">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-briefcase fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">2000$</div>
                                    <div>Costs</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>

        <div class="col-md-6 table-responsive">
            <div class="panel panel-default">
                <div class="panel-heading">Latest Items</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Milk</td>
                            <td>Drink</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Donut</td>
                            <td>Food</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Water</td>
                            <td>Drink</td>
                            <td>200</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Beer</td>
                            <td>Drink</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Computer</td>
                            <td>Eletronic</td>
                            <td>10</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Graph item in stock</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="myChart" width="235" height="235"></canvas>
                        </div>

                        <div class="col-md-6">
                            <ul style="list-style-type: none">
                                <li><i class="fa fa-circle-o " style="color: red"></i> Toy</li>
                                <li><i class="fa fa-circle-o " style="color: #e2eae9"></i> Food</li>
                                <li><i class="fa fa-circle-o " style="color: #d4ccc5"></i> Drink</li>
                                <li><i class="fa fa-circle-o " style="color: #949fb1"></i> Electronic</li>
                                <li><i class="fa fa-circle-o " style="color: #4d5360"></i> Clothes</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- /.row -->
</div>

<script>
    jQuery(document).ready(function() {});

    jQuery.getScript('http://www.chartjs.org/assets/Chart.js',function(){

        var data = [{
            value: 30,
            color: "#F7464A"
        }, {
            value: 50,
            color: "#E2EAE9"
        }, {
            value: 100,
            color: "#D4CCC5"
        }, {
            value: 40,
            color: "#949FB1"
        }, {
            value: 120,
            color: "#4D5360"
        }

        ]

        var options = {
            animation: false
        };

        //Get the context of the canvas element we want to select
        var c = $('#myChart');
        var ct = c.get(0).getContext('2d');
        var ctx = document.getElementById("myChart").getContext("2d");
        /*************************************************************************/
        myNewChart = new Chart(ct).Doughnut(data, options);

    })
</script>


@endsection