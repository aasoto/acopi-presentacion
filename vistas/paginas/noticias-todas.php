<!--=====================================
CONTENIDO REPOSITORIO DE NOTICIAS
======================================-->
<?php
$noticias_por_pagina = 5;
$total_noticias = ControladorPagina::ctrContarNoticias();
$total_paginas = $total_noticias / $noticias_por_pagina;
$total_paginas = ceil($total_paginas);
$pagina_web = ControladorPagina::ctrMostrarPagina();

if (!$_GET['pestana']) {
    header('Location:index.php?pagina=noticias&pestana=1');
}

$noticias_todas = ControladorPagina::ctrMostrarNoticiasConPaginacion($_GET['pestana'], $noticias_por_pagina)

?>
<section class="section" id="features">
    <div class="container-fluid bg-white contenidoInicio pb-4">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="title-box text-center">
                        <h4 class="title-heading">Noticias</h4>
                        <p class="title-desc text-muted mt-4">Este es nuestro repositorio general de noticias, aparecen de la más reciente a la más antigua.</p>
                        <div class="title-border mt-5">
                            <span class="title-icon">
                                <i class="pe-7s-angle-down"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header bg-secondary" id="headingTwo">
                                <div class="row">
                                    <div class="col text-center">
                                        <h5 class="mb-2">
                                            <button class="btn btn-link text-white collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Seleccionar noticias por año
                                            </button>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <?php 
                                    $year_options = date('Y'); 
                                    for ($i=0; $i < 20; $i++) {
                                        echo '<a href="index.php?pagina=noticias_year&year='.$year_options.'&pestana=1">';
                                             echo '<button class="btn btn-sm">'.$year_options.'</button>';
                                            $year_options--;?>
                                        </a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
            <br><br>
            <?php //echo $total_paginas;  
            ?>
            <div class="row">
                <!-- COLUMNA IZQUIERDA -->
                <div class="col-12 col-md-12 col-lg-12 p-0 pr-lg-5 ">
                    <?php foreach ($noticias_todas as $key => $value) { ?>
                        <!-- Inicio Noticia -->
                        <div class="row">
                            <div class="col-12  position-relative ">
                                <div class="blog-lable">
                                    <p class="date mb-0">
                                        <?php
                                        $date = explode(".", $value['fecha_noticia']);
                                        echo $date[0];
                                        ?>
                                    </p>
                                    <p class="month mb-0">
                                        <?php
                                        $mesNum  = $date[1];
                                        $meses = array("Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic");
                                        echo $meses[$mesNum - 1];
                                        ?>
                                    </p>
                                </div>
                                <div class="col-12  ">
                                    <a href="index.php?pagina=contenido_noticia&slug=<?php echo $value["ruta_noticia"]; ?>">
                                        <h3 class="d-block  py-3"><?php echo $value["titulo"]; ?></h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <a href="index.php?pagina=contenido_noticia&slug=<?php echo $value["ruta_noticia"]; ?>">
                                    <div class="position-relative">
                                        <img src="<?php echo $pagina_web["servidor"]; echo $value["portada_noticia"]; ?>" alt="portada <?php echo $value["descripcion_noticia"];  ?>" width="100%">
                                    </div>
                                </a>
                            </div>
                            <div class="col-8">
                                <div class="col-12  introArticulo">
                                    <p class="title-desc text-muted "><?php echo $value["descripcion_noticia"]; ?></p>
                                    <a href="index.php?pagina=contenido_noticia&slug=<?php echo $value["ruta_noticia"]; ?>" class=" read-more font-weight-bold">Leer Más</a>
                                </div>
                            </div>
                        </div>
                        <!-- Fin noticia -->
                        <hr class="mb-4 mb-lg-5" style="border: 1px solid #152452">
                    <?php } ?>

                    <!--Aquí empieza la paginación-->
                    <div class="justify-content-center row">
                        <nav aria-label="Page navigation example col-10">
                            <ul class="pagination flex-wrap">
                                <li class="page-item <?php echo $_GET['pestana'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="index.php?pagina=noticias&pestana=<?php echo $_GET['pestana'] - 1; ?>">Anterior</a></li>
                                <?php for ($i = 0; $i < $total_paginas; $i++) : ?>
                                    <li class="page-item <?php echo $_GET['pestana'] == $i + 1 ? 'active' : '' ?>"><a class="page-link" href="index.php?pagina=noticias&pestana=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
                                <?php endfor ?>
                                <li class="page-item <?php echo $_GET['pestana'] >= $total_paginas ? 'disabled' : '' ?>"><a class="page-link" href="index.php?pagina=noticias&pestana=<?php echo $_GET['pestana'] + 1; ?>">Siguiente</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--Fin paginación-->
                </div>
            </div>
        </div>
    </div>
</section>