<?php require_once("./includes/redirect.php") ?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/nav.php") ?>



<!------------------------------------------------------------- CATEGORY ------------------------------------------------------------------------>


<div class="container-fluid" id="contenedor">


    <div class="row  vh-100 ">

        <div class="col-lg-8  p-5">
            <?php $categoria_actual = verCategoria($bd, $_GET['id']);
            if (!isset($categoria_actual["id"])) {
                header("Location:index.php");
            }
            ?>

            <h3 class="mb-5">
                <?= strtoupper($categoria_actual['nombre']) ?> <span class="badge bg-danger">
                    ¡Últimas preguntas!
                </span></h3>
                <?php if ($_GET['id'] != 5): ?>
                    <button type="button" class="btn btn-primary my-2"><a href="./test<?=$_GET['id']?>.php" class="text-decoration-none link-light"><span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> ¡Ponte a prueba! <span class="badge bg-warning"><?=($_GET['id'] == 6)? '¡Crear TEST!':'¡Hacer TEST!'?></span></button>
                <?php endif; ?>
                <?php $entradas = verEntradas($bd, null, $_GET['id']);
                if (!empty($entradas)):
                    foreach ($entradas as $entrada): ?>

                        <div class="card mb-1 border-0 bg-transparent">
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
                    <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">No hay entradas en esta categoria</h4>

                                </div>
                </div>
                <?php endif; ?>



        </div>



        <?php require_once("./includes/user.php") ?>
        <?php require_once("./includes/footer.php") ?>