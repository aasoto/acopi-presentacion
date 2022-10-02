<?php
    $pagina_web = ControladorPagina::ctrMostrarPagina();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8 my-5">
            <h1 class="mision-title text-center">Proyección</h1>
            <p class= "text-justify"><?php echo $pagina_web['proyeccion']; ?></p>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
</div>