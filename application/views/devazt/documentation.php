<?php

?>

<!DOCTYPE html>
<html lang="esen">
    <head>
        <title>API - <?= $table ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.1/js/materialize.min.js"></script>
        <script src="<?= base_url('js/jjsonviewer.js')?>"></script>

        <link rel="stylesheet" href="<?= base_url('css/jjsonviewer.css') ?>">
        <style>
            .name{
                word-break: break-word;
                font-weight: bold;
                color: #282828;
            }

            .POST{
                color: #f5a623;
            }

            .GET{
                color: #3eb63e;
            }

            .PUT{
                color: #4a90e2;
            }

            .DELETE{
                color: #ed4b48;
            }

            .method{
                font-size: 18px;
            }

            pre{
                font-size: 12px;
            }
        </style>
    </head>
    <body>
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!">one</a></li>
        <li><a href="#!">two</a></li>
        <li class="divider"></li>
        <li><a href="#!">three</a></li>
        </ul>
        <nav>
        <div class="nav-wrapper" style="background: darkcyan;">
            <a href="#!" class="brand-logo" style="margin-left: 12px;">API</a>
            <ul class="right hide-on-med-and-down">
            <!--
            <li><a href="sass.html">Sass</a></li>
            <li><a href="badges.html">Components</a></li>
            <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>-->
            </ul>
        </div>
        </nav>

        <div class="container">
            <h3>Personas encargadas de la documentación</h3>
            <div class="chip">
                <img src="https://yt3.ggpht.com/-gbZEJz72Exs/AAAAAAAAAAI/AAAAAAAAAAA/rEbqqAhPK2c/s900-c-k-no-mo-rj-c0xffffff/photo.jpg" alt="Contact Person">
                Daniel Antonio López Espinoza
            </div>

            <div class="row">
                <div class="col s12">
                    <h5>Uso para el endpoint: <?= $endpoint ?></h5>
                    <hr>

                    <div class="api-method">
                        <div class="api-information">
                            <div class="heading">
                            <div class="name method">
                                <span class="GET method">GET</span>
                                <?= $endpoint ?>
                            </div>
                            </div>
                            <br>
                            <pre><?= $endpoint ?></pre>
                            <div class="description"><p>Obitene los primeros 30 recursos de <?= $table ?></p>
                        </div>
                        <br>

                        <div class="request-body">
                            <div class="body-heading">Params</div>
                                <hr>
                                <div class="param row">
                                    <div class="name col-md-3 col-xs-12"><?= $endpoint ?>?offset=</div>
                                    <div class="value col-md-9 col-xs-12">number</div>
                                </div>
                                <div class="param row">
                                    <div class="name col-md-3 col-xs-12"><?= $endpoint ?>?options=</div>
                                    <div class="value col-md-9 col-xs-12">documentation, code</div>
                                </div>
                            </div>
                        </div>

                        <div class="response">
                            <div class="body-heading">
                                Response
                            </div>
                            <hr>
                            <pre id="json-viwer-getall" class="json">
                            </pre>
                        </div>
                        <br>
                        <hr>
                    </div>

                    <div class="api-method">
                        <div class="api-information">
                            <div class="heading">
                            <div class="name method">
                                <span class="GET method">GET</span>
                                <?= $endpoint ?>/{Id<?= $table ?>}
                            </div>
                            </div>
                            <br>
                            <pre><?= $endpoint ?>/1</pre>
                            <div class="description"><p>Obitene el <?= $table ?> con el id 1</p>
                        </div>

                        <div class="response">
                            <div class="body-heading">
                                Response
                            </div>
                            <hr>
                            <pre id="json-viwer-getone" class="json">
                            </pre>
                        </div>

                        <br>
                        <hr>
                    </div>

                    <div class="api-method">
                        <div class="api-information">
                            <div class="heading">
                            <div class="name method">
                                <span class="POST method">POST</span>
                                <?= $endpoint ?>
                            </div>
                            </div>
                            <br>
                            <pre><?= $endpoint ?></pre>
                            <div class="description"><p>Agregar un nuevo <?= $table ?></p>
                        </div>
                        <br>
                        <div class="headers">
                            <div class="headers-heading">HEADERS</div>
                            <hr>
                            <div class="param row">
                                <div class="name col-md-3 col-xs-12">Content-Type</div>
                                <div class="value col-md-9 col-xs-12">application/x-www-form-urlencoded</div>
                            </div>
                        </div>

                        <div class="request-body">
                            <div class="body-heading">BODY</div>
                                <hr>
                                <table class="responsive-table highlight">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Tipo de dato</th>
                                            <th>Permite NULL</th>
                                            <th>Formato</th>
                                        </tr>
                                    </thead>
                                
                                <?php foreach($campos as $campo): ?>
                                    <tbody>
                                        <tr>
                                            <?php if($campo->Key == "PRI"): ?>
                                            <?php else: ?>
                                            <td><?= $campo->Field ?> <?= $campo->Key == "PRI" ? "[PrimaryKey]" : ""; ?></td>
                                            
                                            <td><?= $campo->Type ?></td>
                                            <td><?= $campo->Null == "YES" ? "Si" : "No"; ?></td>
                                            <td>
                                                <?php 
                                                    if($campo->Type == "datetime"){
                                                        echo date('Y-m-d H:i:s');
                                                    }else if(strpos($campo->Type, 'bigint') !== false){
                                                        echo 26531;
                                                    }else if(strpos($campo->Type, 'varchar') !== false){
                                                        echo "Texto siemple";
                                                    }else if(strpos($campo->Type, 'tinyint') !== false){
                                                        echo 1;
                                                    }else if(strpos($campo->Type, 'int') !== false){
                                                        echo 2313;
                                                    }
                                                ?>
                                            </td>
                                            <?php endif;?>
                                        </tr>
                                    </div>
                                <?php endforeach;?>
                                </table>
                            </div>
                        </div>

                        <div class="response">
                            <div class="body-heading">
                                Response
                            </div>
                            <hr>
                            <pre id="json-viwer-post" class="json">
                            </pre>
                        </div>
                        
                        <br>
                        <hr>
                    </div>

                    <div class="api-method">
                        <div class="api-information">
                            <div class="heading">
                            <div class="name method">
                                <span class="PUT method">PUT</span>
                                <?= $endpoint ?>/{Id<?= $table ?>}
                            </div>
                            </div>
                            <br>
                            <pre><?= $endpoint ?>/1</pre>
                            <div class="description"><p>Modifica un <?= $table ?> con Id<?= $table ?> = 1</p>
                        </div>
                        <br>
                        <div class="headers">
                            <div class="headers-heading">HEADERS</div>
                            <hr>
                            <div class="param row">
                                <div class="name col-md-3 col-xs-12">Content-Type</div>
                                <div class="value col-md-9 col-xs-12">application/x-www-form-urlencoded</div>
                            </div>
                        </div>

                        <div class="request-body">
                            <div class="body-heading">BODY</div>
                                <hr>
                                <table class="responsive-table highlight">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Tipo de dato</th>
                                            <th>Permite NULL</th>
                                            <th>Formato</th>
                                        </tr>
                                    </thead>
                                
                                <?php foreach($campos as $campo): ?>
                                    <tbody>
                                        <?php if($campo->Key == "PRI"): ?>
                                        <tr>
                                            <?php else: ?>
                                            <td><?= $campo->Field ?> <?= $campo->Key == "PRI" ? "[PrimaryKey]" : ""; ?></td>
                                            
                                            <td><?= $campo->Type ?></td>
                                            <td><?= $campo->Null == "YES" ? "Si" : "No"; ?></td>
                                            <td>
                                                <?php 
                                                    if($campo->Type == "datetime"){
                                                        echo date('Y-m-d H:i:s');
                                                    }else if(strpos($campo->Type, 'bigint') !== false){
                                                        echo 26531;
                                                    }else if(strpos($campo->Type, 'varchar') !== false){
                                                        echo "Texto siemple";
                                                    }else if(strpos($campo->Type, 'tinyint') !== false){
                                                        echo 1;
                                                    }else if(strpos($campo->Type, 'int') !== false){
                                                        echo 2313;
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php endif;?>
                                    </div>
                                <?php endforeach;?>
                                </table>
                            </div>
                        </div>

                        <div class="response">
                            <div class="body-heading">
                                Response
                            </div>
                            <hr>
                            <pre id="json-viwer-put" class="json">
                            </pre>
                        </div>

                        <br>
                        <hr>
                    </div>
                    
                    <div class="api-method">
                        <div class="api-information">
                            <div class="heading">
                            <div class="name method">
                                <span class="DELETE method">DELETE</span>
                                <?= $endpoint ?>/{Id<?= $table ?>}
                            </div>
                            </div>
                            <br>
                            <pre><?= $endpoint ?>/1</pre>
                            <div class="description"><p>Elimina virtualmente el <?= $table ?> con Id<?= $table ?> = 1</p>
                        </div>

                        <div class="response">
                            <div class="body-heading">
                                Response
                            </div>
                            <hr>
                            <pre id="json-viwer-delete" class="json">
                            </pre>
                        </div>
                        
                        <br>
                        <hr>
                    </div>
                </div>
            </div>
        </div>

        <?php 
            $getalljson = "[{ ";
            $getone = "{ ";
            $count = count($campos);
            $i = 1;
        ?>
        <?php foreach($campos as $campo){
            $getalljson .= "'$campo->Field': ";
            $getone .= "'$campo->Field': ";
            if($campo->Type == "datetime"){
                $date = date('Y-m-d H:i:s');
                $getalljson .= "'$date'";
                $getone .= "'$date'";
            }else if(strpos($campo->Type, 'bigint') !== false){
                $getalljson .= 422314;
                $getone .= 422314;
            }else if(strpos($campo->Type, 'varchar') !== false){
                $getalljson .= 'Texto simple';
                $getone .= 'Texto simple';
            }else if(strpos($campo->Type, 'tinyint') !== false){
                $getalljson .= 1;
                $getone .= 1;
            }else if(strpos($campo->Type, 'int') !== false){
                $getalljson .= 121;
                $getone .= 121;
            }
            
            if($i < $count){
                $getalljson .= ",";
                $getone .= ",";
            }

            $i++;
        } ?>
        <?php
            $getalljson .= " }]";
            $getone .= "}";
            $getalljson = trim($getalljson);
            $getone = trim($getone);
        ?>

        <script>
            $(document)4
            ready(function (){
                $("#json-viwer-getall").jJsonViewer(<?= $getalljson ?>);
                $("#json-viwer-getone").jJsonViewer(<?= $getone ?>);
            });
        </script>

    </body>
</html>