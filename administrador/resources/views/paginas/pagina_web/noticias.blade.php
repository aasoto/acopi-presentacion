@extends('plantilla')

@section('content')
@auth
@if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos'))
    <div class="content-wrapper" style="min-height: 243px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestión noticias</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Página web</a></li>
                            <li class="breadcrumb-item active">Agregar noticias</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <!-- Default box -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Agregar noticia</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <form action="{{url('/')}}/pagina_web/noticias" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="escenario" id="escenario" value="sistema">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Titulo</label>
                                                <input type="text" class="form-control" name="titulo" value="" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Categoria</label>
                                                <select class="form-control select2" style="width: 100%;" name="categoria" required>
                                                    <option selected="selected">Seleccionar...</option>
                                                    @foreach ($categorias as $key => $value)
                                                        <option value="{{ $value['id_categoria']}}">{{ $value["nombre_categoria"] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group text-center">
                                                <label for="exampleInputFile">Imagen de portada</label>
                                                <div class="form-group my-2 text-center">
                                                    <div class="btn btn-default btn-file">
                                                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de portada
                                                        <input type="file" name="portada_noticia" required>
                                                    </div>
                                                    <img class="previsualizarImg_portada_noticia img-fluid py-2">
                                                    <p class="help-block small">Dimensiones: 1024px * 250px | Peso Max. 2MB | Formato: JPG o PNG</p>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Descripción</label>
                                                <textarea class="form-control" rows="6" name="descripcion" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Palabras claves</label>
                                                <input type="text" class="form-control" name="palabras_claves" data-role="tagsinput" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Ruta</label>
                                                <input type="text" class="form-control inputRuta" name="ruta" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <label for="nameEditor">Contenido noticia</label>
                                                    <textarea class="form-control summernote-sm" name="contenido_noticia" rows="10"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-success col-md-6">
                                            <i class="fas fa-check"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
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
          icon: "warning"
      });
    </script>
  @endif
  @if (Session::has("ok-crear"))
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

  @endsection
