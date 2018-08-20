
<div style="background: black;">
<br><br><br>
</div>

<!-- Start main-content -->
<div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider parallax fullscreen layer-overlay overlay-dark-9" data-bg-img="https://cdn-images-1.medium.com/max/2000/1*OOWSoWHeQ5kyJ4N0P2ptNA.png">
      <div class="display-table">
        <div class="display-table-cell">
          <div class="container">
            <div class="row">
              <div class="col-md-6 col-md-push-3">
                <h4 class="text-theme-colored mt-0 pt-5 text-center"> Login</h4>
                <hr>
                <p style="color: white;">Ingresa tus datos para iniciar sesion.</p>

                <?php if(!empty($message)): ?>
                  <p style="color: red"><?= $message ?></p>
                <?php endif; ?>

                <form action="<?= base_url("home/trylogin") ?>" method="post" class="clearfix">
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="form_username_email" style="color: white;">Email</label>
                      <input id="form_username_email" name="email" class="form-control" type="text">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="form_password" style="color: white;">Password</label>
                      <input id="form_password" name="password" class="form-control" type="password">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="form-control btn btn-dark btn-sm">Login</button>
                  </div>
                  <div class="clear text-center">
                    <a class="text-theme-colored font-weight-600 font-12" href="#">Forgot Your Password?</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
<!-- end main-content -->
