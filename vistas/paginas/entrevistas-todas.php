<?php
$entrevistas = ControladorPagina::ctrMostrarEntrevistas();
$pagina_web = ControladorPagina::ctrMostrarPagina();
?>
    <div class="my-5">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h1 class="mision-title text-center">Programa Voz a Voz</h1>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="row">
            <div class="col-lg-12 ">
                <?php $num = 0; ?>
                <div class="d-grid flex-wrap wrap-entrevistas" style="padding-inline: 30px;">
                    <?php foreach ($entrevistas as $key => $value) { ?>
                        <div class="mt-4" style="  margin-right: auto;">

                            <div class="card card-entrevista" style=" margin: auto; ">
                                <iframe  src="<?php echo $value['video_entrevista']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="width:90%; margin: auto;padding-top: 10px"></iframe>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $value['titulo_entrevista']; ?></h5>
                                    <p class="card-text text-justify"><?php echo substr($value['descripcion_entrevista'], 0, 150).'...'; ?></p>
                                </div>
                            </div>

                        </div>
                        <?php

                                if (fmod($num, 4) == 0) { $num=0;
                        ?>



                        <?php }


                        ?>
                    <?php } ?>


                    </div>
                </div> <!--cierra -->
            </div>
        </div>
    </div>