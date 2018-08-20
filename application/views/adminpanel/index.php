    
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-plug fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= count($apicalls) ?></div>
                                <div>Llamadas a devazt</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">Ver a detalle</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $ventas ?></div>
                                <div>Nuevas ventas!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">0</div>
                                <div>Tickets de soporte!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">

            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bar-chart fa-fw"></i> Chart Request
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <canvas id="requestapibarchart" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div>

            <!-- /.col-lg-8 -->
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-bell fa-fw"></i> Las request
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Cliente</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < 10; $i++){
                                            if(count($apicalls) > $i){
                                                $apicall = $apicalls[$i];
                                            }else{
                                                $apicall = null;
                                                break;
                                            }
                                        ?>
                                        <tr>
                                            <td><?= $apicall->Fecha ?></td>
                                            <td><?= $apicall->Cliente ?></td>
                                            <td><?= $apicall->Control ?></td>
                                        </tr>
                                    <?php
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script>
    $(document).ready(function (){
        var requestapibarchart = document.getElementById('requestapibarchart').getContext('2d');
        var barchart = new Chart(requestapibarchart, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: <?= json_encode($requestapibarchartlabels) ?>,
                datasets: [{
                    label: "Peticiones API",
                    backgroundColor: 'rgb(153,0,120)',
                    borderColor: 'rgb(153,0,120)',
                    data: <?= json_encode($requestapibarchartnumbers) ?>
                }]
            },

            // Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            suggestedMin: 0,
                            suggestedMax: <?= $requestapibarchartyaxesmax ?>
                        }
                    }]
                }
            }
        });
    });
</script>