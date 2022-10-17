<?php
$pagina_web = ControladorPagina::ctrMostrarPagina();
$estatutos_doc = $pagina_web['servidor'].''.$pagina_web['estatutos_doc'];
$codigo_etica_doc = $pagina_web['servidor'].''.$pagina_web['codigo_etica_doc'];
?>
<div class="container">
  <div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10 my-5">
      <h1 class="mision-title text-center" >Estatutos</h1>
      <?php if ($pagina_web['watch_estatutos_doc']) { ?>
        <iframe src="<?php echo $estatutos_doc; ?>" frameborder="0" style="width: 100%; height: 700px;"></iframe>
      <?php } ?>
      <?php echo $pagina_web['estatutos_text']; ?>
    </div>
    <div class="col-lg-1">
    </div>
  </div>
  <div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10 my-5">
      <h1 class="mision-title text-center" >Código de ética</h1>
      <?php if ($pagina_web['watch_codigo_etica_doc']) { ?>
        <iframe src="<?php echo $codigo_etica_doc; ?>" frameborder="0" style="width: 100%; height: 700px;"></iframe>
      <?php } ?>
      <?php echo $pagina_web['codigo_etica_text']; ?>
    </div>
    <div class="col-lg-1">
    </div>
  </div>
</div>