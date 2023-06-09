<?php require_once("./includes/head.php") ?>
<div class="container-fluid">
    <div class="row  vh-100">

        <div class="col-lg-6  p-5" id="logincol">
            <div class="row ">
                <div class="col-12 mb-5">
                    <img src="./public/img/logo_ident_login.png" class="img-fluid" id="img_login" alt="Cargando logo">
                </div>
                <div class="col-12 my-5">
                    <!-- Espaciador -->
                </div>
                <div class="col-12 my-4">
                    <!-- Espaciador -->
                </div>
                <div class="col-12 text-white my-5">
                    <h3>CLASROOM CAFM</h3>
                    <h4>¡¡Importante!!</h4>
                    <p>Aquellos que pertenezcan al comité técnico de árbitros podrán ingresar con la cuenta emitida por
                        la
                        REAL FEDERACIÓN DE FÚTBOL DE MADRID.</p>
                </div>
                <div class="col-12 my-5">
                    <!-- Espaciador -->
                </div>
                <div class="col-12 text-white ">
                    <p>&copy; Classroom CAFM</p>

                </div>


            </div>
        </div>
        <div class="col-lg-6 d-flex align-items-center px-5 justify-content-center" ><!--justify-content-center-->
            <div class="d-flex flex-column m-5">
                <h3 class="m-4 text-center">
                    <i class=" fa-solid fa-address-card fa-xl"></i> Regístrate
                </h3>
                <div class="card w-100 border-0">

                    <div class="card-body">

                        <form action="./src/registration_user.php" method="post">


                            <?php if (isset($_SESSION["completado"])): ?>
                                <div class='alert alert-success alerta' role='alert'>
                                    <?php echo $_SESSION['completado'] . " <a href=login.php>Inicie sesión</a>" ?>
                                </div>

                            <?php elseif (isset($_SESSION["errores"]['general'])): ?>
                                <div class='alert alert-success alerta' role='alert'>
                                    <?php echo ($_SESSION['errores']['general']) ?>
                                </div>
                            <?php endif; ?>

                            <div class="mb-3">

                                <input placeholder="Nombre" type="text" class="form-control" name="nombre">
                                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nombre") : ""; ?>
                            </div>
                            <div class="mb-3">

                                <input placeholder="Apellidos" type="text" class="form-control" name="apellidos">
                                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "apellidos") : ""; ?>
                            </div>
                            <div class="mb-3">

                                <input placeholder="Email" type="email" class="form-control" name="email"
                                    aria-describedby="emailHelp">

                                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "email") : ""; ?>
                            </div>
                            <div class="mb-3">

                                <input placeholder="Contraseña" type="password" class="form-control" name="password">
                                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "password") : ""; ?>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="terminos">
                                <label class="form-check-label" for="exampleCheck1">Aceptar términos y condiciones del
                                    CAFM</label>
                                <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "terminos") : ""; ?>
                            </div>
                            <button type="submit" class="btn btn-danger w-100 " name="registro">Registrar</button>
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