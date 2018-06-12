
<script>var rebaja = '<?= $control->Rebaja ?>';</script>

<!-- Start main-content -->
<div class="main-content">

<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="http://www.microsoftinsider.es/wp-content/uploads/2016/04/Build-Contest-Developer-Rig.jpg" style="height: 700px;">
  <div class="container pt-60 pb-40">
    <!-- Section Content -->
    <div class="section-content pt-160 pb-30">
      <div class="row"> 
        <div class="col-md-12 text-center">
          <h2 class="title text-white"><?= $control->Nombre ?></h2>
          <ol class="breadcrumb white text-center mt-10">
            <li><a href="#">Control</a></li>
            <li class="active text-theme-colored">Detalles</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="section-content">
      <div class="row">
        <div class="product">
          <div class="col-md-5">
            <div class="product-image">
              <div class="zoom-gallery">
                <a href="<?= $control->Imagen ?>" title="<?= $control->Nombre ?>"><img src="<?= $control->Imagen ?>" alt=""></a>
              </div>
            </div>
          </div>
          <div class="col-md-7">
            <div class="product-summary">
              <h2 class="product-title"><?= $control->Nombre ?></h2>
              <div class="price"> <del><span class="amount">$<?= $control->Costo ?></span></del> <ins><span class="amount">$<?= $control->Rebaja ?></span></ins> USD</div>
              <div class="short-description">
                <p><?= $control->Descripcion ?></p>
              </div>
              <div class="category"><strong>Category:</strong> <a href="#"><?= $control->Platform?></a>
            </div>

            <h3>Comprar</h3>
            <form action="<?= base_url('control/paycontrol/' . $control->IdControl) ?>" method="post" class="form" id="formclient">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" id="nombre" class="form-control" name="nombre" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="email" class="form-control" name="email" required>
                </div>
                <div class="form-group text-right">
                  <div id="btnpaypal">
                    <div id="paypal-button"></div>
                  </div>
                </div>
            </form>
          </div>
          <div class="col-md-12">
            <div class="horizontal-tab product-tab">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab">Descripcion</a></li>
                <li><a href="#tab2" data-toggle="tab">Instrucciones</a></li>
                <!-- <li><a href="#tab3" data-toggle="tab">Reviews</a></li>-->
              </ul>
              <div class="tab-content">
                <div class="tab-pane fade in active" id="tab1">
                  <h3>Descripcion</h3>
                  <p><?= $control->DescripcionLarga ?></p>
                </div>
                <div class="tab-pane fade" id="tab2">
                  <!-- INSTALL INSTRUCTIONS -->
                  <h3>Instrucciones</h3>
                  <?= $control->Instrucciones ?>

                  <!--
                  <br>#For Android <br>En el archivo <b>MainActivity.cs</b>, antes de <b>LoadApplication(new App()); </b> pega la siguiente linea <pre>PdfXam.Droid.CrossPdfXam.Init("api-key");</pre>
                  Descarga el plugin pdfjs del siguiente link: <a href="https://mozilla.github.io/pdf.js/" class="btn btn-xs btn-success">PDF.js</a> y copia todo su contenido en <b>AndroidProject/Assets/pdfjs/</b>, como se observa en la siguiente imagen: <br>
                  <img src="https://i.imgur.com/b7MKvqN.png" alt="Assets/pdfjs" class="img-responsive">

                  <br> #For iOS <br>En el archivo <b>AppDelegate.cs</b>, antes de <b>LoadApplication(new App()); </b> pega la siguiente linea <pre>PdfXam.iOS.CrossPdfXam.Init("api-key");</pre> Fuera del metodo FinishedLaunched()... pega el siguiente codigo. <pre>public override void HandleEventsForBackgroundUrl(UIApplication application, string sessionIdentifier, Action completionHandler) {
    PdfXam.iOS.CrossPdfXam.SetCompletionHandler(completionHandler);
} </pre>
                  <br> #For UWP <br>En el archivo <b>MainPage.cs</b>, antes de <b>LoadApplication(new App()); </b> pega la siguiente linea <pre>PdfXam.UWP.CrossPdfXam.Init("api-key");</pre>

                  <br> #For PCL/.Net Standar 2.0 <br> Existen dos formas de llamar al visor de pdf <br>CustomView: <pre>var url = "https://www.ets.org/Media/Tests/TOEFL/pdf/SampleQuestions.pdf";
PDFView view = new PDFView();
view.RenderComplete += View_RenderComplete;
if (!view.RenderOnlinePdf(url))
{
    await DisplayAlert("PDF", "No se puede abrir el archivo, necesitas conexion a internet", "Aceptar");
}
// view.RenderLocal("wireframe.pdf");

// evento for View_RenderComplete
private void View_RenderComplete(object sender, PDFViewer e)
{
    Device.BeginInvokeOnMainThread(() =>
    {
        GridFromXAML.Children.Add(e);
    });
}
</pre>
                  CustomPage: <pre>var url = "https://www.ets.org/Media/Tests/TOEFL/pdf/SampleQuestions.pdf";
PDFPage page = new PDFPage("Cargando pdf, espere...") { Title = "Sample Questions" };
await Navigation.PushAsync(page);
page.RenderOnlinePdf(url, "No tienes conexion a internet");
// page.RenderLocalPdf("wireframe.pdf");
</pre> -->
                </div>
                <div class="tab-pane fade" id="tab3">
                  <div class="reviews">
                    <ol class="commentlist">
                      <li class="comment">
                        <div class="media"> <a href="#" class="media-left"><img class="img-circle" alt="" src="https://placehold.it/75x75" width="75"></a>
                          <div class="media-body">
                            <ul class="review_text list-inline">
                              <li>
                                <div title="Rated 5.00 out of 5" class="star-rating"><span data-width="100%">5.00</span></div>
                              </li>
                              <li>
                                <h5 class="media-heading meta"><span class="author">Tom Joe</span> – Mar 15, 2015:</h5>
                              </li>
                            </ul>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat purus tempor sem molestie, sed blandit lacus posuere. Lorem ipsum dolor sit amet.</div>
                        </div>
                      </li>
                      <li class="comment">
                        <div class="media"> <a href="#" class="media-left"><img class="img-circle" alt="" src="https://placehold.it/75x75" width="75"></a>
                          <div class="media-body">
                            <ul class="review_text list-inline">
                              <li>
                                <div title="Rated 4.00 out of 5" class="star-rating"><span data-width="90%">4.00</span></div>
                              </li>
                              <li>
                                <h5 class="media-heading meta"><span class="author">Mark Doe</span> – Jan 23, 2015:</h5>
                              </li>
                            </ul>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec volutpat purus tempor sem molestie, sed blandit lacus posuere. Lorem ipsum dolor sit amet.</div>
                        </div>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- end main-content -->

</div>

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script src="<?= base_url('/js/control/detalle.min.js'); ?>"></script>