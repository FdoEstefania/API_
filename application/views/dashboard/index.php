    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <?php foreach ($controls as $control):?>
        <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-4">
                            <img src="<?= $control->Imagen ?>" class="img-responsive img-round" style="height: 140px;">
                        </div>
                        <div class="col-xs-8">
                            <h4><?= $control->Nombre ?> <small style="color: #dddddd"><?= $control->Platform ?></small> </h4>
                            <p><?= $control->DescripcionLarga ?></p>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url("dashboard/admincontrol/$control->IdControl") ?>">
                    <div class="panel-footer">
                        <span class="pull-left">Administrar</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>