<?php
/**
   Se llama a la clase ControladorPagina para imprimir la información de la página web 
**/
$pagina_web = ControladorPagina::ctrMostrarPagina();
$noticias = ControladorPagina::ctrMostrarConInnerJoin();
$noticias_destacadas = ControladorPagina::ctrMostrarNoticiasDestacadas();
$proyectos = ControladorPagina::ctrMostrarProyectos();
$videos_entrevistas = ControladorPagina::ctrMostrarEntrevistas();
//$noticias_todas = ControladorPagina::ctrMostrarNoticias();

//echo '<pre class="bg-white">'; print_r($noticias); echo '</pre>';
/**
    En esta parte se colocan las secciones de cabecera de la página web
 **/
include "head.html";
include "navegacion.php";

/**
    Ahora se evalua la condición del menú de navegación.
 **/
if(isset($_GET["pagina"])){
    if(($_GET["pagina"] == "noticias") && (isset($_GET["pestana"]))){
        include "paginas/noticias-todas.php";
    }
    if(($_GET["pagina"] == "noticias_year") && (isset($_GET["year"]) && (isset($_GET["pestana"])))){
        include "paginas/noticias-year.php";
    }
    if(($_GET["pagina"] == "eventos") && (isset($_GET["pestana"]))){
        include "paginas/eventos.php";
    }
    if(($_GET["pagina"] == "contenido_noticia") && (isset($_GET["slug"]))){
        include "paginas/".$_GET["pagina"].".php";
    }
    if(($_GET["pagina"] == "proyecto-informacion") && (isset($_GET["id"]))){
        include "paginas/".$_GET["pagina"].".php";
    }
    if($_GET["pagina"] == "info-directivos"){
         include "paginas/".$_GET["pagina"].".php";
     }
    if($_GET["pagina"] == "mision"){
        include "paginas/".$_GET["pagina"].".php";
    }
    if($_GET["pagina"] == "historia"){
        include "paginas/".$_GET["pagina"].".php";
    }
    if($_GET["pagina"] == "actualidad"){
        include "paginas/".$_GET["pagina"].".php";
    }
    if($_GET["pagina"] == "proyeccion"){
        include "paginas/".$_GET["pagina"].".php";
    }
    if($_GET["pagina"] == "organigrama"){
        include "paginas/".$_GET["pagina"].".php";
    }
    if($_GET["pagina"] == "productos"){
        include "paginas/".$_GET["pagina"]."_completo.php";
    }
    if($_GET["pagina"] == "entrevistas"){
        include "paginas/".$_GET['pagina']."-todas.php";
    }
    if($_GET["pagina"] == "ingreso"){
        include "paginas/".$_GET["pagina"].".php";
    }

}else{
    include "paginas/carrusel.php";
    include "paginas/noticias.php";
    include "paginas/proyectos.php";
    include "paginas/entrevistas.php";
    include "paginas/productos_completo.php";
    include "paginas/aliados.php";
}

/**
    Secciones de pie de página
 **/
include "paginas/footer.php";
include "end-head.html";