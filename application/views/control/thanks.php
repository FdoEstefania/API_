
    <!-- Start main-content -->
    <div class="main-content">
        <!-- Section: inner-header -->
        <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="http://www.microsoftinsider.es/wp-content/uploads/2016/04/Build-Contest-Developer-Rig.jpg" style="height: 400px;">
        <div class="container pt-60 pb-40">
            <!-- Section Content -->
            <div class="section-content pt-160 pb-30">
            <div class="row"> 
                <div class="col-md-12 text-center">
                <h2 class="title text-white"><?= $control->Nombre ?></h2>
                </div>
            </div>
            </div>
        </div>
        </section>

        <div class="text-center">
            <h1 class="display-3">Gracias</h1>
            <p class="lead"><strong>Revisa tu correco electronico</strong> te enviamos las instrucciones de como descargar los archivos.</p>
            <hr>
            <p>
                Necesitas ayuda? <a href="mailto:daniel_lopez@devazt.com" class="btn btn-primary btn-xs">Contact us</a>
            </p>
        </div>

        <div class="container">
            <p>
                <?= $control->Instrucciones ?>
            </p>
        </div>
    </div>