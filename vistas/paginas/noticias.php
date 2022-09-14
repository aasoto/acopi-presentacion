

<!--=====================================
CONTENIDO NOTICIAS
======================================-->

<section class="section" id="features">
<div class="container-fluid bg-white contenidoInicio pb-4">
    
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading">Noticias</h4>
                    <p class="title-desc text-muted mt-4">En esta sesión encontraras las  noticias más recientes de nuestra agremiación, solo cliquea 
                    sobre el recuadro para ver más.</p>
                    <div class="title-border mt-5">
                        <span class="title-icon">
                            <i class="pe-7s-angle-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
        
        <div class="row">
            <!-- COLUMNA IZQUIERDA -->
            <div class="col-12 col-md-12 col-lg-12 p-0 pr-lg-5">
                <?php foreach ($noticias as $key => $value) { ?>
                <!-- ARTÍCULO 01 -->
                <div class="row">

                    <div class="col-12 ">



                        <a href="index.php?pagina=contenido_noticia&id=<?php echo $value["id"]; ?>">
                            <h3 class="d-block  d-md-block py-3"><?php echo $value["titulo"]; ?></h3>
                        </a>
                        <a href="index.php?pagina=contenido_noticia&id=<?php echo $value["id"]; ?>" >

                            <div class="position-relative">
                                <div class="blog-lable">
                                    <p class="date mb-0">
                                        <?php
                                        $date=explode(".", $value['fecha_noticia']);
                                        echo $date[0];
                                        ?>
                                    </p>
                                    <p class="month mb-0">
                                        <?php
                                        $mesNum  = $date[1];
                                        $meses = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
                                        echo $meses[$mesNum-1];
                                        ?>
                                    </p>
                                </div>
                                <img src="<?php echo $pagina_web["servidor"]; echo $value["portada_noticia"]; ?>" alt="portada <?php echo $value["descripcion_noticia"];  ?>" class="img-fluid" width="100%">
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-lg-10 introArticulo">

<!--                        <a href="index.php?pagina=contenido_noticia&id=--><?php //echo $value["id"]; ?><!--">-->
<!--                            <h3 class="title-heading d-none d-lg-block d-md-none ">-->
<!--                                --><?php //echo $value["titulo"]; ?>
<!--                            </h3>-->
<!--                        </a>-->
                        <p class="title-desc text-muted mt-4 ml-1"><?php echo $value["descripcion_noticia"]; ?></p>
                        <a href="index.php?pagina=contenido_noticia&id=<?php echo $value["id"]; ?>" class="read-more font-weight-bold">Leer Más</a>

                    </div>

                </div>
                <hr class="mb-4 mb-lg-5" style="border: 1px solid #152452">
                <?php } ?>

                
            </div>


            <div class="text-center">
                <a href="index.php?pagina=noticias&pestana=1" class="read-more font-weight-bold"> Ver todas las noticias     <i class="mdi mdi-arrow-right"></i></a>
            </div>
            
        </div>
    </div>
</div>
</section>





