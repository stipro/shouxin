<?php require_once INCLUDES . 'inc_header.php'; ?>

<div class="container py-3">
  <div class="py-5 text-center">
    <a href="<?php echo URL; ?>"><img src="<?php echo IMAGES . 'bee_logo.png' ?>" alt="Bee framework" class="img-fluid" style="width: 200px;"></a>
    <h2>Ingresa a tu cuenta</h2>
    <!-- <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nam, ullam.</p> -->
  </div>

  <div class="row">
    <div class="col-12">
      <?php echo Flasher::flash(); ?>
    </div>

    <!-- formulario -->
    <div class="col-xl-12">
      <div class="card">
        <div class="card-header">
          <h4>Ingresa tu cuenta</h4>
        </div>
        <div class="card-body">
          <form action="login/post_login" method="post" novalidate>
            <?php echo insert_inputs(); ?>

            <div class="mb-3 row">
              <div class="col-12 col-sm-6 col-xl-6">
                <label for="usuario">Usuario</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Walter White" required>
                <small class="text-muted">Ingresa bee</small>
              </div>
              <div class="col-12 col-sm-6 col-xl-6">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <small class="text-muted">Ingresa 123456</small>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <div class="d-flex flex-column">
                <button class="btn btn-primary btn-block mb-2" type="submit">Ingresar</button>
                <br>
                <div class="mg-t-60 tx-center">¿Todavía no esta registrado? </div>
                <a href="#" class="btn btn-danger btn-block btn-with-icon mb-2" id="btnloging">
                  <div class="ht-40">
                    <span class="icon wd-40"><i class="fa fa-google-plus"></i></span>
                    <span class="pd-x-15">Iniciar con Gmail</span>
                  </div>
                </a>
                <br>
                <a href="#" class="btn btn-light btn-block btn-with-icon mb-2" id="btnloginh">
                  <div class="ht-40">
                    <span class="icon wd-40"><i class="fa fa-windows"></i></span>
                    <span class="pd-x-15">Iniciar con Hotmail</span>
                  </div>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require_once INCLUDES . 'inc_footer_v2.php'; ?>