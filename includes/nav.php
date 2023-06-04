
<nav class="navbar navbar-expand-lg bg-danger  fixed-top" data-bs-theme="light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php"> <img  src=".\public\img\logo_ident_login.png" alt="Cargando Logo" id="img_nav"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav navbar-nav-scroll me-auto mb-2 mb-lg-0 ">
                <?php $categorias = verCategorias($bd);
                if (!empty($categorias)):
                    foreach ($categorias as $categoria): ?>

                        <li class="nav-item">
                            <a class="nav-link text-white" id="nav_item" href="category.php?id=<?php echo $categoria["id"] ?>">
                                <?php echo $categoria["nombre"] ?>
                            </a>
                        </li>

                    <?php endforeach;
                endif;
                ?>

            </ul>
            <form action="./search.php" class="d-flex" role="search" method="post">
                <input name="busqueda" class="form-control me-2 " type="search" placeholder="Buscar preguntas"
                    aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>

        </div>
    </div>
</nav>