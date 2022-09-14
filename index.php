<?php

require_once "controladores/plantilla.controlador.php";

require_once "controladores/formularios.controlador.php";
require_once "modelos/formularios.modelos.php";

require_once "controladores/pagina.controlador.php";
require_once "modelos/pagina.modelo.php";

$plantilla = new controladorPlantilla();
$plantilla -> ctrTraerPlantilla();
