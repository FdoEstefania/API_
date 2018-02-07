<?php

$childs = base_url("/$controllername/crud_");
$create = base_url("/$controllername");
$read = base_url("/$controllername/Read");
$update = base_url("/$controllername/update");
$delete = base_url("/$controllername/delete");

$primarykey = "";
$foreignkeys = array();

// print_r($consulta->result());
foreach($fields as $field){
    if($field->Key == "PRI"){
        $primarykey = $field->Field;
    }
    
    if($field->Key == "MUL" && $field->Null == "NO"){
        array_push($foreignkeys, $field->Field);
    }
}

// print_r($foreignkeys);

?>
<div class="container">
    <h1 class="page-header"><?= $tablename ?></h1>
    <a href="#" data-toggle="modal" data-target="#additem">Crear nuevo registro</a>

    <div id="additem" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar item a <?= $tablename ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Ingresa los datos que se te piden</p>
                <form id="addform" class="form" role="form">
                    <?php foreach($fields as $field): ?>
                    <?php if($field->Key == "PRI" || $field->Default != null): ?>
                    <?php elseif($field->Key == "MUL" && $field->Field == $foreign_key && $haschild): ?>
                    <div class="form-group" style="display: none;">
                        <label for="nombre"><?= $field->Field ?> para <?= $tablename ?></label>
                        <input type="text" name="<?= $field->Field ?>" value="<?= $foreign_val ?>" class="form-control">
                    </div>
                    <?php else: ?>
                        <?php if(!empty($belongs_name) && $field->Field == $belongs_name): ?>
                            <div class="form-group">
                                <label for="nombre"><?= $field->Field ?> para <?= $tablename ?></label>
                                <input type="text" name="<?= $field->Field ?>" value="<?= $belongs_val ?>" class="form-control">
                            </div>
                        <?php else: ?>
                            <div class="form-group">
                                <label for="nombre"><?= $field->Field ?> para <?= $tablename ?></label>
                                <input type="text" name="<?= $field->Field ?>" value="" class="form-control">
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </form>
            </div>
            <div class="modal-footer">
                <button class="additem btn btn-success" data-url="<?= $create ?>" type="button">Agregar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
    <form action="#">
        <div class="form-group">
            <label>Buscar...</label>
            <input type="text" placeholder="buscar..." class="form-control">
        </div>
    </form>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <?php foreach ($columns as $column): ?>
                        <th><?= $column ?></th>
                    <?php endforeach; ?>
                    <?php if(!empty($buttons)): ?>
                        <td>Opciones</td>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach($consulta as $item): ?>
                    <?php 
                        $array = (array) $item;
                    ?>
                    <tr>
                        <?php foreach ($columns as $column): ?>
                            <td><?= $array[$column] ?></td>
                        <?php endforeach; ?>
                        <?php if(!empty($buttons)): ?>
                            <td>
                                <?php foreach($buttons as $button): ?>
                                    <?php if($button->hasparameter): ?>
                                        <?php if($button->method == "get"): ?>
                                            <a href="<?= $button->url ?>?<?= $button->parameter ?>=<?= $array[$button->parameter] ?>"><?= $button->text ?></a>
                                        <?php else: ?>    
                                            <a href="<?= $button->url ?>/<?= $array[$button->parameter] ?>"><?= $button->text ?></a>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <a href="<?= $button->url ?>"><?= $button->text ?></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

    <script type="text/javascript">
        $(document).ready(function (){

            $.ajaxSetup({
                headers: {
                    'Authorization': '45678165732415778652187'
                }
            });
            
            $(".deleteitem").click(function (){
                var url = $(this).data('url');
                var id = $(this).data('id');
                $.get(url, null, function(response){
                    var deleteresult = JSON.parse(response);
                    if(deleteresult.DeleteStatus){
                        $("#item_" + id).remove();
                    }
                });
                $("#delete_" +id).modal('toggle');
            });

            $(".additem").click(function (){
                var url = $(this).data('url');
                var params = $("#addform").serialize();
                $.post(url, params).done(function (response){
                    var jsonresult = JSON.parse(response);
                    if(jsonresult != null){
                        window.location.href = "";
                    }
                }).fail(function (response){
                    try{
                        var jsonresult = JSON.parse(response.responseText);
                        if(jsonresult != null){
                            window.location.href = "";
                        }
                    }catch(ex){

                    }
                });
                $("#additem").modal('toggle');
            });

            $(".updateitem").click(function (event){
                var url = $(this).data('url');
                var id = $(this).data('id');
                var params = $("#updateform_" + id).serialize();
                $.post(url, params).done(function (response){
                    var jsonresult = JSON.parse(response);
                    if(jsonresult != null){
                        window.location.href = "";
                    }
                }).fail(function(response){
                    try{
                        var jsonresult = JSON.parse(response.responseText);
                        if(jsonresult != null){
                            window.location.href = "";
                        }
                    }catch(ex){

                    }
                });
                $("#update_" + id).modal('toggle');
                event.preventDefault();
            });
        });
    </script>