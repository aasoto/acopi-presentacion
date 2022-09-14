@extends('plantilla')

@section('content')
<!--============================================
=            Autenticación de rol            =
============================================-->

@if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos') || (Auth::user()->rol == 'Asistente de dirección') || (Auth::user()->rol == 'Subdirector de desarrollo empresarial') || (Auth::user()->rol == 'Director ejecutivo'))

  <div class="content-wrapper" style="min-height: 243px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestión Página Web</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="#">Página web</a></li>
              <li class="breadcrumb-item active">Editar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">
      @foreach ($paginaweb as $element) @endforeach
      <div class="container-fluid">
        <form action="{{url('/')}}/pagina_web/carrusel/{{$element->id}}" method="post" enctype="multipart/form-data">
          @method('PUT')
          @csrf

          @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Director ejecutivo'))
            <!--=============================================
            =            Sección Información General            =
            =============================================-->
            @php
              if($_GET['ver'] == "datosg"){
                echo '<div class="card card-primary">';
              }else{
                echo '<div class="card card-primary collapsed-card">';
              }
            @endphp
            
            
              <!--==============================================
              =            Card header - cabecera            =
              ==============================================-->

              <div class="card-header">
                <h3 class="card-title">Información General</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    @php
                      if($_GET['ver'] == "datosg"){
                        echo '<i class="fas fa-minus"></i>';
                      }else{
                        echo '<i class="fas fa-plus"></i>';
                      }
                    @endphp
                  </button>
                </div>
              </div>

              <!--=====  End of Card header - cabecera  ======-->


              <!--==============================================
              =            Cuerpo            =
              ==============================================-->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Dominio</label>
                      <input type="text" class="form-control" name="dominio" value="{{ $element->dominio}}" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Servidor</label>
                      <input type="text" class="form-control" name="servidor" value="{{ $element->servidor}}" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Titulo pestaña</label>
                      <input type="text" class="form-control" name="titulo_pestana" value="{{ $element->titulo_pestana}}" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Titulo página</label>
                      <input type="text" class="form-control" name="titulo_pagina" value="{{ $element->titulo_pagina}}" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Titulo navegación</label>
                      <input type="text" class="form-control" name="titulo_navegacion" value="{{ $element->titulo_navegacion}}" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Descripción</label>
                      <textarea class="form-control" rows="5" name="descripcion" required>{{$element->descripcion}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Palabras claves</label>
                      @php
                        $tags = json_decode($element->palabras_claves, true);
                        $palabras_claves = "";
                        foreach ($tags as $key => $value) {
                          $palabras_claves .= $value.",";
                        }
                      @endphp
                      <input type="text" class="form-control" name="palabras_claves" value="{{$palabras_claves}}" data-role="tagsinput" required>
                    </div>
                  </div>
                </div>
              </div>
              <!--=====  End of Cuerpo  ======-->

              <!--==============================================
              =            Boton formulario            =
              ==============================================-->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-check"></i> Guardar
                </button>
              </div>
              <!--=====  End of Boton formulario  ======-->

            </div>
            <!--=====  End of Sección Información General  ======-->
          @endif
          
          @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Director ejecutivo'))
            <!--===============================================
            =            Sección cambio de logos            =
            ===============================================-->

            @php
              if($_GET['ver'] == "logos"){
                echo '<div class="card card-primary">';
              }else{
                echo '<div class="card card-primary collapsed-card">';
              }
            @endphp
              <div class="card-header">
                <h3 class="card-title">Logos</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    @php
                      if($_GET['ver'] == "logos"){
                        echo '<i class="fas fa-minus"></i>';
                      }else{
                        echo '<i class="fas fa-plus"></i>';
                      }
                    @endphp
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <label for="exampleInputPassword1">Logo pestaña</label>
                    <div class="form-group my-2 text-center">
                      <div class="btn btn-default btn-file mb-3">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de Logo
                        <input type="file" name="pestana">
                        <input type="hidden" name="logo_pestana_actual" value="{{$element->logo_pestana}}" required>
                      </div>
                      <br>
                      <img src="{{url('/')}}/{{$element->logo_pestana}}" class="img-fluid py-2 bg-secondary previsualizarImg_pestana">
                      <p class="help-block small mt-3">Dimensiones: 700px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <label for="exampleInputPassword1">Logo navegación</label>
                    <div class="form-group my-2 text-center">
                      <div class="btn btn-default btn-file mb-3">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de Logo
                        <input type="file" name="nav">
                        <input type="hidden" name="logo_navegacion_actual" value="{{$element->logo_navegacion}}" required>
                      </div>
                      <br>
                      <img src="{{url('/')}}/{{$element->logo_navegacion}}" class="img-fluid py-2 bg-secondary previsualizarImg_nav">
                      <p class="help-block small mt-3">Dimensiones: 700px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-check"></i> Guardar
                </button>
              </div>
            </div>
            <!--=====  End of Sección cambio de logos  ======-->
          @endif
          
          @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Director ejecutivo') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos') || (Auth::user()->rol == 'Asistente de dirección'))
            <!--==============================================================
            =            Sección carrusel de eventos y noticias            =
            ==============================================================-->
            
            {{--<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Carrusel de eventos y noticias</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row listadoCarrusel">
                  <input type="hidden" name="carrusel" value="{{$element->carrusel}}" id="listaCarrusel">
                  @php
                    $servidor = $element->servidor;
                    $carrousel = json_decode($element->carrusel, true);
                    $indice = 0;
                    foreach ($carrousel as $key => $value){

                    echo '

                  <div class="card" style="background-color:#DCDCDC">
                    <div class="row">
                      <div class="col-md-6">
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
                      
                      <div class="col-md-6">
                        <div class="form-group my-2 text-center">
                          <label for="exampleInputPassword1">Botón número 1</label><br>
                          <div class="btn btn-default btn-file mb-3">
                            <i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
                            <input type="file" name="boton-1-'.$indice.'" id="boton-1-'.$indice.'" value="'.$value["boton-1"].'">
                            <input type="hidden" name="boton-1-actual-'.$indice.'" value="'.$value["boton-1"].'">
                          </div>
                          <br>
                          <img src="'.$servidor.''.$value["boton-1"].'" class="img-fluid py-2 bg-secondary previsualizarImg_boton-1-'.$indice.'">
                          <p class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
                        </div>
                        <div class="form-group my-2 text-center">
                          <label for="exampleInputPassword1">Botón número 2</label><br>
                          <div class="btn btn-default btn-file mb-3">
                            <i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
                            <input type="file" name="boton-2-'.$indice.'" id="boton-2-'.$indice.'" value="'.$value["boton-2"].'">
                            <input type="hidden" name="boton-2-actual-'.$indice.'" value="'.$value["boton-2"].'">
                          </div>
                          <br>
                          <img src="'.$servidor.''.$value["boton-2"].'" class="img-fluid py-2 bg-secondary previsualizarImg_boton-2-'.$indice.'">
                          <p class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
                        </div>
                      </div> 
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group my-2 text-center">
                          <label for="exampleInputPassword1">Imagen delantera</label><br>
                          <div class="btn btn-default btn-file mb-3">
                            <i class="fas fa-paperclip"></i> Ad. Img. delantera
                            <input type="file" name="foto-delante-'.$indice.'" id="foto-delante-'.$indice.'" value="'.$value["foto-delante"].'">
                            <input type="hidden" name="foto-delante-actual-'.$indice.'" value="'.$value["foto-delante"].'">
                          </div>
                          <br>
                          <img src="'.$servidor.''.$value["foto-delante"].'" class="img-fluid py-2 bg-secondary previsualizarImg_foto-delante-'.$indice.'">
                          <p class="help-block small mt-3">Dimensiones: 500px * 500px | Peso Max. 2MB | Formato: JPG o PNG</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group my-2 text-center">
                          <label for="exampleInputPassword1">Imagen de fondo (background)</label><br>
                          <div class="btn btn-default btn-file mb-3">
                            <i class="fas fa-paperclip"></i> Ad. Img. de fondo
                            <input type="file" name="fondo-'.$indice.'" id="fondo-'.$indice.'" value="'.$value["fondo"].'">
                            <input type="hidden" name="fondo-actual-'.$indice.'" value="'.$value["fondo"].'" required>
                          </div>
                          <br>
                          <img src="'.$servidor.''.$value["fondo"].'" class="img-fluid py-2 bg-secondary previsualizarImg_fondo-'.$indice.'">
                          <p class="help-block small mt-3">Dimensiones: 2000px * 1333px | Peso Max. 2MB | Formato: JPG o PNG</p>
                        </div>
                      </div>
                    </div>
                  </div>

                      ';
                      $indice++;
                    }
                    $indice--;
                    echo '<input type="hidden" name="indice" value="'.$indice.'" id="indice">';
                  @endphp
                
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary actualizarCarrusel">
                  <i class="fas fa-check"></i> Guardar
                </button>
              </div>
            </div>--}}
            
            <!--=====  End of Sección carrusel de eventos y noticias  ======-->

            <!--========================================================================
            =            Sección amigable del carrusel de evento y noticias            =
            =========================================================================-->
            
              @php
                if($_GET['ver'] == "carrusel"){
                  echo '<div class="card card-primary">';
                }else{
                  echo '<div class="card card-primary collapsed-card">';
                }
              @endphp
              <div class="card-header">
                <h3 class="card-title">Carrusel de eventos y noticias</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    @php
                      if($_GET['ver'] == "carrusel"){
                        echo '<i class="fas fa-minus"></i>';
                      }else{
                        echo '<i class="fas fa-plus"></i>';
                      }
                    @endphp
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                  <div class="carousel-indicators">
                    @php
                      $contador = json_decode($element->carrusel, true);
                      $active = true;
                      $indice = 0;
                      foreach ($contador as $key => $value){
                        if($active){
                          echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$indice.'" class="active" aria-current="true" aria-label="Slide '.$value["titulo"].'"></button>';
                          $active = false;
                        }else{
                          echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$indice.'" aria-label="Slide '.$value["titulo"].'"></button>';
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
                          <div class="card" style="background-color:#DCDCDC">
                            <div class="row">
                              <div class="col-md-2">
                              </div>

                              <div class="col-md-4">
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
                              
                              <div class="col-md-4">
                                <div class="form-group my-2 text-center">
                                  <label for="exampleInputPassword1">Botón número 1</label><br>
                                  <div class="btn btn-default btn-file mb-3">
                                    <i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
                                    <input type="file" name="boton-1-'.$indice.'" id="boton-1-'.$indice.'" value="'.$value["boton-1"].'">
                                    <input type="hidden" name="boton-1-actual-'.$indice.'" value="'.$value["boton-1"].'">
                                  </div>
                                  <br>';
                                  if ($value["boton-1"] == "") {
                                    echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_boton-1-'.$indice.'" width="100px" height="72px">';
                                  }else{
                                    echo '<img src="'.$servidor.''.$value["boton-1"].'" class="img-fluid py-2 bg-secondary previsualizarImg_boton-1-'.$indice.'" width="100px" height="72px">';
                                  }
                                  echo '<p class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
                                </div>
                                <div class="form-group my-2 text-center">
                                  <label for="exampleInputPassword1">Botón número 2</label><br>
                                  <div class="btn btn-default btn-file mb-3">
                                    <i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
                                    <input type="file" name="boton-2-'.$indice.'" id="boton-2-'.$indice.'" value="'.$value["boton-2"].'">
                                    <input type="hidden" name="boton-2-actual-'.$indice.'" value="'.$value["boton-2"].'">
                                  </div>
                                  <br>';
                                  if ($value["boton-2"] == "") {
                                    echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_boton-2-'.$indice.'" width="100px" height="72px">';
                                  }else{
                                    echo '<img src="'.$servidor.''.$value["boton-2"].'" class="img-fluid py-2 bg-secondary previsualizarImg_boton-2-'.$indice.'" width="100px" height="72px">';
                                  }
                                  echo '<p class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
                                </div>
                              </div>

                              <div class="col-md-2">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">
                              </div>
                              <div class="col-md-4">
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
                              <div class="col-md-4">
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
                              <div class="col-md-2">
                              </div>
                            </div>
                          </div>
                        </div>
                      ';
                     
                        $active = false;
                        $indice++;
                      }else{
                        echo '<div class="carousel-item">
                          <div class="card" style="background-color:#DCDCDC">
                            <div class="row">
                              <div class="col-md-2">
                              </div>

                              <div class="col-md-4">
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
                              
                              <div class="col-md-4">
                                <div class="form-group my-2 text-center">
                                  <label for="exampleInputPassword1">Botón número 1</label><br>
                                  <div class="btn btn-default btn-file mb-3">
                                    <i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
                                    <input type="file" name="boton-1-'.$indice.'" id="boton-1-'.$indice.'" value="'.$value["boton-1"].'">
                                    <input type="hidden" name="boton-1-actual-'.$indice.'" value="'.$value["boton-1"].'">
                                  </div>
                                  <br>';
                                  if ($value["boton-1"] == "") {
                                    echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_boton-1-'.$indice.'" width="100px" height="72px">';
                                  }else{
                                    echo '<img src="'.$servidor.''.$value["boton-1"].'" class="img-fluid py-2 bg-secondary previsualizarImg_boton-1-'.$indice.'" width="100px" height="72px">';
                                  }
                                  echo '<p class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
                                </div>
                                <div class="form-group my-2 text-center">
                                  <label for="exampleInputPassword1">Botón número 2</label><br>
                                  <div class="btn btn-default btn-file mb-3">
                                    <i class="fas fa-paperclip"></i> Adjuntar Imagen del botón
                                    <input type="file" name="boton-2-'.$indice.'" id="boton-2-'.$indice.'" value="'.$value["boton-2"].'">
                                    <input type="hidden" name="boton-2-actual-'.$indice.'" value="'.$value["boton-2"].'">
                                  </div>
                                  <br>';
                                  if ($value["boton-2"] == "") {
                                    echo '<img src="'.$servidor.'vistas/images/pagina_web/carrusel/sin-imagen.jpg" class="img-fluid py-2 bg-secondary previsualizarImg_boton-2-'.$indice.'" width="100px" height="72px">';
                                  }else{
                                    echo '<img src="'.$servidor.''.$value["boton-2"].'" class="img-fluid py-2 bg-secondary previsualizarImg_boton-2-'.$indice.'" width="100px" height="72px">';
                                  }
                                  echo '<p class="help-block small mt-3">Dimensiones: 400px * 118px | Peso Max. 2MB | Formato: JPG o PNG</p>
                                </div>
                              </div>

                              <div class="col-md-2">
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-2">
                              </div>
                              <div class="col-md-4">
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
                              <div class="col-md-4">
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
                              <div class="col-md-2">
                              </div>
                            </div>
                          </div>
                        </div>';
                        $indice++;
                      }
                    }
                    $indice--;
                    echo '<input type="hidden" name="indice" value="'.$indice.'" id="indice">';
                    @endphp

                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary actualizarCarrusel">
                  <i class="fas fa-check"></i> Guardar
                </button>
              </div>
            </div>
            
            <!--====  End of Sección amigable del carrusel de evento y noticias  ====-->
            
          @endif
          
          @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Director ejecutivo') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos'))
            <!--======================================
            =            Sección footer            =
            ======================================-->
            @php
              if($_GET['ver'] == "footer"){
                echo '<div class="card card-primary">';
              }else{
                echo '<div class="card card-primary collapsed-card">';
              }
            @endphp
              <div class="card-header">
                <h3 class="card-title">Footer</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    @php
                      if($_GET['ver'] == "footer"){
                        echo '<i class="fas fa-minus"></i>';
                      }else{
                        echo '<i class="fas fa-plus"></i>';
                      }
                    @endphp
                  </button>
                </div>
              </div>
              <div class="card-body">
                  <!--================================================
                =            Formulario pie de página            =
                ================================================-->

                  <div class="row">

                    <!--==============================================
                    =            Columna Redes Sociales            =
                    ==============================================-->

                    <div class="col-md-6">
                      <label for="footerRedesSociales">Redes Sociales</label>
                      <div class="row">
                        <div class="col-5">
                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Icono</span>
                            </div>
                            <select class="form-control" id="icono_red">
                              <option value="fab fa-facebook-f, facebook">
                                facebook
                              </option>
                              <option value="fab fa-instagram, instagram">
                                instagram
                              </option>
                              <option value="fab fa-twitter, twitter">
                                twitter
                              </option>
                              <option value="fab fa-youtube, youtube">
                                youtube
                              </option>
                              <option value="fab fa-snapchat-ghost, snapchat">
                                snapchat
                              </option>
                               <option value="fab fa-linkedin-in, linkedin">
                                linkedin
                              </option>
                              <option value="fab fa-pinterest-p, pinterest">
                                pinterest
                              </option>
                              <option value="fab fa-tiktok, tiktok">
                                tiktok
                              </option>
                            </select>
                          </div>
                        </div>
                        {{-- fin 5 col --}}
                        <div class="col-5">
                          <div class="input-group mb-3">
                            <div class="input-group-append">
                              <span class="input-group-text">Url</span>
                            </div>
                            <input type="text" class="form-control" id="url_red">
                          </div>
                        </div>
                        {{-- fin 5 col --}}
                        <div class="col-2">
                          <button type="button" class="btn btn-primary w-100 agregarRed">
                            <i class="fas fa-plus"></i>
                          </button>
                        </div>
                        {{-- fin 2 col --}}
                      </div>
                      {{-- fin del row --}}
                      <div class="row listadoRed">

                        @php
                         echo "<input type='hidden' name='redes_sociales' value='".$element->redes_sociales."' id='listaRed'>";
                          $redes = json_decode($element->redes_sociales, true);
                          foreach ($redes as $key => $value) {
                            echo '<div class="col-lg-12">
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text text-white" style="background:#000000">
                                        <i class="'.$value["logo"].'"></i>
                                    </div>
                                  </div>
                                  <input type="text" class="form-control" value="'.$value["link"].'">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text" style="cursor:pointer">
                                        <span class="bg-danger px-2 rounded-circle eliminarRed" red="'.$value["logo"].'" url="'.$value["link"].'">&times;</span>
                                    </div>
                                  </div>
                                </div>
                              </div>';
                          }
                        @endphp
                      </div>
                    </div>

                    <!--=====  End of Columna Redes Sociales  ======-->

                    <!--=======================================================
                    =            Columna Información de Contacto            =
                    =======================================================-->

                    <div class="col-md-6">
                      <label for="footerInfoContacto">Información de contacto</label>
                      @php
                        $valor = json_decode($element->contacto, true);

                        echo '
                        <div class="form-group">
                          <label for="footerDireccion">Dirección</label>
                          <input type="text" class="form-control" name="direccion" value="'.$valor[0].'" required>
                        </div>
                        <div class="form-group">
                          <label for="footerTelefono">Telefono</label>
                          <input type="text" class="form-control" name="telefono" value="'.$valor[1].'" required>
                        </div>
                        <div class="form-group">
                          <label for="footerCelular">Celular</label>
                          <input type="text" class="form-control" name="celular" value="'.$valor[2].'" required>
                        </div>
                        <div class="form-group">
                          <label for="footerCorreoElectronico">Correo electronico</label>
                          <input type="text" class="form-control" name="email" value="'.$valor[3].'" required>
                        </div>';
                      @endphp
                    </div>

                    <!--=====  End of Columna Información de Contacto  ======-->

                  </div>
                <!--=====  End of Formulario pie de página  ======-->

              </div>
              <!--==============================================
              =            Botón del final del formulario            =
              ==============================================-->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                  <i class="fas fa-check"></i> Guardar
                </button>
              </div>

              <!--=====  End of Botón del final del formulario  ======-->
            </div>
            <!--=====  End of Sección footer  ======-->
          @endif          

          
        </form>
      </div>
    </section>
    <!-- /.content -->
  </div>

@endif

<!--=====  End of Autenticación de rol  ======-->




  @if (Session::has("no-validacion"))
    <script>
      swal({
          title: "¡Cuidado!",
          text: "Está intentando ingresar caracteres no validos.",
          icon: "warning"
      });
    </script>
  @endif
  @if (Session::has("ok-editar"))
    <script>
      swal({
          title: "¡Bien Hecho!",
          text: "Información actualizada.",
          icon: "success"
      });
    </script>
  @endif
  @if (Session::has("error"))
    <script>
      swal({
          title: "¡Error!",
          text: "Error al intentar actualizar.",
          icon: "error"
      });
    </script>
  @endif
  @if (Session::has("no-validacion-imagen"))
    <script>
      swal({
          title: "¡Error!",
          text: "Formato incorrecto de imagen.",
          icon: "error"
      });
    </script>
  @endif

  @endsection
