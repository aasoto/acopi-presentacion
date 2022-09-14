<?php

$carta_bienvenida = $_POST["carta_bienvenida"];
$acta_compromiso = $_POST["acta_compromiso"];
$estudio_afiliacion = $_POST["estudio_afiliacion"];
$rut = $_POST["rut"];
$camara_comercio = $_POST["camara_comercio"];
$fechas_birthday = $_POST["fechas_birthday"];

if ($carta_bienvenida != "") {
	unlink("../".$carta_bienvenida);
}
if ($acta_compromiso != "") {
	unlink("../".$acta_compromiso);
}
if ($estudio_afiliacion != "") {
	unlink("../".$estudio_afiliacion);
}
if ($rut != "") {
	unlink("../".$rut);
}
if ($camara_comercio != "") {
	unlink("../".$camara_comercio);
}
if ($fechas_birthday != "") {
	unlink("../".$fechas_birthday);
}