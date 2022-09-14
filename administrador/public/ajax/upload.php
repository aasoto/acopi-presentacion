<?php
if(isset($_FILES["file"]["name"])){
	if (!$_FILES["file"]["error"]) {
		$titulo = md5(rand(1000, 2000));
		$extension = explode('.', $_FILES["file"]["name"]);
		$archivo = $titulo.'.'.$extension[1];
		$destino = '../vistas/images/temp/'.$archivo;
		$origen = $_FILES["file"]["tmp_name"];
		move_uploaded_file($origen, $destino);
		echo $_POST["ruta"]."/vistas/images/temp/".$archivo;
	}else{
		echo $mensaje = "El archivo temporal no se pudo crear: ".$_FILES['file']['error'];
	}
}