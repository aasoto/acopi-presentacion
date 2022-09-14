<!-- START PROYECTOS -->
<section class="section bg-light" id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading">Nuestros Proyectos</h4>
                    <p class="title-desc text-muted mt-4">
                        Aquí puedes echarle un vistazo a los proyectos que tiene nuestra seccional hasta el momento.
                    </p>
                    <div class="title-border mt-5">
                            <span class="title-icon">
                                <i class="pe-7s-angle-down"></i>
                            </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4" style="display: flex">

            <?php
            $proyectos = json_decode($pagina_web["proyectos"], true);
            //echo '<pre>'; print_r($proyectos); echo '</pre>';
            $key = null; $value = null;
            foreach ($proyectos as $key => $value) {
                echo '<div class="col-lg-4 bg-white">
                <div class="blog-content mt-4  col-11">
                    <div class="blog-image ">
                        <img src="'.$value["imagen"].'" class="img-fluid" alt="">
                    </div>

                    <!--<div class="blog-lable">
                        <p class="date mb-0">'.$value["fecha_dia"].'</p>
                        <p class="month mb-0">'.$value["fecha_mes"].'</p>
                    </div>-->

                    <div class="blog-content bg-white p-1 pb-4 pb-lg-5">
                        <p class="text-muted f-13 mb-0">'.$value["categoria"].'</p>
                        <h3 class="mt-2"><a href="" class="blog-link f-17">'.$value["nombre"].'</a></h3>
                        <p class="text-muted mt-3 text-justify">'.$value["info"].'</p>
                        
                    </div>
                    
                </div>
                <div class="mt-4 position-absolute bottom-0 start-0 col-11" style="bottom: 10px;left: 20px">
                      <a href="" class="read-more">Ver más <i class="mdi mdi-arrow-right"></i></a>
                </div>
            </div>';
            }
            ?>

        </div>
    </div>
</section>
<!-- END PROYECTOS -->