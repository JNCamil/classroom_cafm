<?php require_once("./includes/redirect.php") ?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/nav.php") ?>


<div class="container-fluid" id="contenedor">


    <div class="row  vh-100 ">

        <div class="col-lg-8   p-5">


            <h3 class="mb-3">Modificar mis datos <span class="badge bg-warning">
                    <i class="fa-solid fa-user-tag fa-lg text-light"></i>
                </span></h3>

            <div class="card ">
                <div class="card-header">Mis datos</div>
                <?php if (isset($_SESSION["completado"])): ?>
                    <div class='alert alert-success alerta' role='alert'>
                        <?php echo $_SESSION['completado'] ?>
                    </div>

                <?php elseif (isset($_SESSION["errores"]['general'])): ?>
                    <div class='alert alert-danger alerta' role='alert'>
                        <?php echo ($_SESSION['errores']['general']) ?>
                    </div>
                <?php endif; ?>

                <div class="card-body ">
                    <form action="actualizar_usuario.php" method="post">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre"
                            value="<?= $_SESSION["usuario"]["nombre"]; ?>"><br>
                        <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "nombre") : ""; ?>
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos"
                            value="<?= $_SESSION["usuario"]["apellidos"]; ?>"><br>
                        <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "apellidos") : ""; ?>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email"
                            value="<?= $_SESSION["usuario"]["email"]; ?>"><br>
                        <?php echo isset($_SESSION["errores"]) ? mostrarError($_SESSION["errores"], "email") : ""; ?>
                        <div class="text-center">
                        <button type="submit" class="btn btn-warning text-white my-1" name="modificar">Modificar</button>
                        </div>
                    </form>
                    <?php borrarErrores(); ?>
                </div>
            </div>




        </div>





        <?php require_once("./includes/user.php") ?>
        <?php require_once("./includes/footer.php") ?>