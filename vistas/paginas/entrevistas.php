<?php
$entrevistas = ControladorPagina::ctrMostrarEntrevistasUltimas();
$pagina_web = ControladorPagina::ctrMostrarPagina();
?>

<section class="section bg-light  " id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <a href="index.php?pagina=entrevistas">
                        <h4 class="title-heading">Entrevistas</h4>
                    </a>
                    <p class="title-desc text-muted mt-4">
                        Una parte importante de nuestro trabajo.
                    </p>
                    <a href="index.php?pagina=entrevistas">
                        <div class="title-border mt-5">
                            <span class="title-icon">
                                <i class="pe-7s-angle-down"></i>
                            </span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4" style="display: flex">

            <?php foreach ($entrevistas as $key => $value) { ?>
                <div class="col-lg-4 bg-white px-sm-2 px-md-1">
                    <div class="blog-content mt-4  col-11 pl-2 pr-0 mr-0">
                        <div class="blog-image " >
                            <iframe  src="<?php echo $value['video_entrevista']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width: 100%"></iframe>
                        </div>
                        <div class="blog-content bg-white p-1 pb-4 pb-lg-5">
                            <h3 class="mt-2"><a href="" class="blog-link f-17"><?php echo $value["titulo_entrevista"]; ?></a></h3>
                            <p class="text-muted mt-3 text-justify"><?php echo substr($value['descripcion_entrevista'], 0, 150).'...'; ?></p>
                        </div>
                    </div>
                    <div class="mt-4 position-absolute bottom-0 start-0 col-11" style="bottom: 10px;left: 20px">
                        <a href="index.php?pagina=entrevistas" class="read-more">Ver más <i class="mdi mdi-arrow-right"></i></a>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>