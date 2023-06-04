<?php require_once("./includes/redirect.php") ?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/nav.php") ?>
<?php $entrada_actual = verEntrada_individual($bd, $_GET['id']);
if (!isset($entrada_actual["id"])) {
    header("Location:index.php");
}
?>
<div class="container-fluid" id="contenedor">


    <div class="row  vh-100 ">

        <div class="col-lg-8  p-5">


            <h3 class="mb-3">Editar Pregunta <span class="badge bg-warning">
                    <i class="fa-solid fa-file-pen fa-lg text-light"></i>
                </span></h3>

            <div class="card">
                <div class="card-body">
                    <form action="./src/save_question.php?editar=<?= $entrada_actual['id'] ?>" method="post">
                        <label for="titulo" class="form-label">Título:</label>
                        <input type="text" name="titulo" class="form-control"
                            value="<?= $entrada_actual['titulo'] ?>"><br>
                        <?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], "titulo") : ""; ?>
                        <label for="descripcion" class="form-label">Descripción:</label>
                        <textarea name="descripcion"
                            class="form-control"><?= $entrada_actual['descripcion'] ?></textarea><br>
                        <?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], "descripcion") : ""; ?>
                        <label for="categoria" class="form-label">Categoría: </label>
                        <select name="categoria">
                            <?php $categorias = verCategorias($bd);
                            if (isset($categorias)):
                                foreach ($categorias as $categoria): ?>
                                    <option value="<?php echo $categoria["id"] ?>"
                                        <?= ($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"' : '' ?>>
                                        <?php echo $categoria["nombre"] ?>
                                    </option>

                                <?php endforeach;
                            endif; ?>
                        </select>
                        <br>
                        <?php echo isset($_SESSION["errores_entrada"]) ? mostrarError($_SESSION["errores_entrada"], "categoria") : ""; ?>
                        <div class="text-center">
                        <button type="submit" class="btn btn-warning text-white my-1"
                            name="guardar">Guardar</button>
                        </div>
                    </form>
                    <?php borrarErrores(); ?>
                </div>
            </div>




        </div>



        <?php require_once("./includes/user.php") ?>
        <?php require_once("./includes/footer.php") ?>