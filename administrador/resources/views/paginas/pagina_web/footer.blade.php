@extends('plantilla')

@section('content')
<div class="content-wrapper" style="min-height: 243px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Footer</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Página web</a></li>
              <li class="breadcrumb-item active">Footer</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @foreach ($paginaweb as $element) @endforeach
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Carrusel de eventos y noticias</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                      <input type="hidden" name="carrusel" value="{{$element->carrusel}}" id="listaCarrusel">

                      @php
                        $servidor = $element->servidor;
                        $carrousel = json_decode($element->carrusel, true);
                        $indice = 0;
                        foreach ($carrousel as $key => $value){

                        echo '
                        <div class="carousel-item">
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
                        </div>
                      

                          ';
                          $indice++;
                        }
                        $indice--;
                        echo '<input type="hidden" name="indice" value="'.$indice.'" id="indice">';
                      @endphp
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                  
                
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary actualizarCarrusel">
                  <i class="fas fa-check"></i> Guardar
                </button>
              </div>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

  @endsection