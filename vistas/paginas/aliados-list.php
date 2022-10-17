<?php
$pagina_web = ControladorPagina::ctrMostrarPagina();
$aliados = json_decode($pagina_web["aliados"], true);
?>
<div class="container">
  <div class="row">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-10 my-5">
      <h1 class="mision-title text-center">Aliados</h1>
      <div class="row">
        <?php foreach ($aliados as $key => $value) { ?>
          <div class="col-md-6">
            <div class="my-2">
              <h3><?php echo $value['nombre'] ?></h3>
              <a href="<?php echo $value['link'] ?>">
                <img src="<?php echo $pagina_web['servidor'] . $value['logo'] ?>" alt="">
              </a>
            </div>
          </div>
          <?php if (fmod($key+1, 2) == 0) {?>
            </div>
            <div class="row">
          <?php } ?>
        <?php } ?>
      </div>
    </div>
    <div class="col-lg-1">
    </div>
  </div>
</div>