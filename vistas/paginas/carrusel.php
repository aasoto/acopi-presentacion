<section class="home-slider  " id="home" style="margin-top: 65px; min-height: 80%">
    <div class="container-fluid">
        <div class="row">
            <div id="carouselExampleControls" class="carousel slide carousel-noticias" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                        $carrusel = json_decode($pagina_web["carrusel"], true);
                        $active = true;
                        foreach ($carrusel as $key => $value)
                        {
                            if ($active)
                            {
                                if ($value["categoria"] != 'undefined' && $value["titulo"] != 'undefined' && $value["texto"] != 'undefined')
                                {
                                    echo '
                                            <div 
                                                class="carousel-item active" 
                                                style="background-image: url(administrador/public/' . $value["fondo"] . ');
                                                background-position: center center; min-height:80vh;';
                                    echo '">';
                                }

                                        if ($value["categoria"] == 'undefined' && $value["titulo"] == 'undefined' && $value["texto"] == 'undefined'){
                                            echo '
                                            <a href="'.$value['url-boton-1'].'"
                                                class="carousel-item active" 
                                                style="background-image: url(administrador/public/' . $value["fondo"] . ');
                                                background-position: center center; min-height:80vh; min-width:100vw';
                                            echo '">';

                                        }
                                       echo'
                                                <div class="home-center ">
                                                    <div class="home-desc-center">
                                        ';
                                                        if ($value["categoria"] != 'undefined' && $value["titulo"] != 'undefined' && $value["texto"] != 'undefined')
                                                        {
                                                            echo '<div class="bg-overlay-color"></div>';
                                                            //TODO -  ESTE DIV QUE FUNCION TIENE?  es el de fullscreen?
                                                        }
                                                        echo '<div class="container">
                                                                <div class="row vertical-content">
                                                                    <div class="col-lg-6">
                                                                        <div class=" home-content mt-4 slider-principal text-wrap text-break px-md-0">
                                                            ';
                                                                            if ($value["categoria"] != 'undefined' )
                                                                            {
                                                                                echo '<h4 class="home-subtitle">'.$value["categoria"].'</h4>';
                                                                            }
                                                                            if ($value["titulo"] != 'undefined'){
                                                                               echo '<h2 class="home-title my-4 text-break " >'.$value["titulo"].'</h2>' ;
                                                                            }
                                                                            if ($value["texto"] != 'undefined'){
                                                                               echo '<p class="home-desc mt-4 f-17 text-break" >'.$value["texto"].'</p>';
                                                                            }


                                                                            echo '<div class="mt-4 ">
                                                                                 ';
                                                                                if ($value["categoria"] != 'undefined' && $value["titulo"] != 'undefined' && $value["texto"] != 'undefined')
                                                                                {


                                                                                    if (isset($value['url-boton-1']) && $value['url-boton-1'] != "") {
                                                                                        //si boton1 tiene la url definida dibujarlo
                                                                                        echo '   
                                                                                                <a  href="' . $value["url-boton-1"] . '" 
                                                                                                    class="pr-3 btn btn-primary btn-slider-item mb-5  ' . $value["boton-1-color"] . '"
                                                                                                >
                                                                                             ';
                                                                                        if (isset($value['boton-1-texto']) and $value['boton-1-texto'] != '') {
                                                                                            echo $value['boton-1-texto'];
                                                                                        } else {
                                                                                            echo "Ver Más";
                                                                                        }
                                                                                        echo '  </a>
                                                                                             ';
                                                                                    }
                                                                                    if (isset($value['url-boton-2']) && $value['url-boton-2'] != "") {
                                                                                        //si boton2 tiene la url definida dibujarlo
                                                                                        echo '
                                                                                                <a  href="' . $value["url-boton-2"] . '" 
                                                                                                    class="pr-3 btn btn-primary btn-slider-item mb-5  ' . $value["boton-2-color"] . '"
                                                                                                >
                                                                                             ';
                                                                                        if (isset($value['boton-2-texto']) and $value['boton-2-texto'] != '') {
                                                                                            echo $value['boton-2-texto'];
                                                                                        } else {
                                                                                            echo "Ver Más";
                                                                                        }
                                                                                        echo '  </a>';
                                                                                    }
                                                                                    //boton de relleno cuando ambos botones estan vacios

                                                                                   /* if ((!(isset($value['url-boton-1']) && $value['url-boton-1'] != ""))and (!(isset($value['url-boton-2']) && $value['url-boton-2'] != "")))
                                                                                    {

                                                                                        echo '
                                                                                            <a  href="' . $value["url-boton-1"] . '"
                                                                                                class="pr-3 btn btn-primary btn-slider-item mb-5  ' . $value["boton-1-color"] . '"
                                                                                            >
                                                                                        ';
                                                                                        if (isset($value['boton-1-texto']) and $value['boton-2-texto'] != '') {
                                                                                            echo $value['boton-1-texto'];
                                                                                        } else {
                                                                                            echo "Ver Más";
                                                                                        }
                                                                                        echo ' </a>';
                                                                                    }*/
                                                                                }
                                                        echo    '
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                               ';//cierre div  col-lg-6
                               echo'
                                                                    <div class="col-lg-4 offset-lg-1">
                                                                        <!--<div class="home-image text-lg-right mt-4">
                                                                            <img src="administrador/public/'.$value["foto-delante"].'" class="img-fluid" alt="">
                                                                        </div>-->
                                                                    </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                ';
                                if ($value["categoria"] != 'undefined' && $value["titulo"] != 'undefined' && $value["texto"] != 'undefined'){
                                    echo '</div>';
                                }
                                if ($value["categoria"] == 'undefined' && $value["titulo"] == 'undefined' && $value["texto"] == 'undefined'){
                                    echo '</a >';
                                }

//                                                   row vertical-content
//                                                 container
                                                //home-desc-center
                                             //home-center
                                        //carousel-item active
                                $active = false;
                            }else
                            {


                                if ($value["categoria"] != 'undefined' && $value["titulo"] != 'undefined' && $value["texto"] != 'undefined')
                                {
                                    echo '
                                        <div class="carousel-item" 
                                            style="background-image: url(administrador/public/'.$value["fondo"].');
                                            background-position: center center;min-height:80vh;';

                                    echo'   ">';
                                }

                                if ($value["categoria"] == 'undefined' && $value["titulo"] == 'undefined' && $value["texto"] == 'undefined'){
//                                    echo '
//                                            <a href="'.$value['url-boton-1'].'"
//                                                class="carousel-item active"
//                                                style="background-image: url(administrador/public/' . $value["fondo"] . ');
//                                                background-position: center center; min-height:80vh; min-width:100vw';
//                                    echo '">';

                                    echo '
                                        <a href="'.$value['url-boton-1'].'" class="carousel-item" 
                                            style="background-image: url(administrador/public/'.$value["fondo"].');
                                            background-position: center center;min-height:80vh;';

                                    echo'   ">';


                                }


                                echo'
                                            <div class="home-center ">
                                                <div class="home-desc-center">
                                    ';
                                                    if ($value["categoria"] != 'undefined' && $value["titulo"] != 'undefined' && $value["texto"] != 'undefined') {
                                                        echo '<div class="bg-overlay-color"></div>';
                                                    }
                                                    echo '<div class="container">';

                                                    echo'
                    
                                                            <div class="row vertical-content">
                
                                                                <div class="col-lg-7">
                                                                    <div class="home-content mt-2 slider-principal text-wrap text-break px-md-0">
                                                         ';
                                                                        /*if ($value["categoria"] != 'undefined' && $value["titulo"] != 'undefined' && $value["texto"] != 'undefined')
                                                                        {
                                                                            echo '
                                                                            <h4 class="home-subtitle">'.$value["categoria"].'</h4>
                                                                            <h2 class="home-title mt-4">'.$value["titulo"].'</h2>
                                                                            <p class="home-desc mt-4 f-17">'.$value["texto"].'</p>
                                                                            ';
                                                                        }*/

                                                                        if ($value["categoria"] != 'undefined' )
                                                                        {
                                                                            echo '<h4 class="home-subtitle ">'.$value["categoria"].'</h4>';
                                                                        }
                                                                        if ($value["titulo"] != 'undefined'){
                                                                            echo '<h2 class="home-title my-4 text-break" >'.$value["titulo"].'</h2>' ;
                                                                        }
                                                                        if ($value["texto"] != 'undefined'){
                                                                            echo '<p class="home-desc mt-4 f-17 text-break" >'.$value["texto"].'</p>';
                                                                        }

                                                                        echo '<div class="mt-4">';
                                                                                    /*if(isset($value['boton-1-texto']))
                                                                                    {
                                                                                        echo 'asa '.$value['boton-1-texto'];

                                                                                    }*/
                                                                                if ($value["categoria"] != 'undefined' && $value["titulo"] != 'undefined' && $value["texto"] != 'undefined') {

                                                                                    if (isset($value['url-boton-1']) && $value['url-boton-1'] != "") {

                                                                                        echo '
                                                                                            <a  href="' . $value["url-boton-1"] . '" 
                                                                                                class="pr-3 btn btn-primary btn-slider-item mb-5  ' . $value["boton-1-color"] . '"
                                                                                            >
                                                                                        ';
                                                                                        if (isset($value['boton-1-texto']) and $value['boton-2-texto'] != '') {
                                                                                            echo $value['boton-1-texto'];
                                                                                        } else {
                                                                                            echo "Ver Más";
                                                                                        }
                                                                                        echo ' </a>';
                                                                                    }
                                                                                    if (isset($value['url-boton-2']) && $value['url-boton-2'] != "") {
                                                                                        echo '
                                                                                            <a href="' . $value["url-boton-2"] . '" 
                                                                                            class="pr-3 btn btn-primary btn-slider-item mb-5  ' . $value["boton-2-color"] . '"
                                                                                            >
                                                                                        ';
                                                                                        if (isset($value['boton-2-texto']) and $value['boton-2-texto'] != '') {
                                                                                            echo $value['boton-2-texto'];
                                                                                        } else {
                                                                                            echo "Ver Más";
                                                                                        }
                                                                                        echo '</a>';
                                                                                    }
                                                                                   //boton de relleno cuando el boton1 y boton2 no tienen nada
                                                                                    /*if ((!(isset($value['url-boton-1']) && $value['url-boton-1'] != ""))and (!(isset($value['url-boton-2']) && $value['url-boton-2'] != "")))
                                                                                    {

                                                                                        echo '
                                                                                            <a  href="' . $value["url-boton-1"] . '" 
                                                                                                class="pr-3 btn btn-primary btn-slider-item mb-5  ' . $value["boton-1-color"] . '"
                                                                                            >
                                                                                        ';
                                                                                        if (isset($value['boton-1-texto']) and $value['boton-2-texto'] != '') {
                                                                                            echo $value['boton-1-texto'];
                                                                                        } else {
                                                                                            echo "Ver Más";
                                                                                        }
                                                                                        echo ' </a>';
                                                                                    }*/
                                                                                }
                                echo'
                                                                        
                                                                            </div>
                                                                    </div>
                                                                </div>
            
                                                            <!--<div class="col-lg-4 offset-lg-1">
                                                                <div class="home-image text-lg-right mt-4">
                                                                    <img src="administrador/public/'.$value["foto-delante"].'" class="img-fluid" alt="">
                                                                </div>
                                                            </div>-->
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        
                                    ';
                                if ($value["categoria"] != 'undefined' && $value["titulo"] != 'undefined' && $value["texto"] != 'undefined'){
                                    echo '</div>';
                                }
                                if ($value["categoria"] == 'undefined' && $value["titulo"] == 'undefined' && $value["texto"] == 'undefined'){
                                    echo '</a >';
                                    echo'<!--XAQUI </A>-->';
                                }
                            }


                        }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" >
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="outline: 2px solid #00000060;"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" >
                    <span class="carousel-control-next-icon" aria-hidden="true" style="outline: 2px solid #00000060;" ></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>