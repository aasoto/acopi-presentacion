<?php

$imagen_proyecto = $_POST["imagen_proyecto"];

if ($imagen_proyecto != "") {
	unlink("../vistas/images/proyecto/".$imagen_proyecto);
}
