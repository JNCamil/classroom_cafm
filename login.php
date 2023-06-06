<?php require_once("./includes/head.php") ?>
<div class="container-fluid">
    <div class="row  vh-100">

        <div class="col-lg-6  p-5" id="logincol">
            <div class="row ">
                <div class="col-12 mb-5">
                    <img src="./public/img/logo_ident_login.png" class="img-fluid" id="img_login" alt="Cargando logo">
                </div>
                <div class="col-12 text-white my-5">
                    <h3>CLASROOM CAFM</h3>
                    <h4>¡¡Importante!!</h4>
                    <p>Aquellos que pertenezcan al comité técnico de árbitros podrán ingresar con la cuenta emitida por
                        la
                        REAL FEDERACIÓN DE FÚTBOL DE MADRID.</p>
                </div>
                <div class="col-12 text-white ">
                    <p>&copy; Classroom CAFM</p>

                </div>


            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-center px-5"><!--justify-content-center-->
            <div class="d-flex flex-column m-5">
                <h3 class="m-5 text-center">
                    <i class="fa-solid fa-users fa-lg"></i> Datos de Acceso
                </h3>
                <div class="card w-100 border-0">

                    <div class="card-body">

                        <form action="./src/login_user.php" method="post">

                            <div class="mb-3">

                                <input placeholder="Email" type="email" class="form-control" name="email"
                                    aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">

                                <input placeholder="Contraseña" type="password" class="form-control" name="password">
                            </div>

                            <button type="submit" class="btn btn-danger w-100" name="login">Entrar</button>
                            <?php if (isset($_SESSION["errores"]["login"])): ?>
                                <div class='alert alert-danger alerta' role='alert'>
                                    <?php echo $_SESSION["errores"]["login"] ?>
                                </div>
                            <?php endif; ?>
                            <p class="text-center mt-3">¿No tienes una cuenta? <a href="registration.php">Regístrate
                                    aquí</a>
                            </p>
                        </form>
                        <?php borrarErrores(); ?>
                    </div>
                </div>
            </div>

        </div>



    </div>
</div>


</body>

</html>