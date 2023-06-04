<?php require_once("./includes/redirect.php") ?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/nav.php") ?>

<?php $entrada_actual = verEntrada_individual($bd, $_GET['id']);
if (!isset($entrada_actual["id"])) {
    header("Location:./index.php");
}
?>
<div class="container-fluid" id="contenedor">


    <div class="row  vh-100 ">

        <div class="col-lg-8  p-5">


            <h3 class="mb-3">
                <?= $entrada_actual['titulo'] ?> <span class="badge bg-success"><i class="fa-solid fa-file-circle-question fa-lg"></i></span>
            </h3>
            <div class="card cartas">
                <div class="card-body">
                    <h4 class="card-title">
                        <?= $entrada_actual["titulo"] ?>
                    </h4>
                    <a href="category.php?id=<?= $entrada_actual["categoria_id"] ?>"
                        class="text-decoration-none link-light">
                        <h6 class="card-subtitle mb-2 text-body-secondary">
                            <?= $entrada_actual["categoria"] ?>
                        </h6>
                    </a>
                    <p class="card-text">
                        <?= $entrada_actual["descripcion"] ?>
                    </p><br><br>
                    <footer class="blockquote-footer">
                        <?= $entrada_actual["fecha"] . ' | ' . $entrada_actual['usuario'] ?>
                    </footer>


                </div>
                <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']): ?>
                    <button type="button" class="btn btn-warning w-25 m-1 "><a
                            href="edit_question.php?id=<?= $entrada_actual['id'] ?>"
                            class="text-decoration-none link-light"><i class="fa-solid fa-highlighter"></i> Editar Pregunta</a></button>

                    <button type="button" class="btn btn-danger w-25 m-1 "><a
                            href="./src/delete_question.php?id=<?= $entrada_actual['id'] ?>"
                            class="text-decoration-none link-light"><i class="fa-solid fa-trash"></i> Borrar Pregunta</a></button>
                <?php endif; ?>

            </div>


        </div>










        <?php require_once("./includes/user.php") ?>
        <?php require_once("./includes/footer.php") ?>