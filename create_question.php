<?php require_once("./includes/redirect.php") ?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/nav.php") ?>

<div class="container-fluid" id="contenedor">


    <div class="row  vh-100 ">

        <div class="col-lg-8   p-5">


            <h3 class="mb-3">Crear Post o Una Pregunta <span class="bg-danger rounded-circle p-2">
                    <i class="fa-solid fa-circle-question fa-xl text-light"></i>
                </span></h3>

            <div class="card">
                <div class="card-body">
                <form action="./src/save_question.php" method="post">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" name="titulo" class="form-control"><br>
                <?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], "titulo") : ""; ?>
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" class="form-control"></textarea><br>
                <?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], "descripcion") : ""; ?>
                <label for="categoria" class="form-label">Categoría: </label>
                <select name="categoria">
                    <?php $categorias = verCategorias($bd);
                    if (isset($categorias)):
                        foreach ($categorias as $categoria): ?>
                            <option value="<?php echo $categoria["id"] ?>">
                            <?php echo $categoria["nombre"] ?>
                            </option>

                        <?php endforeach;
                    endif; ?>
                </select>
                <br>
                <?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], "categoria") : ""; ?>
                <div class="text-center">
                <button type="submit" class="btn btn-danger  my-3" name="guardar">Guardar</button>
                </div>
            </form>
            <?php borrarErrores(); ?>
                </div>
            </div>


            

        </div>



        <?php require_once("./includes/user.php") ?>
        <?php require_once("./includes/footer.php") ?>