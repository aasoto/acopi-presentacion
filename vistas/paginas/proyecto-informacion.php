<?php $proyecto = ControladorPagina::ctrConsultaProyectoConID($_GET["id"]); 
$pagina_web = ControladorPagina::ctrMostrarPagina();
?>

<!-- START HOME -->
<section class="section bg-home-7" id="home" style="background-image: url(<?php echo $pagina_web["servidor"]; echo 'vistas/images/proyecto/'; echo $proyecto["imagen_proyecto"]; ?>);">
    <div class="bg-overlay-color"></div>
    <div class="home-center">
        <div class="home-desc-center">
            <div class="container">
                <div class="row vertical-content">
                    <div class="col-lg-4">
                        <div class="home-image mt-4">
                            <!--<img src="images/screenshot/img-3.png" class="img-fluid" alt="">-->
                        </div>

                    </div>
                    <div class="col-lg-7 offset-lg-1">
                        <div class="home-content mt-4">
                            <h3 class="home-subtitle text-right"><?php ?></h3>
                            <h4 class="home-subtitle"><?php echo $proyecto["nombre_sector"]; ?></h4>
                            <h2 class="home-title mt-4"><?php echo $proyecto["nombre"]; ?></h2>
                            <p class="home-desc mt-4 f-17"><?php echo $proyecto["descripcion"]; ?></p>

                            <div class="mt-4">
                                <!--<a href="" class="pr-3">
                                    <img src="images/apple-store.png" class="mt-4" height="50" alt="">
                                </a>-->
                                <!--<a href="">
                                    <img src="images/google-play.png" class="mt-4" height="50" alt="">
                                </a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HOME -->

<section class="section" id="features">
    <div class="container">
        <div class="row justify-content-center text-justify">
            <?php echo $proyecto["contenido"]; ?>
        </div>
    </div>
</section>
