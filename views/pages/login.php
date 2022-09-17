<?php

use Config\Config;

require_once "layout/header.php";
if (!isset($_SESSION)) {
  session_start();
}

?>

<body>

  <div class="container">

    <div class="row vh-100">
      <div class="col-lg-4 offset-lg-4">
        <div class="card mt-5">
          <div class="card-body">
            <h1 class="card-title text-center mb-4 mt-1">Login</h1>
            <hr />
            <form id="form-login" method="POST">
              <div class="form-group">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="name@example.com">
                  <label for="floatingInput">nombre</label>
                </div>
              </div>

              <div class="form-group">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="apellido" name="apellido" placeholder="name@example.com">
                  <label for="floatingInput">apellido</label>
                </div>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="checkdatos">
                <label class="form-check-label" for="checkdatos">
                  Guardar Datos
                </label>
              </div>

              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-block btn-warning mt-3">
                  Ingresar
                </button>
              </div>
            </form>
            <div class="text-center mt-2">
              <a href="<?php echo Config::getBaseUrl() ?>/test/register">Registar</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>
<?php require_once "layout/footer.php" ?>