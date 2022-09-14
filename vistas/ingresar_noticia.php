<?php /*  require_once "../modelos/conexion.php";
$conexion = Conexion::conectar();
echo '<pre>'; print_r($conexion); echo '</pre>'; */
require_once "../controladores/formularios.controlador.php";
require_once "../modelos/formularios.modelos.php"; ?>

<div class="d-flex justify-content-center text-center">

    <form class="p-5 bg-light" method="post">

        <div class="form-group">
            <label for="categoria">Categoría:</label>

            <div class="input-group">

                <input type="text" class="form-control" id="categoria" name="registroCategoria">

            </div>
            
        </div>

        <div class="form-group">

            <label for="titulo">Titulo:</label>

            <div class="input-group">

                <input type="text" class="form-control" id="titulo" name="registroTitulo">
            
            </div>
            
        </div>

        <div class="form-group">
            <label for="cuerpo">Cuerpo:</label>

            <div class="input-group">

                <input type="textarea" class="form-control" id="cuerpo" name="registroCuerpo">

            </div>

        </div>

        <?php 

        /*=============================================
        FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO NO ESTÁTICO 
        =============================================*/
        
        // $registro = new ControladorFormularios();
        // $registro -> ctrRegistro();

        /*=============================================
        FORMA EN QUE SE INSTANCIA LA CLASE DE UN MÉTODO ESTÁTICO 
        =============================================*/

        $registro = ControladorFormularios::ctrRegistro();

        if($registro == "ok"){

            echo '<script>

                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href );

                }

            </script>';

            echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
        
        }

        ?>
        
        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

</div>