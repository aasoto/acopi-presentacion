<?php
    $pagina_web = ControladorPagina::ctrMostrarPagina();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 my-5">
            <h1 class="mision-title text-center">Organigrama</h1>
            <img src="<?php echo $pagina_web['servidor']; echo $pagina_web['organigrama']; ?>" alt="">
        </div>
    </div>
</div>