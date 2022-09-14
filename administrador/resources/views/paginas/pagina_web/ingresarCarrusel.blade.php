@extends('plantilla')

@section('content')
@auth
@if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos') || (Auth::user()->rol == 'Asistente de dirección'))
<div class="content-wrapper" style="min-height: 243px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Gestionar Carrusel</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Página web</a></li>
						<li class="breadcrumb-item active">Carrusel</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
		<section class="content">
			@foreach ($paginaweb as $element) @endforeach
			<form action="{{url('/')}}/pagina_web/ingresarCarrusel/{{$element->id}}" method="post" enctype="multipart/form-data">
				@method('PUT')
				@csrf
				<input type="hidden" name="listaCarrusel" id="listaCarrusel" value="{{$element->carrusel}}">
          		<input type="hidden" name="eliminar" id="eliminar" value="no">
          		<input type="hidden" name="imagenExterna" id="imagenExterna" value="no">
                <input type="hidden" name="escenario" id="escenario" value="sistema">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">


							<!--=========================================
							=            Actualizar Carrusel            =
							==========================================-->

							<!--========================================================================
				            =            Sección amigable del carrusel de evento y noticias            =
				            =========================================================================-->

		            		<div class="editarCarrusel" id="editarCarrusel" name="editarCarrusel" style="visibility: '';">
		            			<div class="card card-primary" id="tarjetaEditarCarrusel">
				            	<div class="card-header">
									<h3 class="card-title">Editar Carrusel</h3>

									<div class="card-tools">
										<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
											<i class="fas fa-minus"></i>
										</button>
									</div>
								</div>
				            		<div class="card-body">
				            			<div class="col-md-12 text-center">
                                            <button type="button" class="btn btn-success col-md-6 botonAgregarItemCarrusel" id="botonAgregarItemCarrusel">
                                                <i class="fas fa-image"></i> Agregar nuevo item
                                            </button>
                                            <a href="{{ url('pagina_web/ordenarCarrusel') }}">
                                                <button type="button" class="btn btn-default col-md-5">
                                                    <i class="fas fa-sort-numeric-down"></i> Ordenar lista carrusel
                                                </button>
                                            </a>
						                </div>
						                <br>
				            			<div class="listadoCarrusel">
					            			<div id="carouselExampleIndicators" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
					            				<div class="carousel-indicators">
					            					@php
					            					$contador = json_decode($element->carrusel, true);
					            					$active = true;
					            					$indice = 0;
					            					foreach ($contador as $key => $value){
						            					if($active){
						            						echo '
						            						<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$indice.'" class="active" aria-current="true" aria-label="Slide '.$value["titulo"].'"></button>';
						            						$active = false;
							            				}else{
							            					echo '
							            					<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$indice.'" aria-label="Slide '.$value["titulo"].'"></button>';
							            				}
					            						$indice++;
					            					}
					            					@endphp
					            				</div>
					            				<div class="carousel-inner">
					            				@php
					            					$servidor = $element->servidor;
					            					$carrousel = json_decode($element->carrusel, true);
					            					$indice = 0;
					            					$active = true;
					            					foreach ($carrousel as $key => $value){
					            						if ($active) {
					            							echo '
										            		<div class="carousel-item active">
										            			<div class="card" style="background-color:#DCDCDC" id="carruselActivo">
										            				<div class="row">
										            					<div class="col-md-1">
										            					</div>

										            					<div class="col-md-5 my-2">
										            						<div class="form-group">
										            							<label for="labelCategoria">Categoria</label>
										            							<select class="form-control select2" name="categoria-'.$indice.'" id="categoria-'.$indice.'" style="width: 100%;" required>
										            								<option selected="selected">'.$value["categoria"].'</option>
										            								<option>Noticias</option>
										            								<option>Eventos</option>
										            								<option>Otros</option>
										            							</select>
										            						</div>
										            						<div class="form-group">
										            							<label for="exampleInputEmail1">Titulo</label>
										            							<input type="text" class="form-control" name="titulo-'.$indice.'" id="titulo-'.$indice.'" value="'.$value["titulo"].'" required>
										            						</div>
										            						<div class="form-group">
										            							<label for="exampleInputPassword1">Texto</label>
										            							<textarea class="form-control" rows="8" name="texto-'.$indice.'" id="texto-'.$indice.'" required>'.$value["texto"].'</textarea>
										            						</div>
										            					</div>

										            					<div class="col-md-5">
										            						<div class="form-group my-2 text-center">
										            							<label for="exampleInputPassword1">Botón número 1</label><br>
										            							<input type="hidden" name="boton-1-color-'.$indice.'" id="boton-1-color-'.$indice.'" value="'.$value["boton-1-color"].'">
																					<div class="input-group mb-3">
													                  <div class="input-group-prepend">
													                    <button type="button" class="btn btn-default dropdown-toggle '.$value["boton-1-color"].'" data-toggle="dropdown" id="boton-1-muestra-'.$indice.'" indice="'.$indice.'" onclick="obtenerIndice('.$indice.')">
													                      Color
													                    </button>
													                    <div class="dropdown-menu justify-content-center">
															                  <ul class="fc-color-picker" id="color-chooser">
																	                <li><a class="text-purple" href="#" id="boton-1-text-purple-'.$indice.'"><i id="boton-1-purple-icono-'.$indice.'" title="Purpura" class="fas fa-square"></i></a></li>
															                    <li><a class="text-indigo" href="#" id="boton-1-text-indigo-'.$indice.'"><i id="boton-1-indigo-icono-'.$indice.'" title="Indigo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-navy" href="#" id="boton-1-text-navy-'.$indice.'"><i id="boton-1-navy-icono-'.$indice.'" title="Azul marino" class="fas fa-square"></i></a></li>
															                    <li><a class="text-primary" href="#" id="boton-1-text-primary-'.$indice.'"><i id="boton-1-primary-icono-'.$indice.'" title="Azul primario" class="fas fa-square"></i></a></li>
															                    <li><a class="text-lightblue" href="#" id="boton-1-text-lightblue-'.$indice.'"><i id="boton-1-lightblue-icono-'.$indice.'" title="Azul cielo" class="fas fa-square"></i></a></li>
															                    <br>
															                    <li><a class="text-info" href="#" id="boton-1-text-info-'.$indice.'"><i id="boton-1-info-icono-'.$indice.'" title="Azul informativo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-teal" href="#" id="boton-1-text-teal-'.$indice.'"><i id="boton-1-teal-icono-'.$indice.'" title="Verde menta" class="fas fa-square"></i></a></li>
															                    <li><a class="text-olive" href="#" id="boton-1-text-olive-'.$indice.'"><i id="boton-1-olive-icono-'.$indice.'" title="Verde oliva" class="fas fa-square"></i></a></li>
															                    <li><a class="text-success" href="#" id="boton-1-text-success-'.$indice.'"><i id="boton-1-success-icono-'.$indice.'" title="Verde" class="fas fa-square"></i></a></li>
															                    <li><a class="text-lime" href="#" id="boton-1-text-lime-'.$indice.'"><i id="boton-1-lime-icono-'.$indice.'" title="Verde lima" class="fas fa-square"></i></a></li>
															                    <br>
															                    <li><a class="text-warning" href="#" id="boton-1-text-warning-'.$indice.'"><i id="boton-1-warning-icono-'.$indice.'" title="Amarillo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-orange" href="#" id="boton-1-text-orange-'.$indice.'"><i id="boton-1-orange-icono-'.$indice.'" title="Naranja" class="fas fa-square"></i></a></li>
															                    <li><a class="text-danger" href="#" id="boton-1-text-danger-'.$indice.'"><i id="boton-1-danger-icono-'.$indice.'" title="Rojo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-maroon" href="#" id="boton-1-text-maroon-'.$indice.'"><i id="boton-1-maroon-icono-'.$indice.'" title="Rojo granate" class="fas fa-square"></i></a></li>
															                    <li><a class="text-pink" href="#" id="boton-1-text-pink-'.$indice.'"><i id="boton-1-pink-icono-'.$indice.'" title="Rosa" class="fas fa-square"></i></a></li>
															                    <br>
															                    <li><a class="text-fuchsia" href="#" id="boton-1-text-fuchsia-'.$indice.'"><i id="boton-1-fuchsia-icono-'.$indice.'" title="Fucsia" class="fas fa-square"></i></a></li>
															                    <li><a class="text-light" href="#" id="boton-1-text-light-'.$indice.'"><i id="boton-1-light-icono-'.$indice.'" title="Blanco" class="fas fa-square"></i></a></li>
															                    <li><a class="text-secondary" href="#" id="boton-1-text-secondary-'.$indice.'"><i id="boton-1-secondary-icono-'.$indice.'" title="Secundario" class="fas fa-square"></i></a></li>
															                    <li><a class="text-gray-dark" href="#" id="boton-1-text-gray-dark-'.$indice.'"><i id="boton-1-gray-dark-icono-'.$indice.'" title="Gris oscuro" class="fas fa-square"></i></a></li>
															                    <li><a class="text-black" href="#" id="boton-1-text-black-'.$indice.'"><i id="boton-1-black-icono-'.$indice.'" title="Negro" class="fas fa-square"></i></a></li>
																	              </ul>
															                </div>
															              </div>
															              <!-- /btn-group -->
															              <input type="text" class="form-control" name="boton-1-texto-'.$indice.'" id="boton-1-texto-'.$indice.'" placeholder="Texto del botón" value="'.$value["boton-1-texto"].'">
															            </div>
										            							<div class="form-group">
										            								<input type="text" class="form-control" name="url-boton-1-'.$indice.'" id="url-boton-1-'.$indice.'" value="'.$value["url-boton-1"].'" placeholder="URL Botón número 1">
																							</div>

					            											</div>
												            				<div class="form-group my-2 text-center">
												            					<label for="exampleInputPassword1">Botón número 2</label><br>
												            					<input type="hidden" name="boton-2-color-'.$indice.'" id="boton-2-color-'.$indice.'" value="'.$value["boton-2-color"].'">
																					<div class="input-group mb-3">
													                  <div class="input-group-prepend">
													                    <button type="button" class="btn btn-default dropdown-toggle '.$value["boton-2-color"].'" data-toggle="dropdown" id="boton-2-muestra-'.$indice.'" indice="'.$indice.'" onclick="obtenerIndice('.$indice.')">
													                      Color
													                    </button>
													                    <div class="dropdown-menu justify-content-center">
															                  <ul class="fc-color-picker" id="color-chooser">
																	                <li><a class="text-purple" href="#" id="boton-2-text-purple-'.$indice.'"><i id="boton-2-purple-icono-'.$indice.'" title="Purpura" class="fas fa-square"></i></a></li>
															                    <li><a class="text-indigo" href="#" id="boton-2-text-indigo-'.$indice.'"><i id="boton-2-indigo-icono-'.$indice.'" title="Indigo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-navy" href="#" id="boton-2-text-navy-'.$indice.'"><i id="boton-2-navy-icono-'.$indice.'" title="Azul marino" class="fas fa-square"></i></a></li>
															                    <li><a class="text-primary" href="#" id="boton-2-text-primary-'.$indice.'"><i id="boton-2-primary-icono-'.$indice.'" title="Azul primario" class="fas fa-square"></i></a></li>
															                    <li><a class="text-lightblue" href="#" id="boton-2-text-lightblue-'.$indice.'"><i id="boton-2-lightblue-icono-'.$indice.'" title="Azul cielo" class="fas fa-square"></i></a></li>
															                    <br>
															                    <li><a class="text-info" href="#" id="boton-2-text-info-'.$indice.'"><i id="boton-2-info-icono-'.$indice.'" title="Azul informativo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-teal" href="#" id="boton-2-text-teal-'.$indice.'"><i id="boton-2-teal-icono-'.$indice.'" title="Verde menta" class="fas fa-square"></i></a></li>
															                    <li><a class="text-olive" href="#" id="boton-2-text-olive-'.$indice.'"><i id="boton-2-olive-icono-'.$indice.'" title="Verde oliva" class="fas fa-square"></i></a></li>
															                    <li><a class="text-success" href="#" id="boton-2-text-success-'.$indice.'"><i id="boton-2-success-icono-'.$indice.'" title="Verde" class="fas fa-square"></i></a></li>
															                    <li><a class="text-lime" href="#" id="boton-2-text-lime-'.$indice.'"><i id="boton-2-lime-icono-'.$indice.'" title="Verde lima" class="fas fa-square"></i></a></li>
															                    <br>
															                    <li><a class="text-warning" href="#" id="boton-2-text-warning-'.$indice.'"><i id="boton-2-warning-icono-'.$indice.'" title="Amarillo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-orange" href="#" id="boton-2-text-orange-'.$indice.'"><i id="boton-2-orange-icono-'.$indice.'" title="Naranja" class="fas fa-square"></i></a></li>
															                    <li><a class="text-danger" href="#" id="boton-2-text-danger-'.$indice.'"><i id="boton-2-danger-icono-'.$indice.'" title="Rojo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-maroon" href="#" id="boton-2-text-maroon-'.$indice.'"><i id="boton-2-maroon-icono-'.$indice.'" title="Rojo granate" class="fas fa-square"></i></a></li>
															                    <li><a class="text-pink" href="#" id="boton-2-text-pink-'.$indice.'"><i id="boton-2-pink-icono-'.$indice.'" title="Rosa" class="fas fa-square"></i></a></li>
															                    <br>
															                    <li><a class="text-fuchsia" href="#" id="boton-2-text-fuchsia-'.$indice.'"><i id="boton-2-fuchsia-icono-'.$indice.'" title="Fucsia" class="fas fa-square"></i></a></li>
															                    <li><a class="text-light" href="#" id="boton-2-text-light-'.$indice.'"><i id="boton-2-light-icono-'.$indice.'" title="Blanco" class="fas fa-square"></i></a></li>
															                    <li><a class="text-secondary" href="#" id="boton-2-text-secondary-'.$indice.'"><i id="boton-2-secondary-icono-'.$indice.'" title="Secundario" class="fas fa-square"></i></a></li>
															                    <li><a class="text-gray-dark" href="#" id="boton-2-text-gray-dark-'.$indice.'"><i id="boton-2-gray-dark-icono-'.$indice.'" title="Gris oscuro" class="fas fa-square"></i></a></li>
															                    <li><a class="text-black" href="#" id="boton-2-text-black-'.$indice.'"><i id="boton-2-black-icono-'.$indice.'" title="Negro" class="fas fa-square"></i></a></li>
																	              </ul>
															                </div>
															              </div>
															              <!-- /btn-group -->
															              <input type="text" class="form-control" name="boton-2-texto-'.$indice.'" id="boton-2-texto-'.$indice.'" placeholder="Texto del botón" value="'.$value["boton-2-texto"].'">
															            </div>
												            					<div class="form-group">
																					<input type="text" class="form-control" name="url-boton-2-'.$indice.'" id="url-boton-2-'.$indice.'" value="'.$value["url-boton-2"].'" placeholder="URL Botón número 2">
																				</div>

												            				</div>
												            			</div>

												            			<div class="col-md-1">
												            			</div>
												            		</div>
												            		<div class="row">
												            			<div class="col-md-1">
												            			</div>
												            			<div class="col-md-5">
												            				<div class="form-group my-2 text-center">
												            					<label for="exampleInputPassword1">Imagen delantera</label>
												            					<br>
												            					<div class="btn btn-default btn-file mb-3">
												            						<i class="fas fa-paperclip"></i> Ad. Img. delantera
												            						<input type="file" name="foto-delante-'.$indice.'" id="foto-delante-'.$indice.'" value="'.$value["foto-delante"].'">
												            						<input type="hidden" name="foto-delante-actual-'.$indice.'" value="'.$value["foto-delante"].'">
												            					</div>
												            					<br>';
												            					if ($value["foto-delante"] == "") {
												            						echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_foto-delante-'.$indice.'" width="100px" height="72px">';
												            					}else{
												            						echo '<img src="'.$servidor.''.$value["foto-delante"].'" class="img-fluid py-2 bg-secondary previsualizarImg_foto-delante-'.$indice.'" width="100px" height="100px">';
												            					}
												            					echo '<p class="help-block small mt-3">Dimensiones: 500px * 500px | Peso Max. 2MB | Formato: JPG o PNG</p>
												            				</div>
												            			</div>
													            		<div class="col-md-5">
													            			<div class="form-group my-2 text-center">
													            				<label for="exampleInputPassword1">Imagen de fondo (background)</label><br>
												            					<div class="btn btn-default btn-file mb-3">
												            						<i class="fas fa-paperclip"></i> Ad. Img. de fondo
												            						<input type="file" name="fondo-'.$indice.'" id="fondo-'.$indice.'" value="'.$value["fondo"].'">
												            						<input type="hidden" name="fondo-actual-'.$indice.'" value="'.$value["fondo"].'" required>
												            					</div>
												            					<br>';
												            					if ($value["fondo"] == "") {
												            						echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_fondo-'.$indice.'" width="100px" height="72px">';
												            					}else{
												            						echo '<img src="'.$servidor.''.$value["fondo"].'" class="img-fluid py-2 bg-secondary previsualizarImg_fondo-'.$indice.'" width="200px" height="133px">';
												            					}
												            					echo '<p class="help-block small mt-3">Dimensiones: 2000px * 1333px | Peso Max. 2MB | Formato: JPG o PNG</p>

													            			</div>
													            		</div>
													            		<div class="col-md-1">
													            		</div>
													            	</div>
													            	<div class="row">
													            		<div class="col-md-1"></div>
													            		<div class="col-md-10">
													            			<div class="form-group text-center">
												                      			<br>
												                      			<button type="submit" class="btn btn-primary col-md-5 actualizarCarrusel" name="guardar" id="guardar">
																					<i class="fas fa-check"></i> Guardar cambios
																				</button>
												                      			<button type="button" class="btn btn-danger col-md-5 eliminarCarrusel" categoria="'.$value["categoria"].'" titulo="'.$value["titulo"].'" texto="'.$value["texto"].'" foto-delante="'.$value["foto-delante"].'" fondo="'.$value["fondo"].'">
														                  			<i class="fas fa-trash"></i> Eliminar este item del carrusel
														                		</button>
												                      		</div>
													            		</div>
													            		<div class="col-md-1"></div>

													            	</div>
													            	<br>
												            	</div>
												            </div>
												            ';

												            $active = false;
												            $indice++;
												        }else{
												           	echo '
												           		<div class="carousel-item">
												            		<div class="card" style="background-color:#DCDCDC" id="carruselSegundario">
												            			<div class="row">
												            				<div class="col-md-1">
												            				</div>

												            				<div class="col-md-5 my-2">
												            					<div class="form-group">
												            						<label for="labelCategoria">Categoria</label>
												            						<select class="form-control select2" name="categoria-'.$indice.'" id="categoria-'.$indice.'" style="width: 100%;" required>
												            							<option selected="selected">'.$value["categoria"].'</option>
												            							<option>Noticias</option>
												            							<option>Eventos</option>
												            							<option>Otros</option>
												            						</select>
												            					</div>
												            					<div class="form-group">
												            						<label for="exampleInputEmail1">Titulo</label>
												            						<input type="text" class="form-control" name="titulo-'.$indice.'" id="titulo-'.$indice.'" value="'.$value["titulo"].'" required>
												            					</div>
												            					<div class="form-group">
												            						<label for="exampleInputPassword1">Texto</label>
												            						<textarea class="form-control" rows="8" name="texto-'.$indice.'" id="texto-'.$indice.'" required>'.$value["texto"].'</textarea>
												            					</div>
												            				</div>

												            				<div class="col-md-5">
												            					<div class="form-group my-2 text-center">
												            						<label for="exampleInputPassword1">Botón número 1</label><br>
												            						<input type="hidden" name="boton-1-color-'.$indice.'" id="boton-1-color-'.$indice.'" value="'.$value["boton-1-color"].'">
																					<div class="input-group mb-3">
													                  <div class="input-group-prepend">
													                    <button type="button" class="btn btn-default dropdown-toggle '.$value["boton-1-color"].'" data-toggle="dropdown" id="boton-1-muestra-'.$indice.'" indice="'.$indice.'" onclick="obtenerIndice('.$indice.')">
													                      Color
													                    </button>
													                    <div class="dropdown-menu justify-content-center">
															                  <ul class="fc-color-picker" id="color-chooser">
																	                <li><a class="text-purple" href="#" id="boton-1-text-purple-'.$indice.'"><i id="boton-1-purple-icono-'.$indice.'" title="Purpura" class="fas fa-square"></i></a></li>
															                    <li><a class="text-indigo" href="#" id="boton-1-text-indigo-'.$indice.'"><i id="boton-1-indigo-icono-'.$indice.'" title="Indigo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-navy" href="#" id="boton-1-text-navy-'.$indice.'"><i id="boton-1-navy-icono-'.$indice.'" title="Azul marino" class="fas fa-square"></i></a></li>
															                    <li><a class="text-primary" href="#" id="boton-1-text-primary-'.$indice.'"><i id="boton-1-primary-icono-'.$indice.'" title="Azul primario" class="fas fa-square"></i></a></li>
															                    <li><a class="text-lightblue" href="#" id="boton-1-text-lightblue-'.$indice.'"><i id="boton-1-lightblue-icono-'.$indice.'" title="Azul cielo" class="fas fa-square"></i></a></li>
															                    <br>
															                    <li><a class="text-info" href="#" id="boton-1-text-info-'.$indice.'"><i id="boton-1-info-icono-'.$indice.'" title="Azul informativo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-teal" href="#" id="boton-1-text-teal-'.$indice.'"><i id="boton-1-teal-icono-'.$indice.'" title="Verde menta" class="fas fa-square"></i></a></li>
															                    <li><a class="text-olive" href="#" id="boton-1-text-olive-'.$indice.'"><i id="boton-1-olive-icono-'.$indice.'" title="Verde oliva" class="fas fa-square"></i></a></li>
															                    <li><a class="text-success" href="#" id="boton-1-text-success-'.$indice.'"><i id="boton-1-success-icono-'.$indice.'" title="Verde" class="fas fa-square"></i></a></li>
															                    <li><a class="text-lime" href="#" id="boton-1-text-lime-'.$indice.'"><i id="boton-1-lime-icono-'.$indice.'" title="Verde lima" class="fas fa-square"></i></a></li>
															                    <br>
															                    <li><a class="text-warning" href="#" id="boton-1-text-warning-'.$indice.'"><i id="boton-1-warning-icono-'.$indice.'" title="Amarillo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-orange" href="#" id="boton-1-text-orange-'.$indice.'"><i id="boton-1-orange-icono-'.$indice.'" title="Naranja" class="fas fa-square"></i></a></li>
															                    <li><a class="text-danger" href="#" id="boton-1-text-danger-'.$indice.'"><i id="boton-1-danger-icono-'.$indice.'" title="Rojo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-maroon" href="#" id="boton-1-text-maroon-'.$indice.'"><i id="boton-1-maroon-icono-'.$indice.'" title="Rojo granate" class="fas fa-square"></i></a></li>
															                    <li><a class="text-pink" href="#" id="boton-1-text-pink-'.$indice.'"><i id="boton-1-pink-icono-'.$indice.'" title="Rosa" class="fas fa-square"></i></a></li>
															                    <br>
															                    <li><a class="text-fuchsia" href="#" id="boton-1-text-fuchsia-'.$indice.'"><i id="boton-1-fuchsia-icono-'.$indice.'" title="Fucsia" class="fas fa-square"></i></a></li>
															                    <li><a class="text-light" href="#" id="boton-1-text-light-'.$indice.'"><i id="boton-1-light-icono-'.$indice.'" title="Blanco" class="fas fa-square"></i></a></li>
															                    <li><a class="text-secondary" href="#" id="boton-1-text-secondary-'.$indice.'"><i id="boton-1-secondary-icono-'.$indice.'" title="Secundario" class="fas fa-square"></i></a></li>
															                    <li><a class="text-gray-dark" href="#" id="boton-1-text-gray-dark-'.$indice.'"><i id="boton-1-gray-dark-icono-'.$indice.'" title="Gris oscuro" class="fas fa-square"></i></a></li>
															                    <li><a class="text-black" href="#" id="boton-1-text-black-'.$indice.'"><i id="boton-1-black-icono-'.$indice.'" title="Negro" class="fas fa-square"></i></a></li>
																	              </ul>
															                </div>
															              </div>
															              <!-- /btn-group -->
															              <input type="text" class="form-control" name="boton-1-texto-'.$indice.'" id="boton-1-texto-'.$indice.'" placeholder="Texto del botón" value="'.$value["boton-1-texto"].'">
															            </div>
												            						<div class="form-group">
																						<input type="text" class="form-control" name="url-boton-1-'.$indice.'" id="url-boton-1-'.$indice.'" value="'.$value["url-boton-1"].'" placeholder="URL Botón número 1">
																					</div>
												            					</div>
												            					<div class="form-group my-2 text-center">
												            						<label for="exampleInputPassword1">Botón número 2</label><br>
												            						<input type="hidden" name="boton-2-color-'.$indice.'" id="boton-2-color-'.$indice.'" value="'.$value["boton-2-color"].'">
																					<div class="input-group mb-3">
													                  <div class="input-group-prepend">
													                    <button type="button" class="btn btn-default dropdown-toggle '.$value["boton-2-color"].'" data-toggle="dropdown" id="boton-2-muestra-'.$indice.'" indice="'.$indice.'" onclick="obtenerIndice('.$indice.')">
													                      Color
													                    </button>
													                    <div class="dropdown-menu justify-content-center">
															                  <ul class="fc-color-picker" id="color-chooser">
																	                <li><a class="text-purple" href="#" id="boton-2-text-purple-'.$indice.'"><i id="boton-2-purple-icono-'.$indice.'" title="Purpura" class="fas fa-square"></i></a></li>
															                    <li><a class="text-indigo" href="#" id="boton-2-text-indigo-'.$indice.'"><i id="boton-2-indigo-icono-'.$indice.'" title="Indigo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-navy" href="#" id="boton-2-text-navy-'.$indice.'"><i id="boton-2-navy-icono-'.$indice.'" title="Azul marino" class="fas fa-square"></i></a></li>
															                    <li><a class="text-primary" href="#" id="boton-2-text-primary-'.$indice.'"><i id="boton-2-primary-icono-'.$indice.'" title="Azul primario" class="fas fa-square"></i></a></li>
															                    <li><a class="text-lightblue" href="#" id="boton-2-text-lightblue-'.$indice.'"><i id="boton-2-lightblue-icono-'.$indice.'" title="Azul cielo" class="fas fa-square"></i></a></li>
															                    <br>
															                    <li><a class="text-info" href="#" id="boton-2-text-info-'.$indice.'"><i id="boton-2-info-icono-'.$indice.'" title="Azul informativo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-teal" href="#" id="boton-2-text-teal-'.$indice.'"><i id="boton-2-teal-icono-'.$indice.'" title="Verde menta" class="fas fa-square"></i></a></li>
															                    <li><a class="text-olive" href="#" id="boton-2-text-olive-'.$indice.'"><i id="boton-2-olive-icono-'.$indice.'" title="Verde oliva" class="fas fa-square"></i></a></li>
															                    <li><a class="text-success" href="#" id="boton-2-text-success-'.$indice.'"><i id="boton-2-success-icono-'.$indice.'" title="Verde" class="fas fa-square"></i></a></li>
															                    <li><a class="text-lime" href="#" id="boton-2-text-lime-'.$indice.'"><i id="boton-2-lime-icono-'.$indice.'" title="Verde lima" class="fas fa-square"></i></a></li>
															                    <br>
															                    <li><a class="text-warning" href="#" id="boton-2-text-warning-'.$indice.'"><i id="boton-2-warning-icono-'.$indice.'" title="Amarillo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-orange" href="#" id="boton-2-text-orange-'.$indice.'"><i id="boton-2-orange-icono-'.$indice.'" title="Naranja" class="fas fa-square"></i></a></li>
															                    <li><a class="text-danger" href="#" id="boton-2-text-danger-'.$indice.'"><i id="boton-2-danger-icono-'.$indice.'" title="Rojo" class="fas fa-square"></i></a></li>
															                    <li><a class="text-maroon" href="#" id="boton-2-text-maroon-'.$indice.'"><i id="boton-2-maroon-icono-'.$indice.'" title="Rojo granate" class="fas fa-square"></i></a></li>
															                    <li><a class="text-pink" href="#" id="boton-2-text-pink-'.$indice.'"><i id="boton-2-pink-icono-'.$indice.'" title="Rosa" class="fas fa-square"></i></a></li>
															                    <br>
															                    <li><a class="text-fuchsia" href="#" id="boton-2-text-fuchsia-'.$indice.'"><i id="boton-2-fuchsia-icono-'.$indice.'" title="Fucsia" class="fas fa-square"></i></a></li>
															                    <li><a class="text-light" href="#" id="boton-2-text-light-'.$indice.'"><i id="boton-2-light-icono-'.$indice.'" title="Blanco" class="fas fa-square"></i></a></li>
															                    <li><a class="text-secondary" href="#" id="boton-2-text-secondary-'.$indice.'"><i id="boton-2-secondary-icono-'.$indice.'" title="Secundario" class="fas fa-square"></i></a></li>
															                    <li><a class="text-gray-dark" href="#" id="boton-2-text-gray-dark-'.$indice.'"><i id="boton-2-gray-dark-icono-'.$indice.'" title="Gris oscuro" class="fas fa-square"></i></a></li>
															                    <li><a class="text-black" href="#" id="boton-2-text-black-'.$indice.'"><i id="boton-2-black-icono-'.$indice.'" title="Negro" class="fas fa-square"></i></a></li>
																	              </ul>
															                </div>
															              </div>
															              <!-- /btn-group -->
															              <input type="text" class="form-control" name="boton-2-texto-'.$indice.'" id="boton-2-texto-'.$indice.'" placeholder="Texto del botón" value="'.$value["boton-2-texto"].'">
															            </div>
												            						<div class="form-group">
																						<input type="text" class="form-control" name="url-boton-2-'.$indice.'" id="url-boton-2-'.$indice.'" value="'.$value["url-boton-2"].'" placeholder="URL Botón número 2">
																					</div>
												            					</div>
												            				</div>

												            				<div class="col-md-1">
												            				</div>
												            			</div>
												            			<div class="row">
												            				<div class="col-md-1">
												            				</div>
												            				<div class="col-md-5">
												            					<div class="form-group my-2 text-center">
												            						<label for="exampleInputPassword1">Imagen delantera</label><br>
												            						<div class="btn btn-default btn-file mb-3">
													            						<i class="fas fa-paperclip"></i> Ad. Img. delantera
													            						<input type="file" name="foto-delante-'.$indice.'" id="foto-delante-'.$indice.'" value="'.$value["foto-delante"].'">
													            						<input type="hidden" name="foto-delante-actual-'.$indice.'" value="'.$value["foto-delante"].'">
													            					</div>
												            						<br>';
													            					if ($value["foto-delante"] == "") {
													            						echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_foto-delante-'.$indice.'" width="100px" height="72px">';
													            					}else{
													            						echo '<img src="'.$servidor.''.$value["foto-delante"].'" class="img-fluid py-2 bg-secondary previsualizarImg_foto-delante-'.$indice.'" width="100px" height="100px">';
													            					}
												            						echo '<p class="help-block small mt-3">Dimensiones: 500px * 500px | Peso Max. 2MB | Formato: JPG o PNG</p>
												            					</div>
												            				</div>
												            				<div class="col-md-5">
												            					<div class="form-group my-2 text-center">
												            						<label for="exampleInputPassword1">Imagen de fondo (background)</label><br>
												            						<div class="btn btn-default btn-file mb-3">
														            					<i class="fas fa-paperclip"></i> Ad. Img. de fondo
														            					<input type="file" name="fondo-'.$indice.'" id="fondo-'.$indice.'" value="'.$value["fondo"].'">
														            					<input type="hidden" name="fondo-actual-'.$indice.'" value="'.$value["fondo"].'" required>
														            				</div>
												            						<br>';
													            					if ($value["fondo"] == "") {
													            						echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_fondo-'.$indice.'" width="100px" height="72px">';
													            					}else{
													            						echo '<img src="'.$servidor.''.$value["fondo"].'" class="img-fluid py-2 bg-secondary previsualizarImg_fondo-'.$indice.'" width="200px" height="133px">';
													            					}
												            						echo '<p class="help-block small mt-3">Dimensiones: 2000px * 1333px | Peso Max. 2MB | Formato: JPG o PNG</p>
												            					</div>
												            				</div>
												            				<div class="col-md-1">
												            				</div>
												            			</div>
												            			<div class="row">
														            		<div class="col-md-1"></div>
														            		<div class="col-md-10">
														            			<div class="form-group text-center">
													                      			<br>
													                      			<button type="submit" class="btn btn-primary col-md-5 actualizarCarrusel" name="guardar" id="guardar">
																						<i class="fas fa-check"></i> Guardar cambios
																					</button>
													                      			<button type="button" class="btn btn-danger col-md-5 eliminarCarrusel" categoria="'.$value["categoria"].'" titulo="'.$value["titulo"].'" texto="'.$value["texto"].'" foto-delante="'.$value["foto-delante"].'" fondo="'.$value["fondo"].'">
															                  			<i class="fas fa-trash"></i> Eliminar este item del carrusel
															                		</button>
													                      		</div>
														            		</div>
														            		<div class="col-md-1"></div>
														            	</div>
														            	<br>
												            		</div>
												            	</div>';
												            	$indice++;
												            }
												        }
												        $id_nuevo = $indice;
												        $indice--;
												    echo '<input type="hidden" name="indice" value="'.$indice.'" id="indice">';
												@endphp
												<input type="hidden" name="id_nuevo" id="id_nuevo" value="{{$id_nuevo}}">
												</div>
												<button class="carousel-control-prev col-md-1" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
													<span class="carousel-control-prev-icon" aria-hidden="true"></span>
													<span class="visually-hidden">Previous</span>
												</button>
												<button class="carousel-control-next col-md-1" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
													<span class="carousel-control-next-icon" aria-hidden="true"></span>
													<span class="visually-hidden">Next</span>
												</button>
											</div>
				            			</div>

									</div>
								<div class="card-footer">

								</div>
							</div>
		            		</div>


		            		<!--====  End of Sección amigable del carrusel de evento y noticias  ====-->

							<!--====  End of Actualizar Carrusel  ====-->

							<!--==================================================
							=            Tarjeta de ingresar carrusel            =
							===================================================-->
							<div id="agregarItemCarrusel" name="agregarItemCarrusel" style="visibility: hidden;">
								<div class="card card-success collapsed-card" id="tarjetaAgregarItemCarrusel" name="tarjetaAgregarItemCarrusel">
									<div class="card-header">
										<h3 class="card-title">Nuevo Item Carrusel</h3>

										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
					                    		<i class="fas fa-minus"></i>
					                  		</button>
										</div>
									</div>
									@php
										echo '<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group my-2 text-center">
													<label for="exampleInputPassword1">Imagen de fondo (background)</label><br>
													<div class="btn btn-default btn-file mb-3">
														<i class="fas fa-paperclip"></i> Ad. Img. de fondo
														<input type="file" name="fondo-'.$id_nuevo.'" id="fondo-'.$id_nuevo.'">
													</div>
													<br>
													<img src="" class="img-fluid py-2 bg-secondary previsualizarImg_fondo-'.$id_nuevo.'">
													<p class="help-block small mt-3">Dimensiones: 2000px * 1333px | Peso Max. 2MB | Formato: JPG o PNG</p>
												</div>
											</div>
										</div>
										<ul id="desplegableComplementos" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
											<li class="nav-item">
												<a href="#" class="nav-link">
												</a>
												<ul id="complementosIngresarCarrusel" class="nav nav-treeview" style="display: block; height: 599.562px; padding-top: 0px; margin-top: 0px; padding-bottom: 0px; margin-bottom: 0px;">
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label id="categoria-label" for="labelCategoria">Categoria</label>
																<select class="form-control select2" name="categoria-'.$id_nuevo.'" id="categoria-'.$id_nuevo.'" style="width: 100%;">
																	<option selected="selected">Seleccionar...</option>';
										                            foreach ($categorias as $key => $value) {
										                              echo '<option value="'.$value['nombre_categoria'].'">'.$value["nombre_categoria"].'</option>';
										                            }
																echo '</select>
															</div>
															<div class="form-group">
																<label id="titulo-label" for="exampleInputEmail1">Titulo</label>
																<input type="text" class="form-control" name="titulo-'.$id_nuevo.'" id="titulo-'.$id_nuevo.'">
															</div>
															<div class="form-group">
																<label id="texto-label" for="exampleInputPassword1">Texto</label>
																<textarea class="form-control" rows="8" name="texto-'.$id_nuevo.'" id="texto-'.$id_nuevo.'"></textarea>
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group text-center">
																<label id="boton-1-label" for="exampleInputPassword1">Botón número 1</label><br>
																<input type="hidden" name="boton-1-color-'.$id_nuevo.'" id="boton-1-color-'.$id_nuevo.'">
																<div class="input-group mb-3">
								                  <div class="input-group-prepend">
								                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="boton-1-muestra-'.$id_nuevo.'" onclick="obtenerIndice('.$id_nuevo.')">
								                      Color
								                    </button>
								                    <div class="dropdown-menu justify-content-center">
								                    	<ul class="fc-color-picker" id="color-chooser">
												                <li><a class="text-purple" href="#" id="boton-1-text-purple-'.$id_nuevo.'"><i id="boton-1-purple-icono-'.$id_nuevo.'" title="Purpura" class="fas fa-square"></i></a></li>
										                    <li><a class="text-indigo" href="#" id="boton-1-text-indigo-'.$id_nuevo.'"><i id="boton-1-indigo-icono-'.$id_nuevo.'" title="Indigo" class="fas fa-square"></i></a></li>
										                    <li><a class="text-navy" href="#" id="boton-1-text-navy-'.$id_nuevo.'"><i id="boton-1-navy-icono-'.$id_nuevo.'" title="Azul marino" class="fas fa-square"></i></a></li>
										                    <li><a class="text-primary" href="#" id="boton-1-text-primary-'.$id_nuevo.'"><i id="boton-1-primary-icono-'.$id_nuevo.'" title="Azul primario" class="fas fa-square"></i></a></li>
										                    <li><a class="text-lightblue" href="#" id="boton-1-text-lightblue-'.$id_nuevo.'"><i id="boton-1-lightblue-icono-'.$id_nuevo.'" title="Azul cielo" class="fas fa-square"></i></a></li>
										                    <br>
										                    <li><a class="text-info" href="#" id="boton-1-text-info-'.$id_nuevo.'"><i id="boton-1-info-icono-'.$id_nuevo.'" title="Azul informativo" class="fas fa-square"></i></a></li>
										                    <li><a class="text-teal" href="#" id="boton-1-text-teal-'.$id_nuevo.'"><i id="boton-1-teal-icono-'.$id_nuevo.'" title="Verde menta" class="fas fa-square"></i></a></li>
										                    <li><a class="text-olive" href="#" id="boton-1-text-olive-'.$id_nuevo.'"><i id="boton-1-olive-icono-'.$id_nuevo.'" title="Verde oliva" class="fas fa-square"></i></a></li>
										                    <li><a class="text-success" href="#" id="boton-1-text-success-'.$id_nuevo.'"><i id="boton-1-success-icono-'.$id_nuevo.'" title="Verde" class="fas fa-square"></i></a></li>
										                    <li><a class="text-lime" href="#" id="boton-1-text-lime-'.$id_nuevo.'"><i id="boton-1-lime-icono-'.$id_nuevo.'" title="Verde lima" class="fas fa-square"></i></a></li>
										                    <br>
										                    <li><a class="text-warning" href="#" id="boton-1-text-warning-'.$id_nuevo.'"><i id="boton-1-warning-icono-'.$id_nuevo.'" title="Amarillo" class="fas fa-square"></i></a></li>
										                    <li><a class="text-orange" href="#" id="boton-1-text-orange-'.$id_nuevo.'"><i id="boton-1-orange-icono-'.$id_nuevo.'" title="Naranja" class="fas fa-square"></i></a></li>
										                    <li><a class="text-danger" href="#" id="boton-1-text-danger-'.$id_nuevo.'"><i id="boton-1-danger-icono-'.$id_nuevo.'" title="Rojo" class="fas fa-square"></i></a></li>
										                    <li><a class="text-maroon" href="#" id="boton-1-text-maroon-'.$id_nuevo.'"><i id="boton-1-maroon-icono-'.$id_nuevo.'" title="Rojo granate" class="fas fa-square"></i></a></li>
										                    <li><a class="text-pink" href="#" id="boton-1-text-pink-'.$id_nuevo.'"><i id="boton-1-pink-icono-'.$id_nuevo.'" title="Rosa" class="fas fa-square"></i></a></li>
										                    <br>
										                    <li><a class="text-fuchsia" href="#" id="boton-1-text-fuchsia-'.$id_nuevo.'"><i id="boton-1-fuchsia-icono-'.$id_nuevo.'" title="Fucsia" class="fas fa-square"></i></a></li>
										                    <li><a class="text-light" href="#" id="boton-1-text-light-'.$id_nuevo.'"><i id="boton-1-light-icono-'.$id_nuevo.'" title="Blanco" class="fas fa-square"></i></a></li>
										                    <li><a class="text-secondary" href="#" id="boton-1-text-secondary-'.$id_nuevo.'"><i id="boton-1-secondary-icono-'.$id_nuevo.'" title="Secundario" class="fas fa-square"></i></a></li>
										                    <li><a class="text-gray-dark" href="#" id="boton-1-text-gray-dark-'.$id_nuevo.'"><i id="boton-1-gray-dark-icono-'.$id_nuevo.'" title="Gris oscuro" class="fas fa-square"></i></a></li>
										                    <li><a class="text-black" href="#" id="boton-1-text-black-'.$id_nuevo.'"><i id="boton-1-black-icono-'.$id_nuevo.'" title="Negro" class="fas fa-square"></i></a></li>
												              </ul>
								                    </div>
								                  </div>
								                  <!-- /btn-group -->
								                  <input type="text" class="form-control" name="boton-1-texto-'.$id_nuevo.'" id="boton-1-texto-'.$id_nuevo.'" placeholder="Texto del botón">
								                </div>
																<div class="form-group">
																	<input type="text" class="form-control" name="url-boton-1-'.$id_nuevo.'" id="url-boton-1-'.$id_nuevo.'" placeholder="URL Botón Número 1">
																</div>
															</div>
															<div class="form-group my-2 text-center">
																<label id="boton-2-label" for="exampleInputPassword1">Botón número 2</label><br>
																<input type="hidden" name="boton-2-color-'.$id_nuevo.'" id="boton-2-color-'.$id_nuevo.'">
																<div class="input-group mb-3">
								                  <div class="input-group-prepend">
								                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="boton-2-muestra-'.$id_nuevo.'" onclick="obtenerIndice('.$id_nuevo.')">
								                      Color
								                    </button>
								                    <div class="dropdown-menu justify-content-center">
								                    	<ul class="fc-color-picker" id="color-chooser">
												                <li><a class="text-purple" href="#" id="boton-2-text-purple-'.$id_nuevo.'"><i id="boton-2-purple-icono-'.$id_nuevo.'" title="Purpura" class="fas fa-square"></i></a></li>
										                    <li><a class="text-indigo" href="#" id="boton-2-text-indigo-'.$id_nuevo.'"><i id="boton-2-indigo-icono-'.$id_nuevo.'" title="Indigo" class="fas fa-square"></i></a></li>
										                    <li><a class="text-navy" href="#" id="boton-2-text-navy-'.$id_nuevo.'"><i id="boton-2-navy-icono-'.$id_nuevo.'" title="Azul marino" class="fas fa-square"></i></a></li>
										                    <li><a class="text-primary" href="#" id="boton-2-text-primary-'.$id_nuevo.'"><i id="boton-2-primary-icono-'.$id_nuevo.'" title="Azul primario" class="fas fa-square"></i></a></li>
										                    <li><a class="text-lightblue" href="#" id="boton-2-text-lightblue-'.$id_nuevo.'"><i id="boton-2-lightblue-icono-'.$id_nuevo.'" title="Azul cielo" class="fas fa-square"></i></a></li>
										                    <br>
										                    <li><a class="text-info" href="#" id="boton-2-text-info-'.$id_nuevo.'"><i id="boton-2-info-icono-'.$id_nuevo.'" title="Azul informativo" class="fas fa-square"></i></a></li>
										                    <li><a class="text-teal" href="#" id="boton-2-text-teal-'.$id_nuevo.'"><i id="boton-2-teal-icono-'.$id_nuevo.'" title="Verde menta" class="fas fa-square"></i></a></li>
										                    <li><a class="text-olive" href="#" id="boton-2-text-olive-'.$id_nuevo.'"><i id="boton-2-olive-icono-'.$id_nuevo.'" title="Verde oliva" class="fas fa-square"></i></a></li>
										                    <li><a class="text-success" href="#" id="boton-2-text-success-'.$id_nuevo.'"><i id="boton-2-success-icono-'.$id_nuevo.'" title="Verde" class="fas fa-square"></i></a></li>
										                    <li><a class="text-lime" href="#" id="boton-2-text-lime-'.$id_nuevo.'"><i id="boton-2-lime-icono-'.$id_nuevo.'" title="Verde lima" class="fas fa-square"></i></a></li>
										                    <br>
										                    <li><a class="text-warning" href="#" id="boton-2-text-warning-'.$id_nuevo.'"><i id="boton-2-warning-icono-'.$id_nuevo.'" title="Amarillo" class="fas fa-square"></i></a></li>
										                    <li><a class="text-orange" href="#" id="boton-2-text-orange-'.$id_nuevo.'"><i id="boton-2-orange-icono-'.$id_nuevo.'" title="Naranja" class="fas fa-square"></i></a></li>
										                    <li><a class="text-danger" href="#" id="boton-2-text-danger-'.$id_nuevo.'"><i id="boton-2-danger-icono-'.$id_nuevo.'" title="Rojo" class="fas fa-square"></i></a></li>
										                    <li><a class="text-maroon" href="#" id="boton-2-text-maroon-'.$id_nuevo.'"><i id="boton-2-maroon-icono-'.$id_nuevo.'" title="Rojo granate" class="fas fa-square"></i></a></li>
										                    <li><a class="text-pink" href="#" id="boton-2-text-pink-'.$id_nuevo.'"><i id="boton-2-pink-icono-'.$id_nuevo.'" title="Rosa" class="fas fa-square"></i></a></li>
										                    <br>
										                    <li><a class="text-fuchsia" href="#" id="boton-2-text-fuchsia-'.$id_nuevo.'"><i id="boton-2-fuchsia-icono-'.$id_nuevo.'" title="Fucsia" class="fas fa-square"></i></a></li>
										                    <li><a class="text-light" href="#" id="boton-2-text-light-'.$id_nuevo.'"><i id="boton-2-light-icono-'.$id_nuevo.'" title="Blanco" class="fas fa-square"></i></a></li>
										                    <li><a class="text-secondary" href="#" id="boton-2-text-secondary-'.$id_nuevo.'"><i id="boton-2-secondary-icono-'.$id_nuevo.'" title="Secundario" class="fas fa-square"></i></a></li>
										                    <li><a class="text-gray-dark" href="#" id="boton-2-text-gray-dark-'.$id_nuevo.'"><i id="boton-2-gray-dark-icono-'.$id_nuevo.'" title="Gris oscuro" class="fas fa-square"></i></a></li>
										                    <li><a class="text-black" href="#" id="boton-2-text-black-'.$id_nuevo.'"><i id="boton-2-black-icono-'.$id_nuevo.'" title="Negro" class="fas fa-square"></i></a></li>
												              </ul>
								                    </div>
								                  </div>
								                  <!-- /btn-group -->
								                  <input type="text" class="form-control" name="boton-2-texto-'.$id_nuevo.'" id="boton-2-texto-'.$id_nuevo.'" placeholder="Texto del botón">
								                </div>
																<div class="form-group">
																	<input type="text" class="form-control" name="url-boton-2-'.$id_nuevo.'" id="url-boton-2-'.$id_nuevo.'" placeholder="URL Botón Número 2">
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-12">
															<div class="form-group my-2 text-center">
																<label id="img-delante-label" for="exampleInputPassword1">Imagen delantera</label><br>
																<div id="div-img-delante" class="btn btn-default btn-file mb-3">
																	<i class="fas fa-paperclip"></i> Ad. Img. delantera
																	<input type="file" name="foto-delante-'.$id_nuevo.'" id="foto-delante-'.$id_nuevo.'" value="">
																</div>
																<br>
																<img src="" class="img-fluid py-2 bg-secondary previsualizarImg_foto-delante-'.$id_nuevo.'">
																<p id="d-3" class="help-block small mt-3">Dimensiones: 500px * 500px | Peso Max. 2MB | Formato: JPG o PNG</p>
															</div>
														</div>
													</div>
												</ul>
											</li>
										</ul>



									</div>';
									@endphp


									<div class="card-footer">
										<div class="col-md-12 text-center">
											<button type="submit" class="btn btn-success col-md-6 actualizarCarrusel">
							                  	<i class="fas fa-check"></i> Guardar todo
							                </button>
										</div>

									</div>
								</div>
							</div>

							<!--====  End of Tarjeta de ingresar carrusel  ====-->



						</div>
					</div>
				</div>
			</form>
	</section>
</div>
@else
    @include('paginas/errores/401')
@endif
@endauth

  @if (Session::has("no-validacion"))
    <script>
      swal({
          title: "¡Cuidado!",
          text: "Está intentando ingresar caracteres no validos.",
          type: "warning"
      });
    </script>
  @endif
  @if (Session::has("ok-editar"))
    <script>
      swal({
          title: "¡Bien Hecho!",
          text: "Información actualizada.",
          type: "success"
      });
    </script>
  @endif
  @if (Session::has("error"))
    <script>
      swal({
          title: "¡Error!",
          text: "Error al intentar actualizar.",
          type: "error"
      });
    </script>
  @endif
  @if (Session::has("no-validacion-imagen"))
    <script>
      swal({
          title: "¡Error!",
          text: "Formato incorrecto de imagen.",
          type: "error"
      });
    </script>
  @endif

@endsection






