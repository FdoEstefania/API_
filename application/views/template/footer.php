<!-- Footer -->
<footer id="footer" class="divider bg-black-222">
    <div class="container pt-70 pb-40">
      <div class="row">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h3 class="text-theme-colored font-25 font-weight-700 line-height-1 mt-0">DevAzt</h3>
            <p class="text-gray-darkgray">Insurgentes #4, Tequexquinahuac, Texcoco, Edo. México</p>
            <ul class="list-inline mt-15">
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone font-weight-600 mr-5"></i> <a class="text-gray-darkgray" href="#">+52 5532182680</a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o font-weight-600 mr-5"></i> <a class="text-gray-darkgray" href="#">jenny_mora@devazt.com</a> </li>
              <li class="m-0 pl-10 pr-10"> <i class="flaticon-global font-weight-600 mr-5"></i> <a class="text-gray-darkgray" href="#">www.devaztio.com</a> </li>
            </ul>
            <a href="#" class="btn btn-theme-colored btn-xs mt-20">Leer más</a>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom text-uppercase font-weight-500 font-14">Nuevas Noticias</h5>
            <div class="twitter-feed clearfix" data-username="devazt_" data-count="3"></div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h5 class="widget-title line-bottom text-uppercase font-weight-500 font-14">Suscríbete Aquí</h5>
            <div class="widget-subscribe mt-20">
              <form id="mailchimp-subscription-form-footer" class="newsletter-form mt-10">
                <div class="input-group">
                  <input type="email" id="mce-EMAIL-footer" data-height="48px" class="form-control input-sm" placeholder="Tu Correo" name="EMAIL" value="">
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-colored btn-theme-colored text-white btn-xs m-0" data-height="48px">Suscríbete</button>
                  </span>
                </div>
              </form>
              <p class="text-gray-darkgray mt-20">Suscríbete y mantente altanto de todas nuestras novedades</p>

              <!-- Mailchimp Subscription Form Validation-->
              <script type="text/javascript">
                $('#mailchimp-subscription-form-footer').ajaxChimp({
                    callback: mailChimpCallBack,
                    url: '//thememascot.us9.list-manage.com/subscribe/post?u=a01f440178e35febc8cf4e51f&amp;id=49d6d30e1e'
                });

                function mailChimpCallBack(resp) {
                    // Hide any previous response text
                    var $mailchimpform = $('#mailchimp-subscription-form-footer'),
                        $response = '';
                    $mailchimpform.children(".alert").remove();
                    if (resp.result === 'success') {
                        $response = '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                    } else if (resp.result === 'error') {
                        $response = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' + resp.msg + '</div>';
                    }
                    $mailchimpform.prepend($response);
                }
              </script>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom bg-black-333">
      <div class="container pt-15 pb-10">
        <div class="row">
          <div class="col-md-6">
            <p class="text-gray sm-text-center font-13 mt-5">Copyright &copy;2017 DevAzt. Todos los derechos reservados</p>
          </div>
          <div class="col-md-6 text-right sm-text-center">            
            <ul class="styled-icons icon-theme-colored clearfix">
              <li><a href="https://www.facebook.com/DevAzt-290341818035270/"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/devazt_"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://www.instagram.com/devazt_/"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="<?= base_url('template/js/custom.js'); ?>"></script>

</body>
</html>