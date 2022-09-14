<?php

$foto = $_POST["foto"];

if ($foto != "" && $foto != "vistas/images/usuarios/unknown.png") {
	unlink("../".$foto);
}