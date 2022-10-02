<?php
    $pagina_web = ControladorPagina::ctrMostrarPagina();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-2">
        </div>
        <div class="col-lg-8 my-5">
            <h1 class="mision-title text-center" >Quienes somos</h1>
            <p class= "text-justify"><?php echo $pagina_web['quienes_somos']; ?></p>
            <h1 class="mision-title text-center">Misión</h1>
            <p class="text-justify"><?php echo $pagina_web['mision']; ?></p>
            <h1 class="mision-title text-center">Visión</h1>
            <p class="text-justify"><?php echo $pagina_web['vision']; ?></p>
        </div>
        <div class="col-lg-2">
        </div>
    </div>
</div>
