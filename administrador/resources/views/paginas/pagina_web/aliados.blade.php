@extends('plantilla')

@section('content')
@auth
@if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos'))
    <div class="content-wrapper" style="min-height: 243px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestión de aliados</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Página web</a></li>
                            <li class="breadcrumb-item active">Aliados</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            @foreach ($paginaweb as $element) @endforeach
            <div class="content-fluid">
                <form action="{{url('/')}}/pagina_web/aliados/{{$element->id}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="listaAliados" id="listaAliados" value="{{$element->aliados}}">
                    <input type="hidden" name="eliminar" id="eliminar" value="no">
                    <!--========================================
                    =            Actualizar aliados            =
                    =========================================-->

                    <div class="card card-primary" id="tarjetaVerAliados" style="visibility: '';">
                        <div class="card-header">
                            <h3 class="card-title">Gestión Aliados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-success col-md-5 botonAgregarAliado" id="botonAgregarAliado">
                                <i class="fas fa-plus"></i> Agregar nuevo aliado
                                </button>
                            </div>
                            <br>
                            <div class="row listadoAliados">
                                <div id="carouselExampleIndicators" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                                    <div class="carousel-indicators">
                                        @php
                                        $contador = json_decode($element->aliados, true);
                                        $active = true;
                                        $indice = 0;
                                        foreach ($contador as $key => $value){
                                            if($active){
                                                echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$indice.'" class="active" aria-current="true" aria-label="Slide '.$value["nombre"].'"></button>';
                                                $active = false;
                                            }else{
                                                echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$indice.'" aria-label="Slide '.$value["nombre"].'"></button>';
                                            }
                                            $indice++;
                                        }
                                        @endphp
                                    </div>
                                    <div class="carousel-inner">
                                        @php
                                        $servidor = $element->servidor;
                                        $aliados = json_decode($element->aliados, true);
                                        $indice = 0;
                                        $active = true;
                                        foreach ($aliados as $key => $value){
                                            if ($active) {
                                                echo '
                                                <div class="carousel-item active">
                                                    <div class="card" style="background-color:#DCDCDC" id="aliadosActivo">
                                                        <br>
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-md-1"></div>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Nombre</label>
                                                                        <input type="text" class="form-control" name="nombre-'.$indice.'" value="'.$value['nombre'].'" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Link</label>
                                                                        <input type="text" class="form-control" name="link-'.$indice.'" value="'.$value['link'].'" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <div class="form-group">
                                                                        <br>
                                                                        <button type="button" class="btn btn-danger eliminarAliado" nombre="'.$value['nombre'].'" link="'.$value['link'].'" logo="'.$value['logo'].'" style="font-size: 25px;">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-1"></div>
                                                                <div class="col-md-10">
                                                                    <div class="form-group my-2 text-center">
                                                                        <label for="exampleInputPassword1">Logo Aliado</label>
                                                                        <br>
                                                                        <div class="btn btn-default btn-file mb-3">
                                                                            <i class="fas fa-paperclip"></i> Adjuntar Imagen de Logo
                                                                            <input type="file" name="logo-'.$indice.'" id="logo-'.$indice.'">
                                                                            <input type="hidden" name="logo_actual-'.$indice.'" value="'.$value['logo'].'" required>
                                                                        </div>
                                                                        <br>
                                                                        <img src="'.$servidor.''.$value['logo'].'" class="img-fluid py-2 bg-secondary previsualizarImg_logo-'.$indice.'">
                                                                        <p class="help-block small mt-3">Dimensiones: 293px * 100px | Peso Max. 2MB | Formato: JPG o PNG</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1"></div>
                                                            </div>
                                                        </div>

                                                        <br>
                                                    </div>
                                                </div>';
                                                $indice++;
                                                $active = false;
                                            }else{
                                                echo '
                                                <div class="carousel-item">
                                                    <div class="card" style="background-color:#DCDCDC" id="aliadosSegundario">
                                                        <br>
                                                        <div>
                                                            <div class="row">
                                                                <div class="col-md-1"></div>
                                                                <div class="col-md-5">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Nombre</label>
                                                                        <input type="text" class="form-control" name="nombre-'.$indice.'" value="'.$value['nombre'].'" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Link</label>
                                                                        <input type="text" class="form-control" name="link-'.$indice.'" value="'.$value['link'].'" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1">
                                                                    <div class="form-group">
                                                                        <br>
                                                                        <button type="button" class="btn btn-danger eliminarAliado" nombre="'.$value['nombre'].'" link="'.$value['link'].'" logo="'.$value['logo'].'" style="font-size: 25px;">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1"></div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-1"></div>
                                                                <div class="col-md-10">
                                                                    <div class="form-group my-2 text-center">
                                                                        <label for="exampleInputPassword1">Logo Aliado</label>
                                                                        <br>
                                                                        <div class="btn btn-default btn-file mb-3">
                                                                            <i class="fas fa-paperclip"></i> Adjuntar Imagen de Logo
                                                                            <input type="file" name="logo-'.$indice.'" id="logo-'.$indice.'">
                                                                            <input type="hidden" name="logo_actual-'.$indice.'" value="'.$value['logo'].'" required>
                                                                        </div>
                                                                        <br>
                                                                        <img src="'.$servidor.''.$value['logo'].'" class="img-fluid py-2 bg-secondary previsualizarImg_logo-'.$indice.'">
                                                                        <p class="help-block small mt-3">Dimensiones: 293px * 100px | Peso Max. 2MB | Formato: JPG o PNG</p>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-1"></div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                    </div>
                                                </div>';
                                                $indice++;
                                            }
                                        }
                                        $id_agregar = $indice;
                                        $indice--;
                                        echo '<input type="hidden" name="indice" value="'.$indice.'" id="indice">';
                                        @endphp
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
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary col-md-6" name="guardar" id="guardar">
                                    <i class="fas fa-check"></i> Guardar
                                </button>
                            </div>
                        </div>
                    </div>

                    <!--====  End of Actualizar aliados  ====-->

                    <!--===========================================
                    =            Ingresar nuevo aliado            =
                    ============================================-->

                    <div id="ingresarAliado" style="visibility: hidden;">
                        <div class="card card-success collapsed-card" id="tarjetaIngresarAliado">
                            <div class="card-header">
                                <h3 class="card-title">Agregar nuevo aliado</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            @php
                            echo '<div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nombre-'.$id_agregar.'" value="" placeholder="Nombre">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="link-'.$id_agregar.'" value="" placeholder="Link">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group my-2 text-center">
                                            <label for="exampleInputPassword1">Logo Aliado</label>
                                            <br>
                                            <div class="btn btn-default btn-file mb-3">
                                                <i class="fas fa-paperclip"></i> Adjuntar Imagen de Logo
                                                <input type="file" name="logo-'.$id_agregar.'" id="logo-'.$id_agregar.'">
                                                <input type="hidden" name="logo_actual-'.$id_agregar.'" value="'.$servidor.'">
                                            </div>
                                            <br>
                                            <img src="'.$servidor.'" class="img-fluid py-2 bg-secondary previsualizarImg_logo-'.$id_agregar.'">
                                            <p class="help-block small mt-3">Dimensiones: 293px * 100px | Peso Max. 2MB | Formato: JPG o PNG</p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                            @endphp
                            <div class="card-footer">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success col-md-6">
                                        <i class="fas fa-check"></i> Guardar
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!--====  End of Ingresar nuevo aliado  ====-->
                </form>
            </div>
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
