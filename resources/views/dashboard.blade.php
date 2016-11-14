@extends('home')

@section('content')


<!-- Page Content -->
<div>
    <div>
        <div class="col-md-12" style="padding-top: 2%;">
            <h2 class="page-header">Dashboard</h2>
        </div>
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
                                    <div class="huge">{{ $count }}</div>
                                    <div>Products</div>
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
                                    <div class="huge">{{ $allcat }}</div>
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
                                    <div class="huge">{{ $profit }}</div>
                                    <div>Profits</div>
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
                                    <div class="huge">{{ $cost }}</div>
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
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <td>{{ $item->Product }}</td>
                                <td>{{ $item->Category }}</td>
                                <td>{{ $item->Quantity }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Item in stock</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="myChart" width="235" height="235"></canvas>
                        </div>

                        <div class="col-md-6">
                            <ul style="list-style-type: none">
                                <li><i class="fa fa-circle-o " style="color: #FCE4C1"></i> Assessories</li>
                                <li><i class="fa fa-circle-o " style="color: #F1C3B7"></i> ฺBeverages</li>
                                <li><i class="fa fa-circle-o " style="color: #AFA2B1"></i> Book</li>
                                <li><i class="fa fa-circle-o " style="color: #577E8B"></i> Cosmetic</li>
                                <li><i class="fa fa-circle-o " style="color: #95B7E1"></i> Dairy Product</li>
                                <li><i class="fa fa-circle-o " style="color: #D2E8FD"></i> Electronic</li>
                                <li><i class="fa fa-circle-o " style="color: #FBDBD8"></i> Groceries</li>
                                <li><i class="fa fa-circle-o " style="color: #C8BAD2"></i> Phamaceuticals</li>
                                <li><i class="fa fa-circle-o " style="color: #7479A0"></i> Snack</li>
                                <li><i class="fa fa-circle-o " style="color: #333853"></i> Tobacco</li>
                                <li><i class="fa fa-circle-o " style="color: #4D464B"></i> Toy&games</li>
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
            value: "<?php echo $cat['Assessories'] ?>",
            color: "#FCE4C1"
        }, {
            value: "<?php echo $cat['Beverages'] ?>",
            color: "#F1C3B7"
        }, {
            value: "<?php echo $cat['Book'] ?>",
            color: "#AFA2B1"
        }, {
            value: "<?php echo $cat['Cosmetic'] ?>",
            color: "#577E8B"
        }, {
            value: "<?php echo $cat['DairyProduct'] ?>",
            color: "#95B7E1"
        }, {
            value: "<?php echo $cat['Electronic'] ?>",
            color: "#D2E8FD"
        }, {
            value: "<?php echo $cat['Groceries'] ?>",
            color: "#FBDBD8"
        }, {
            value: "<?php echo $cat['Phamaceuticals'] ?>",
            color: "#C8BAD2"
        }, {
            value: "<?php echo $cat['Snack'] ?>",
            color: "#7479A0"
        }, {
            value: "<?php echo $cat['Tobacco'] ?>",
            color: "#333853"
        }, {
            value: "<?php echo $cat['ToyGames'] ?>",
            color: "#4D464B"
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