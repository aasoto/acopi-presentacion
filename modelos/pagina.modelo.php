<?php

require_once "conexion.php";

class ModeloPagina{

	static public function mdlMostrarPagina($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}

    /**Mostrar Articulos con Inner Join**/

    static public function mdlMostrarConInnerJoin($tabla1, $tabla2, $cantidad){
        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, DATE_FORMAT(fecha_noticia, '%d.%m.%Y') AS fecha_noticia FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_categoria = $tabla2.categoria ORDER BY $tabla2.id DESC LIMIT $cantidad");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlMostrarNoticiasDestacadas($tabla, $columna){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $columna = 1");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    /**Consulta General**/

    static public function mdlMostrar($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    /**Contar filas**/

    static public function mdlContar($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();

        $total = $stmt -> rowCount();

        return $total;

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlContarNoticiasAndYear($tabla, $year){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE fecha_noticia LIKE '%$year%'");

        $stmt -> execute();

        $total = $stmt -> rowCount();

        return $total;

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlContarEventos($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where categoria = 4");

        $stmt -> execute();

        $total = $stmt -> rowCount();

        return $total;

        $stmt -> close();

        $stmt = null;
    }

    /**Consultar noticias con paginación**/

    static public function mdlMostrarNoticiasConPaginacion($pestana, $noticias_por_pestana, $tabla1, $tabla2){
        $iniciar = ($pestana-1) * $noticias_por_pestana;

        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, DATE_FORMAT(fecha_noticia, '%d.%m.%Y') AS fecha_noticia FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_categoria = $tabla2.categoria ORDER BY $tabla2.id DESC LIMIT :niniciar, :nnoticias");

        $stmt -> bindParam(':niniciar', $iniciar, PDO::PARAM_INT);

        $stmt -> bindParam(':nnoticias', $noticias_por_pestana, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlMostrarNoticiasConPaginacionAndYear($year, $pestana, $noticias_por_pestana, $tabla1, $tabla2){
        $iniciar = ($pestana-1) * $noticias_por_pestana;

        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, DATE_FORMAT(fecha_noticia, '%d.%m.%Y') AS fecha_noticia FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_categoria = $tabla2.categoria WHERE $tabla2.fecha_noticia LIKE '%$year%'  ORDER BY $tabla2.id = $year DESC LIMIT :niniciar, :nnoticias");

        $stmt -> bindParam(':niniciar', $iniciar, PDO::PARAM_INT);

        $stmt -> bindParam(':nnoticias', $noticias_por_pestana, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlMostrarEventosConPaginacion($pestana, $eventos_por_pestana, $tabla1, $tabla2){
        $iniciar = ($pestana-1) * $eventos_por_pestana;

        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, DATE_FORMAT(fecha_noticia, '%d.%m.%Y') AS fecha_noticia FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_categoria = $tabla2.categoria WHERE $tabla2.categoria = '4' ORDER BY $tabla2.id DESC LIMIT :niniciar, :nnoticias");

        $stmt -> bindParam(':niniciar', $iniciar, PDO::PARAM_INT);

        $stmt -> bindParam(':nnoticias', $eventos_por_pestana, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlConsultaGeneralConID($tabla1, $tabla2, $id_noticia){
        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :noticia_id");

        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, DATE_FORMAT(fecha_noticia, '%d.%m.%Y') AS fecha_noticia FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_categoria = $tabla2.categoria WHERE id = :noticia_id");

        $stmt -> bindParam(':noticia_id', $id_noticia, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlConsultaNoticiaConSlug($tabla1, $tabla2, $slug_noticia){
        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :noticia_id");
        
        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, DATE_FORMAT(fecha_noticia, '%d.%m.%Y') AS fecha_noticia FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_categoria = $tabla2.categoria WHERE $tabla2.ruta_noticia = '$slug_noticia'");

        //$stmt -> bindParam(':noticia_slug', $slug_noticia, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlConsultaProyectoConID($tabla1, $tabla2, $id_proyecto){
        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :noticia_id");

        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_sector = $tabla2.sector_id WHERE id = :proyecto_id");

        $stmt -> bindParam(':proyecto_id', $id_proyecto, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlMostrarEntrevistas($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlMostrarEntrevistasUltimas($tabla){
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC LIMIT 3");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    static public function mdlMostrarProyectos($tabla1, $tabla2){
        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_sector = $tabla2.sector_id");

        $stmt -> execute();

        return $stmt -> fetchAll();

        $stmt -> close();

        $stmt = null;
    }

    /**Ingresar Interesado**/

    static public function mdlEnviarDatosInteresado($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre_interesado, empresa_interesado, email_interesado, telefono_interesado) VALUES(:nombre_interesado, :empresa_interesado, :email_interesado, :telefono_interesado)");

        $stmt -> bindParam(":nombre_interesado", $datos["nombre_interesado"], PDO::PARAM_STR);
        $stmt -> bindParam(":empresa_interesado", $datos["empresa_interesado"], PDO::PARAM_STR);
        $stmt -> bindParam(":email_interesado", $datos["email_interesado"], PDO::PARAM_STR);
        $stmt -> bindParam(":telefono_interesado", $datos["telefono_interesado"], PDO::PARAM_STR);

        if ($stmt -> execute()) {
            # code...
            return "ok";
        }else{
            print_r(Conexion::conectar()->errorInfo());
        }

        $stmt -> close();

        $stmt = null;
    }

}