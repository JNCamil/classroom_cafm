<div class="col-lg-4 my-5 p-5 "><!--justify-content-center--   Antigua: mod 04/06/23 -- my-5  p-5-->


<?php if (isset($_SESSION["usuario"])): ?>
    <div class="card m-3 text-center">
        <div class="card-body">
            <h5 class="card-title">
                <?php echo  strtoupper($_SESSION['usuario']["nombre"] . " " . $_SESSION['usuario']["apellidos"]); ?>
            </h5>

            <p class="card-text">Esperemos que disfrute de su estadía.</p>
            <button type="button" class="btn btn-danger m-2 w-75"><i class="fa-solid fa-person-circle-question fa-xl"></i><a href="./create_question.php" class="text-decoration-none link-light"> Crear
                    Pregunta</button><br>
           
            <button type="button" class="btn btn-success m-2 w-75"><i class="fa-solid fa-person-circle-exclamation fa-xl"></i><a href="./data_user.php" class="text-decoration-none link-light"> Mis
                    datos</button><br><br>

            <a href="./src/session_close.php" >Cerrar sesión</a>
        </div>
    </div>
<?php endif; ?>


</div>