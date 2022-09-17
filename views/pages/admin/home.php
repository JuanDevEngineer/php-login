<?php

use Config\Config;
?>

<?php
if (!isset($_SESSION)) {
  session_start();
}

?>
<?php
require_once "views/pages/layout/header.php";
?>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Home</a>

      <div class="" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo Config::getBaseUrl() ?>/test/logout">Loguot</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">

    <div class="row vh-100">
      <div class="col-lg-6 offset-lg-3">
        <div class="card mt-5">
          <div class="card-body">
            <h4 class="card-title text-center mb-4 mt-1">Bienvenido</h4>
            <hr />
            <?php if (isset($_SESSION["nombre"])) : ?>
              <p>
              <h1>Estimado: <?= strtoupper($_SESSION["nombre"]) ?> <?= strtoupper($_SESSION["apellido"]) ?> </h1>
              </p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>

  </div>


</body>
<!-- <?php require_once "views/pages/layout/footer.php" ?> -->