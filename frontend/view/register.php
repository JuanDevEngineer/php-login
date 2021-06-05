<?php 
    require_once "layout/header.php";
 ?>

<body>

    <div class="container">

        <div class="row vh-100">
            <div class="col-lg-4 offset-lg-4">
                <div class="card mt-5">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4 mt-1">Registar</h1>
                        <hr/>
                        <form id="form-register" method="POST">
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control"
                                    id="nombrer" name="nombrer" placeholder="nombre">
                                    <label for="nombrer">nombre</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control"
                                    id="apellidor" name="apellidor" placeholder="apellido">
                                    <label for="apellidor">apellido</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="passr" name="passr" placeholder="password">
                                    <label for="passr">password</label>
                                </div>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-block btn-warning mt-3">
                                    Registrar
                                </button>
                            </div>
                            
                            <div class="text-center mt-2">
                                <a href="<?php echo Config::$BASE_URL ?>admin/login">Volver a login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
<?php require_once "layout/footer.php" ?>