<?php require_once("./includes/redirect.php") ?>
<?php require_once("./includes/head.php") ?>
<?php require_once("./includes/nav.php") ?>

<?php $entrada_actual = verEntrada_individual($bd, $_GET['id']);
if (!isset($entrada_actual["id"])) {
    header("Location:./index.php");
}
?>
<div class="container-fluid" id="contenedor">


    <div class="row   ">

        <div class="col-lg-8  p-5">


            <h3 class="mb-3">
                <?= $entrada_actual['titulo'] ?> <span class="badge bg-success"><i class="fa-solid fa-file-circle-question fa-lg"></i></span>
            </h3>
            <div class="card bg-transparent border-0">
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
                            class="text-decoration-none link-light"><i class="fa-solid fa-highlighter"></i> Editar Post</a></button>

                    <button type="button" class="btn btn-danger w-25 m-1 "><a
                            href="./src/delete_question.php?id=<?= $entrada_actual['id'] ?>"
                            class="text-decoration-none link-light"><i class="fa-solid fa-trash"></i> Borrar Post</a></button>
                <?php endif; ?>

            </div>
            <div id="disqus_thread" class="card p-2 my-3 bg-transparent border-0"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
    this.page.url = '<?php echo "https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]; ?>';  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = '<?php echo $entrada_actual["id"]; ?>'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://classroom-cafm.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

        </div>










        <?php require_once("./includes/user.php") ?>
        <?php require_once("./includes/footer.php") ?>