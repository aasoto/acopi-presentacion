<!-- START FOOTER -->
<footer class="section bg-footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3">
                <div class="footer-content">
                    <h3 class="footer-title">Afiliate</h3>
                    <br>
                </div>
                <form method="post" enctype="multipart/form-data">
                    
                    <div class="custom-form mt-4">
                        <input type="text" class="form-control" id="nombre_interesado" name="nombre_interesado" value="" placeholder="Nombre completo" required><br>
                        <input type="text" class="form-control" id="empresa_interesado" name="empresa_interesado" value="" placeholder="Empresa" required><br>
                        <input type="email" class="form-control" id="email_interesado" name="email_interesado" value="" placeholder="E-mail" required><br>
                        <input type="number" class="form-control" id="telefono_interesado" name="telefono_interesado" value="" placeholder="Telefono" required><br>
                        <!--<input type="file" name="fotoInteresado" class="d-none" id="fotoInteresado">-->
                        <!--<label for="fotoInteresado">
                            <img src="images/subirFoto.png" class="img-fluid mt-md-3 mt-xl-2 prevFotoInteresado">
                        </label>-->
                        <div class="justify-content-center align-items-center">
                            <input type="submit" class="submitBnt btn btn-custom" value="Enviar">
                        </div>
                    </div>
                    
                    <!--<input type="reset" value="Borrar">-->
                    <?php 
                        $enviarDatos = ControladorPagina::ctrEnviarDatosInteresado();

                        /**Se evalua la respuesta del controlador**/
                       if($enviarDatos == "ok"){
                            echo '<script>
                                swal({
                                    title: "¡Bien Hecho!",
                                    text: "Te estaremos contactando en los proximos días.",
                                    icon: "success"
                                });
                            </script>';
                        }
                        if($enviarDatos == "error preg"){
                            echo '<script>
                                swal({
                                    title: "¡Error!",
                                    text: "Está intentando ingresar caracteres no validos.",
                                    icon: "error"
                                });
                            </script>';
                        }
                        if($enviarDatos == "error-formato"){
                            echo '<script>
                                swal({
                                    title: "¡Error!",
                                    text: "Solo se pueden subir imagenes en formato JPG o PNG.",
                                    icon: "error"
                                });
                            </script>';
                        }
                     ?>
              </form>
            </div>
            <div class="col-lg-3">
                <div class="footer-content">
                    <h3 class="footer-title">Redes Sociales</h3>
                </div>
                <div class="mt-5">
                    <p class="footer-info">Aquí puedes contactarnos en la plataformas digistales y seguir más de cerca nuestro trabajo</p>

                    <div class="mt-4">
                        <ul class="list-inline footer-social mb-0">
                            <?php 
                                $redes_sociales = json_decode($pagina_web["redes_sociales"], true);
                                //echo '<pre>'; print_r($pagina_web["aliados"]); echo '</pre>';
                                foreach ($redes_sociales as $key => $value) {
                                    echo '<li class="list-inline-item">
                                            <a href="'.$value["link"].'" class="rounded">
                                                <i class="'.$value["logo"].'"></i>
                                            </a>
                                        </li>';
                                }
                            ?>

                        </ul>
                    </div>

                </div>
            </div>

            

            <div class="col-lg-3">
                <div class="footer-content">
                    <h3 class="footer-title">Features</h3>
                </div>

                <ul class="list-unstyled footer-link mt-5">
                    <li><a href=""><i class="mdi mdi-chevron-right mr-2"></i>Acerca de nosotros</a></li>
                    <li><a href=""><i class="mdi mdi-chevron-right mr-2"></i>Noticias</a></li>
                    <li><a href=""><i class="mdi mdi-chevron-right mr-2"></i>Productos y servicios</a></li>
                    <li><a href=""><i class="mdi mdi-chevron-right mr-2"></i>Entrevistas</a></li>
                    <li><a href=""><i class="mdi mdi-chevron-right mr-2"></i>Clientes</a></li>
                    <li><a href=""><i class="mdi mdi-chevron-right mr-2"></i>Sign Up</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <div class="footer-content">
                    <h3 class="footer-title">Contactanos</h3>
                </div>
                <div class="mt-5">
                    <?php

                    $contacto = json_decode($pagina_web ["contacto"], true);
                    echo '<p class="footer-info"><i class="mdi mdi-home mr-2"></i>'.$contacto[0].'</p>
                    <p class="footer-info"><i class="mdi mdi-phone mr-2"></i>'.$contacto[1].'</p>
                    <p class="footer-info"><i class="mdi mdi-cellphone mr-2"></i>'.$contacto[2].'</p>
                    <p class="footer-info"><i class="mdi mdi-email mr-2"></i>'.$contacto[3].'</p>';

                    ?>
                </div>

            </div>

        </div>
        <div class="text-center mt-5">
            <p class="footer-alt mb-0 f-15"><?php echo date("Y"); ?> © ACOPI - Cesar. Todos los derechos reservados</p>
        </div>
    </div>
</footer>
<!-- END FOOTER -->