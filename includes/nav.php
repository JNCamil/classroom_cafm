<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">BLOG <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path
                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                </svg></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav navbar-nav-scroll me-auto mb-2 mb-lg-0">
                    <?php $categorias = verCategorias($bd);
                    if (!empty($categorias)):
                        foreach ($categorias as $categoria): ?>

                            <li class="nav-item">
                                <a class="nav-link" href="categoria.php?id=<?php echo $categoria["id"] ?>">
                                    <?php echo $categoria["nombre"] ?>
                                </a>
                            </li>

                        <?php endforeach;
                    endif;
                    ?>

                </ul>
        <form action="buscar.php" class="d-flex" role="search" method="post">
        <input name="busqueda" class="form-control me-2 bg-light" type="search" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-secondary" type="submit">Buscar</button>
      </form>

            </div>
        </div>
    </nav>