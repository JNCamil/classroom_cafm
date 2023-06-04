<?php require_once("./includes/redirect.php") ?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/nav.php") ?>

<div class="container-fluid" id="contenedor">


    <div class="row  vh-100 ">

        <div class="col-lg-8  p-5">


            <h3>En el Terreno de Juego. Nuestro Blog <span class="badge bg-danger">¡Útlimas preguntas!</span></h3>

            <?php $entradas = verEntradas($bd);
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
            endif;
            ?>

           

        </div>

  

<?php require_once("./includes/user.php") ?>
<?php require_once("./includes/footer.php") ?>