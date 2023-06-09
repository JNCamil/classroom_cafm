<?php require_once("./includes/redirect.php") ?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/nav.php") ?>

<div class="container-fluid px-4 " id="contenedor">

    <!-- Anterior, para bajar la fila hasta abajo: <div class="row vh-100 ">-->
    <div class="row ">

        <div class="col-lg-3  p-4 mt-4 text-center  ">

            <div class="card ">
                <div class="card-body">
                    
                    <div class="btn-group-vertical " aria-label="Vertical button group">
                        <button type="button" class="text-start mb-3  btn btn-outline-danger btn-lg"
                            onclick="showTestVid('FJ')" /><i class="fa-solid fa-folder"></i> Fuera
                        de Juego</button>
                        <button type="button" class="text-start mb-3 btn btn-outline-danger btn-lg"
                            onclick="showTestVid('TLD-TLI')" /><i class="fa-solid fa-folder"></i> Tiro
                        Libro Directo e Indirecto</button>
                        <button type="button" class="text-start    btn btn-outline-danger btn-lg"
                            onclick="showTestVid('TP')" /><i class="fa-solid fa-folder"></i> Tiro
                        Penal</button>
                    </div>
                    
                </div>
            </div>
        </div>


        <div class="col-lg-8 mt-4 p-4 " id="contenedor3">
            <!--TEST-->
            <div class="text-center mb-5" id="contenedor2">
                <div class="jumbotron text-center ">
                    <h1 class="display-4">Vídeos</h1>
                    <p class="lead">!prepárate!</p>
                </div>
            </div>

            <h6 class="bg-white text-danger p-3 rounded " id="pregunta"></h6>
            <div id="respuestas"></div>
            <div id="ultima"></div>
            <div class="d-flex justify-content-center" id="puntos"></div>
            <div class="d-flex justify-content-center" id="fin"></div>

        </div>

   
<?php require_once("./includes/footer.php") ?>