
<?php require_once("./includes/redirect.php") ?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/nav.php") ?>

<div class="container-fluid px-4 vh-100" id="contenedor">

        <!-- Anterior, para bajar la fila hasta abajo: <div class="row vh-100 ">-->
        <div class="row ">

            <div class="col-lg-3  p-4 mt-4 text-center  ">

                <div class="card bg-transparent">
                    <div class="card-body">
                        <div id="lista"></div>
                    </div>
                </div>
            </div>


            <div class="col-lg-8 mt-4 p-4  " id="contenedor3">
                <!--TEST-->
                <div class="text-center mb-5" id="contenedor2">
                    <div class="jumbotron text-center ">
                        <h1 class="display-4">Crea tu propio TEST</h1>
                        <p class="lead">!prepárate!</p>
                    </div>
                </div>

                <div id="pregunta"></div>
                <div id="respuestas"></div>
                <div id="ultima"></div>
                <div class="d-flex justify-content-center" id="puntos"></div>
                <div class="d-flex justify-content-center" id="fin"></div>

            </div>

     


<?php require_once("./includes/footer.php") ?>