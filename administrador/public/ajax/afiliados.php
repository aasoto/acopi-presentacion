<?php

$foto = $_POST["foto"];
$cedula = $_POST["cedula"];

if ($foto != "") {
	unlink("../".$foto);
}
if ($cedula != "") {
	unlink("../".$cedula);
}