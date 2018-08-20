
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><?= $control->Nombre ?> apps id</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-lg-12">
        <p>Aqui puedes asignar facilmente el id de tu aplicacion para que puedas implementar el plugin de una menera facil</p>
        <hr>
        <form action="<?= base_url("dashboard/setappsid/$control->IdClienteControl") ?>" class="form" method="post">
            <div class="form-group">
                <label><i class="fa fa-android"></i> &nbsp;Android PackageName</label>
                <input type="text" name="DroidPackageName" value="<?= $control->DroidPackageName ?>" class="form-control">
            </div>
            <div class="form-group">
                <label><i class="fa fa-apple"></i> &nbsp;iOS Bundle Id</label>
                <input type="text" name="IOSPackageName" value="<?= $control->IOSPackageName ?>" class="form-control">
            </div>
            <div class="form-group">
                <label><i class="fa fa-windows"></i> &nbsp;UWP Identifier</label>
                <input type="text" name="UWPPackageName" value="<?= $control->UWPPackageName ?>" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary form-control">Guardar cambios</button>
            </div>
        </form>
    </div>
</div>