<br>
<br>
<div class="d-flex justify-content-center text-center">

    <form class="p-5 bg-light" method="post">

        <div class="form-group">

            <label for="email">Correo electrónico:</label>

            <div class="input-group">

                <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="mdi mdi-account"></i>
					</span>
                </div>

                <input type="email" class="form-control" name="ingresoEmail">

            </div>

        </div>

        <div class="form-group">
            <label for="pwd">Contraseña:</label>

            <div class="input-group">

               <div class="input-group-prepend">
					<span class="input-group-text">
						<i class="mdi mdi-lock"></i>
					</span>
                </div>

                <input type="password" class="form-control" name="ingresoPassword">

            </div>

        </div>

        <?php

        /*$ingreso = new ControladorFormularios();
        $ingreso -> ctrIngreso();*/

        ?>

        <button type="submit" class=" btn btn-acopi-main">Ingresar</button>

    </form>

</div>
<br>
<br>