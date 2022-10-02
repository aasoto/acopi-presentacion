<?php
    $pagina_web = ControladorPagina::ctrMostrarPagina();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8 my-5">
            <h1 class="mision-title text-center">Historia</h1>
            <p class= "text-justify"><?php echo $pagina_web['historia']; ?></p>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
</div>