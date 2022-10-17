<?php
$pagina_web = ControladorPagina::ctrMostrarPagina();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-10 my-5">
          <?php echo $pagina_web['gremio_directivos']; ?>
        </div>
        <div class="col-lg-1">
        </div>
    </div>
</div>