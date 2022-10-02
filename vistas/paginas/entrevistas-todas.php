<?php
$entrevistas = ControladorPagina::ctrMostrarEntrevistas();
$pagina_web = ControladorPagina::ctrMostrarPagina();
?>
    <div class="my-5">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h1 class="mision-title text-center">Entrevistas</h1>
            </div>
            <div class="col-lg-2"></div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <?php $num = 1; ?>
                <div class="row">
                <?php foreach ($entrevistas as $key => $value) { ?>
                    <div class="col-sm my-5">
                        <div class="card" style="width: 18rem; height: 400px;">
                            <iframe width="286" height="180" src="<?php echo $value['video_entrevista']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $value['titulo_entrevista']; ?></h5>
                                <p class="card-text text-justify"><?php echo substr($value['descripcion_entrevista'], 0, 150).'...'; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php if (fmod($num, 4) == 0) { ?>
                    </div>
                    <div class="row">
                    <?php } 
                    $num++;
                    ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>