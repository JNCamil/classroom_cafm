<?php
if (!isset($_POST["busqueda"]) || empty($_POST["busqueda"])) {
    header("Location:index.php");
}
?>
<?php require_once("./includes/redirect.php") ?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/nav.php") ?>

<div class="container-fluid" id="contenedor">


    <div class="row  vh-100 ">

        <div class="col-lg-8   p-5 ">

            <h3>Resultados de busqueda
                <span class="badge bg-success"><i class="fa-solid fa-magnifying-glass"></i>
                    <?= $_POST['busqueda'] ?>
                </span>
            </h3>

            <?php $entradas = verEntradas($bd, null, null, $_POST['busqueda']);
            if (!empty($entradas)):
                foreach ($entradas as $entrada): ?>

                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="individual_question.php?id=<?= $entrada["id"] ?>"
                                    class="text-decoration-none link-dark">
                                    <?php echo $entrada["titulo"] ?>
                            </h4>
                            <h6 class="card-subtitle mb-2 text-body-secondary">
                                <?php echo $entrada["categoria"] . " | " . $entrada["fecha"] ?>
                            </h6>
                            <p class="card-text">
                                <?php echo substr($entrada["descripcion"], 0, 100) . "..." ?>
                            </p>
                            </a>
                            <!--Ajusta la cadena para que sólo aparezcan 100 caracteres, en caso de ser una entrada grande-->
                        </div>
                    </div>
                <?php endforeach;
            else:
                ?>

                <div class='alert alert-danger alerta' role='alert'>No hay resultados</div>
            <?php endif; ?>

        </div>



        <?php require_once("./includes/user.php") ?>
        <?php require_once("./includes/footer.php") ?>