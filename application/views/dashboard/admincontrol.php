        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $control->Nombre ?></h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <?php if ($control->IsExample == 1): ?>
        <div class="col-lg-12">
            <h4>Instrucciones del ejemplo</h4>
            <br>
            <?= $control->Instrucciones ?>
            <hr>
            <a class="btn btn-primary" href="<?= $control->DownloadLink ?>">Descargar archivos</a>
        </div>
        <?php else: ?>

        <a href="<?= base_url("control/$control->Url") ?>" class="btn btn-default">Agregar app</a>
        <br><br>

        <?php foreach($controls as $control): ?>
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-plug fa-5x"></i>
                                <br><br>
                                <div><a class="btn btn-xs btn-info" href="#">Ver mas detalles</a></div>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?= $control->Calls ?></div>
                                <p>ApiKey <br> <?= $control->ApiKey ?></p>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url("control/thanks/$control->IdControl") ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Ver implementacion</span>
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
                                <i class="fa fa-android fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div>
                                    <div class="huge"><?= $control->DroidCalls ?></div>    
                                </div>
                                <h4>Package Name</h4>
                                <div><?= empty($control->DroidPackageName) ? "PackageName no asignado" : "$control->DroidPackageName" ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url("dashboard/appid/$control->IdClienteControl") ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Editar packagename</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-apple fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div>
                                    <div class="huge"><?= $control->IOSCalls ?></div>    
                                </div>
                                <h4>Bundle Id</h4>
                                <div><?= empty($control->IOSPackageName) ? "Bundle Id no asignado" : "$control->IOSPackageName" ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url("dashboard/appid/$control->IdClienteControl") ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Editar bundle id</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-windows fa-5x"></i>
                            </div>
                            <div class="col-xs-9">
                                <div>
                                    <div class="huge"><?= $control->UWPCalls ?></div>    
                                </div>
                                <h4>Identifier</h4>
                                <div><?= empty($control->UWPPackageName) ? "Identifier no asignado" : "$control->UWPPackageName" ?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?= base_url("dashboard/appid/$control->IdClienteControl") ?>">
                        <div class="panel-footer">
                            <span class="pull-left">Editar identifier</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>