
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="http://www.microsoftinsider.es/wp-content/uploads/2016/04/Build-Contest-Developer-Rig.jpg" style="height: <?= $height ?>px;">
      <div class="container pt-60 pb-40">
        <!-- Section Content -->
        <div class="section-content pt-160 pb-30">
          <div class="row"> 
            <div class="col-md-12 text-center">
              <h2 class="title text-white">Tienda</h2>
              <ol class="breadcrumb white text-center mt-10">
                <li><a href="#">Control</a></li>
                <li class="active text-theme-colored">Index</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="">
      <div class="container mt-30 mb-30 p-30">
        <div class="section-content">
          <div class="row multi-row-clearfix">
            <div class="col-md-10 col-md-offset-1">
              <div class="products">
                <?php foreach ($controles as $control): ?>
                <div class="col-sm-12 col-md-6 col-lg-4 mb-30">
                  <div class="product pb-0">
                    <span class="tag-sale">En venta!</span>
                    <div class="product-thumb"> 
                      <img alt="" src="<?= $control->Imagen ?>" class="img-responsive img-fullwidth">
                      <div class="overlay">
                        <div class="btn-product-view-details">
                          <a class="btn btn-default btn-theme-colored btn-sm btn-flat pl-20 pr-20 btn-add-to-cart text-uppercase font-weight-700" href="<?= base_url('control/' . $control->Url) ?>">Detalles</a>
                        </div>
                      </div>
                    </div>
                    <div class="product-details text-center bg-lighter pt-15 pb-10">
                      <a href="#"><h5 class="product-title mt-0"><?= $control->Nombre ?></h5></a>
                      <div class="price"><del><span class="amount">$<?= $control->Costo ?></span></del><ins><span class="amount">$<?= $control->Rebaja ?></span></ins></div>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->

  </div>