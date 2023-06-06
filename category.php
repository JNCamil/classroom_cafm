<?php require_once("./includes/redirect.php") ?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/nav.php") ?>




<!------------------------------------------------------------- CATEGORY ------------------------------------------------------------------------>

<?php if ($_GET['id'] == 1): ?>
    <div class="container-fluid px-4 " id="contenedor">

        <!-- Anterior, para bajar la fila hasta abajo: <div class="row vh-100 ">-->
        <div class="row ">

            <div class="col-lg-3  p-4 mt-4 text-center  ">

                <div class="card ">
                    <div class="card-body">
                        <div id="lista"></div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8 mt-4 p-4 mx-5 " id="contenedor3">
                <!--TEST-->
                <div class="text-center mb-5" id="contenedor2">
                    <div class="jumbotron text-center ">
                        <h1 class="display-4">Reglas de Juego</h1>
                        <p class="lead">!prepárate!</p>
                    </div>
                </div>

                <h6 class="bg-white text-danger p-3 rounded " id="pregunta"></h6>
                <div id="respuestas"></div>
                <div id="ultima"></div>
                <div class="d-flex justify-content-center" id="puntos"></div>
                <div class="d-flex justify-content-center" id="fin"></div>

            </div>

        </div>
    </div>
<?php endif; ?>
<!------------------------------------------------------------- CATEGORY ------------------------------------------------------------------------>
<?php if ($_GET['id'] == 2): ?>
    <div class="container-fluid px-4 " id="contenedor">

        <!-- Anterior, para bajar la fila hasta abajo: <div class="row vh-100 ">-->
        <div class="row ">

            <div class="col-lg-3  p-4 mt-4 text-center  ">

                <div class="card ">
                    <div class="card-body">
                        <div id="listaN"></div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8 mt-4 p-4 mx-5 " id="contenedor3">
                <!--TEST-->
                <div class="text-center mb-5" id="contenedor2">
                    <div class="jumbotron text-center ">
                        <h1 class="display-4">Normativa</h1>
                        <p class="lead">!prepárate!</p>
                    </div>
                </div>

                <h6 class="bg-white text-danger p-3 rounded " id="pregunta"></h6>
                <div id="respuestas"></div>
                <div id="ultima"></div>
                <div class="d-flex justify-content-center" id="puntos"></div>
                <div class="d-flex justify-content-center" id="fin"></div>

            </div>

        </div>
    </div>
<?php endif; ?>
<!------------------------------------------------------------- CATEGORY ------------------------------------------------------------------------>
<?php if ($_GET['id'] == 3): ?>
    <div class="container-fluid px-4 " id="contenedor">

        <!-- Anterior, para bajar la fila hasta abajo: <div class="row vh-100 ">-->
        <div class="row ">

            <div class="col-lg-3  p-4 mt-4 text-center  ">

                <div class="card ">
                    <div class="card-body">
                        <div id="listaA"></div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8 mt-4 p-4 mx-5 " id="contenedor3">
                <!--TEST-->
                <div class="text-center mb-5" id="contenedor2">
                    <div class="jumbotron text-center ">
                        <h1 class="display-4">Redacción de Actas</h1>
                        <p class="lead">!prepárate!</p>
                    </div>
                </div>

                <h6 class="bg-white text-danger p-3 rounded " id="pregunta"></h6>
                <div id="respuestas"></div>
                <div id="ultima"></div>
                <div class="d-flex justify-content-center" id="puntos"></div>
                <div class="d-flex justify-content-center" id="fin"></div>

            </div>

        </div>
    </div>
<?php endif; ?>
<!------------------------------------------------------------- CATEGORY ------------------------------------------------------------------------>
<?php if ($_GET['id'] == 4): ?>


    <div class="card">
        <div class="card-body">
            <div id="lista"></div>
        </div>
    </div>
    </div>

    <div class="col-lg-6 p-4 text-center" id="contenedor2">
        <div class="jumbotron">
            <h1 class="display-4">Reglas de Juego</h1>
            <p class="lead">!prepárate!</p>
        </div>
    </div>

<?php endif; ?>
<!------------------------------------------------------------- CATEGORY ------------------------------------------------------------------------>
<?php if ($_GET['id'] == 5): ?>

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

<?php endif; ?>
<!------------------------------------------------------------- CATEGORY ------------------------------------------------------------------------>
<?php if ($_GET['id'] == 6): ?>


    <div class="card">
        <div class="card-body">
            <div id="lista"></div>
        </div>
    </div>
    </div>

    <div class="col-lg-6 p-4 text-center" id="contenedor2">
        <div class="jumbotron">
            <h1 class="display-4">Reglas de Juego</h1>
            <p class="lead">!prepárate!</p>
        </div>
    </div>

<?php endif; ?>



<?php require_once("./includes/footer.php") ?>