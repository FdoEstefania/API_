<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="DevAzt | Creamos tu aplicación móvil" />
<meta name="keywords" content="creativo, multiusos, negocios, fotografía, moda, paralaje, cartera, agencia, xamarin, android, iOS" />
<meta name="author" content="DevAzt" />

<!-- Page Title -->
<title>DevAzt | <?= $title ?></title>

<!-- Favicon and Touch Icons -->
<link href="<?= base_url('template/images/favicon.png'); ?>" rel="shortcut icon" type="image/png">
<link href="<?= base_url('template/images/apple-touch-icon.png'); ?>" rel="icon">
<link href="<?= base_url('template/images/apple-touch-icon-72x72.png'); ?>" rel="icon" sizes="72x72">
<link href="<?= base_url('template/images/apple-touch-icon-114x114.png'); ?>" rel="icon" sizes="114x114">
<link href="<?= base_url('template/images/apple-touch-icon-144x144.png'); ?>" rel="icon" sizes="144x144">

<!-- Stylesheet -->
<link href="<?= base_url('template/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('template/css/jquery-ui.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('template/css/animate.css'); ?>" rel="stylesheet" type="text/css">
<link href="<?= base_url('template/css/css-plugin-collections.css'); ?>" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="<?= base_url('template/css/menuzord-skins/menuzord-default.css'); ?>" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="<?= base_url('template/css/style-main.css'); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="<?= base_url('template/css/preloader.css'); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="<?= base_url('template/css/custom-bootstrap-margin-padding.css'); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?= base_url('template/css/responsive.css'); ?>" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="<?= base_url('template/css/style.css'); ?>" rel="stylesheet" type="text/css"> -->

<!-- CSS | Theme Color -->
<link href="<?= base_url('template/css/colors/theme-skin-sky-blue-deep.css'); ?>" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="<?= base_url('template/js/jquery-2.2.4.min.js'); ?>"></script>
<script src="<?= base_url('template/js/jquery-ui.min.js'); ?>"></script>
<script src="<?= base_url('template/js/bootstrap.min.js'); ?>"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?= base_url('template/js/jquery-plugin-collection.js'); ?>"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="">
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner" class="spinner large-icon">
      <img alt="" src="<?= base_url('template/images/preloaders/4.gif'); ?>">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Desactivar Cargador</div>
  </div>
  
  <!-- Header -->
  <header id="header" class="header">
    <div class="header-nav navbar-fixed-top header-dark navbar-white navbar-transparent navbar-sticky-animated animated-active border-bottom-transparent">
      <div class="header-nav-wrapper">
        <div class="container">
          <nav id="menuzord-right" class="menuzord orange">
            <a class="menuzord-brand pull-left flip mt-10" href="javascript:void(0)">
              <h3 class="text-theme-colored font-26 font-weight-700 mt-5 mb-0">DevAzt</h3>
            </a>
            <ul class="menuzord-menu dark onepage-nav">
              <li class="active"><a href="<?= base_url('home') ?>">Inicio</a></li>
              <!-- <li><a href="<?= base_url('blog') ?>">Blog</a></li> -->
              <li><a href="#about">Acerca de</a></li>
              <li><a href="#services">Servicios</a></li>
              <li><a href="#portfolio">Portfolio</a></li>
              <li><a href="#contact">Contacto</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  
