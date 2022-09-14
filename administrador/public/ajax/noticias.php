<?php
$portada = $_POST["portada"];

if ($portada != "") {
    unlink("../".$portada);
}
