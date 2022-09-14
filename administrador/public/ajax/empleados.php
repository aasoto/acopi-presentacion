<?php

$foto = $_POST["foto"];
$hoja_de_vida = $_POST["hoja_de_vida"];
$cedula = $_POST["cedula"];

if ($foto != "") {
	unlink("../".$foto);
}
if ($hoja_de_vida != "") {
	unlink("../".$hoja_de_vida);
}
if ($cedula != "") {
	unlink("../".$cedula);
}