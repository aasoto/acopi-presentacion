<?php

$boton_1 = $_POST["boton_1"];
$boton_2 = $_POST["boton_2"];
$foto_delante = $_POST["foto_delante"];
$fondo = $_POST["fondo"];

if ($boton_1 != "") {
	unlink("../".$boton_1);
}
if ($boton_2 != "") {
	unlink("../".$boton_2);
}
if ($foto_delante != "") {
	unlink("../".$foto_delante);
}
if ($fondo != "") {
	unlink("../".$fondo);
}

