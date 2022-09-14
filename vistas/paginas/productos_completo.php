<!-- START FAQ -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading">Productos y servicios</h4>
                    <p class="title-desc text-muted mt-4">Acopi Cesar en busqueda de cumplir con su proposito y potenciar el desarrollo de los microempresarios en el departamento, les ofrece los siguiente productos y servicios.</p>
                    <div class="title-border mt-5">
                        <span class="title-icon">
                            <i class="pe-7s-angle-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4 vertical-content">

            <?php 
                $productos = json_decode($pagina_web["productos"], true);
                $contador = 0;
                foreach ($productos as $key => $value) {
                    $contador++;
                }
                 
                //echo '<pre>'; print_r($pagina_web["aliados"]); echo '</pre>';
                foreach ($productos as $key => $value) {

                    echo '<div class="col-lg-6">
                            <div class="faq-content mt-4">
                                <div id="accordion">';
                                if ($key <= ($contador/2)) {
                                    echo '<div class="card mt-3 " style="background-color: #918bca">
                                            <div class="card-header " id="heading'.$key.'">
                                                <h5 class="mb-0 ">
                                                    <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapse'.$key.'" aria-expanded="false" aria-controls="collapse'.$key.'">
                                                     <span class="text-custom  pr-3" style="color: #444444">'.$value["num"].'</span>'.$value["nombre"].'
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapse'.$key.'" class="collapse" aria-labelledby="heading'.$key.'" data-parent="#accordion" style="">
                                                <p class="card-body ">
                                                    '.$value["descripcion"].' 
                                                </p>
                                            </div>
                                    </div>';
                                } else{
                                    echo '<div class="card mt-3" style="background-color: #918bca">
                                        <div class="card-header" id="heading'.$key.'">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapse'.$key.'" aria-expanded="false" aria-controls="collapse'.$key.'">
                                                 <span class="text-custom pr-3" style="color: #444444">'.$value["num"].'</span>'.$value["nombre"].'
                                                </button>
                                          </h5>
                                        </div>

                                        <div id="collapse'.$key.'" class="collapse" aria-labelledby="heading'.$key.'" data-parent="#accordion" style="">
                                            <p class="card-body ">
                                                '.$value["descripcion"].' 
                                            </p>
                                        </div>
                                    </div>';
                                    }
                                echo '</div>
                            </div>
                        </div>';
                }
                //Armoniza la estetica cuando el número total de los productos sea impar
                if ( $contador%2 != 0 ) {
                    echo '<div class="col-lg-6"></div>';
                } 
                $contador = 0;
            ?>    
        </div>
    </div>
</section>
<!-- END FAQ -->