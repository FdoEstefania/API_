<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="<?= base_url('common-files/images/favicon.png'); ?>" type="image/png">

    <title>DevAzt</title>

    <!-- jQuery -->
    <script src="<?= base_url('sbadmin/vendor/jquery/jquery.min.js'); ?>"></script>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- MetisMenu CSS -->
    <link href="<?= base_url('sbadmin/vendor/metisMenu/metisMenu.min.css'); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url('sbadmin/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= base_url('sbadmin/vendor/morrisjs/morris.css'); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= base_url('sbadmin/vendor/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url('sbadmin/vendor/metisMenu/metisMenu.min.js'); ?>"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?= base_url('sbadmin/vendor/raphael/raphael.min.js'); ?>"></script>
    <script src="<?= base_url('sbadmin/vendor/morrisjs/morris.min.js'); ?>"></script>
    <script src="<?= base_url('sbadmin/data/morris-data.js'); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url('sbadmin/dist/js/sb-admin-2.js'); ?>"></script>

    <!-- DATA TABLE -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url('dashboard/index') ?>">DevAzt</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?= base_url('home/logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?= base_url('dashboard/index') ?>"><i class="fa fa-plug fa-fw"></i> Tus integraciones</a>
                        </li>
                        <li>
                            <a href="<?= base_url('control/index') ?>"><i class="fa fa-shopping-cart fa-fw"></i> Ver tienda de plugins</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-mobile fa-fw"></i> Aplicaciones moviles <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="https://play.google.com/store/apps/details?id=com.devazt.pdfviewer">
                                        <i class="fa fa-android fa-fw"></i> PDF Viewer Online
                                    </a>
                                </li>
                                <!--
                                <li>
                                    <a href="https://play.google.com/store/apps/details?id=com.devazt.surveysmobile&hl=es_419">
                                        <i class="fa fa-apple fa-fw"></i> iOS DevAzt Framework (beta)
                                    </a>
                                </li>
                                -->
                            </ul>
                        </li>
                        <!--
                        <li><a href="<?= base_url('') ?>"><i class="fa fa-gear fa-fw"></i> Configuración</a></li>
                        -->
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <?= $html ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
</body>

</html>