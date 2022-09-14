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

    static public function mdlConsultaGeneralConID($tabla1, $tabla2, $id_noticia){
        //$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :noticia_id");

        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, DATE_FORMAT(fecha_noticia, '%d.%m.%Y') AS fecha_noticia FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_categoria = $tabla2.categoria WHERE id = :noticia_id");

        $stmt -> bindParam(':noticia_id', $id_noticia, PDO::PARAM_INT);

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