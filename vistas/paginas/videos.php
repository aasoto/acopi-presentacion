<section class="home-slider py-4" id="videos">
    <div class="container-fluid">
        <div class="row">
            <div id="carouselExampleControls-videos" class="videos-carousel  carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    $active = true;
                    //echo '<pre class="bg-white">'; print_r($videos_entrevistas); echo '</pre>';
                    foreach ($videos_entrevistas as $key => $value){
                        if ($active){
                            echo '<div class="carousel-item active">
                                <div class="home-center">
                                    <div class="home-desc-center">
                                        <div class="bg-overlay-color"></div>
                                        <div class="container px-2">
                                            <div class="row vertical-content">

                                                <div class="col-lg-7 ">
                                                    
                                                        <div class="videoWrapper">
                                                            <iframe  src="'.$value["video_entrevista"].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                        </div>
                                                   
                                                </div>

                                                <div class="col-lg-4 offset-lg-1">
                                                    <div class="home-image text-lg-left mt-4">
                                                        <h4 class="home-subtitle">Entrevista</h4>
                                                        <h2 class="home-title mt-4">'.$value["titulo_entrevista"].'</h2>
                                                        <p class="home-desc mt-4 f-17">'.$value["descripcion_entrevista"].'</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            $active = false;
                        }else{
                            echo '<div class="carousel-item">
                                <div class="home-center">
                                    <div class="home-desc-center">
                                        <div class="bg-overlay-color"></div>
                                        <div class="container px-2">
                                            <div class="row vertical-content">

                                                <div class="col-lg-7 ">
                                                    <div class=" videoWrapper" >
                                                        <iframe  src="'.$value["video_entrevista"].'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 offset-lg-1">
                                                    <div class="home-image text-lg-left mt-4">
                                                        <h4 class="home-subtitle">Entrevista</h4>
                                                        <h2 class="home-title mt-4">'.$value["titulo_entrevista"].'</h2>
                                                        <p class="home-desc mt-4 f-17">'.$value["descripcion_entrevista"].'</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            }
                        }
                    ?>

                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls-videos" id="videoPrev" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls-videos" id="videoNext" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
</section>