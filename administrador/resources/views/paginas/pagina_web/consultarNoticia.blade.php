@extends('plantilla')

@section('content')
@auth
@if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos') || (Auth::user()->rol == 'Asistente de dirección') || (Auth::user()->rol == 'Subdirector de desarrollo empresarial') || (Auth::user()->rol == 'Director ejecutivo'))
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
                            <li class="breadcrumb-item active">Consultar noticias</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Consultar noticia</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 text-center">
                                    <a href="{{ url('/') }}/pagina_web/noticias">
                                        <button type="submit" class="btn btn-success col-md-5">
                                            <i class="fas fa-plus"></i> Nueva Noticia
                                        </button>
                                    </a>
                                    <a href="{{ route('categorias.index') }}">
                                        <button type="submit" class="btn btn-default col-md-5">
                                            <i class="fas fa-edit"></i> Editar categorías
                                        </button>
                                    </a>
                                </div>
                                <br>
                                <table id="tablaNoticias" class="table table-bordered table-striped dt-responsive">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Titulo</th>
                                            <th>Categoría</th>
                                            <th>Descripción</th>
                                            <th>Destacado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Titulo</th>
                                            <th>Categoría</th>
                                            <th>Descripción</th>
                                            <th>Destacado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!--============================================
    =            Editar noticia            =
    ============================================-->

    @if (isset($status))
    @if ($status == 200)
        @foreach ($noticia as $key => $value)

            <div class="modal fade" id="editarNoticia">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <form method="POST" action="{{url('/')}}/pagina_web/consultarNoticia/{{$value["id"]}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" id="escenario" name="escenario" value="sistema">
                            <div class="modal-header bg-warning">
                                <h4 class="modal-title">Editar Noticia</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Titulo</label>
                                            <input type="text" class="form-control" name="titulo" value="{{ $value["titulo"] }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Categoria</label>
                                            <select class="form-control select2" style="width: 100%;" name="categoria" required>
                                                @php
                                                    foreach ($categorias as $element) {
                                                        if ($element->id_categoria == $value["categoria"]) {
                                                            echo '<option selected="'.$value["categoria"].'" value="'.$value["categoria"].'">'.$element->nombre_categoria.'</option>';
                                                        }else{
                                                            echo '<option value="'.$element->id_categoria.'">'.$element->nombre_categoria.'</option>';
                                                        }
                                                    }
                                                @endphp
                                            </select>
                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <div class="form-group text-center">
                                        <label for="exampleInputFile">Imagen de portada</label>
                                            <div class="form-group my-2 text-center">
                                                <div class="btn btn-default btn-file">
                                                    <i class="fas fa-paperclip"></i> Adjuntar Imagen de portada
                                                    <input type="file" name="portada_noticia">
                                                </div>
                                                <br>
                                                <img src="{{url('/')}}/{{$value["portada_noticia"]}}" class="previsualizarImg_portada_noticia img-fluid py-2" width="200" height="133">
                                                <p class="help-block small">Dimensiones: 2000px * 1333px | Peso Max. 2MB | Formato: JPG o PNG</p>
                                                <input type="hidden" name="portada_noticia_actual" value="{{$value["portada_noticia"]}}" required>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Descripción</label>
                                            <textarea class="form-control" rows="6" name="descripcion" required>{{$value["descripcion_noticia"]}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Palabras claves</label>
                                            @php
                                                $tags = json_decode($value["p_claves_noticia"], true);
                                                $palabras_claves = "";
                                                foreach ($tags as $key => $consulta) {
                                                $palabras_claves .= $consulta.",";
                                                }
                                            @endphp
                                            <input type="text" class="form-control" name="palabras_claves" data-role="tagsinput" value="{{$palabras_claves}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Ruta</label>
                                            <input type="text" class="form-control inputRuta" name="ruta" value="{{ $value["ruta_noticia"] }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nameEditor">Contenido noticia</label>
                                            <textarea class="form-control summernote-sm" name="contenido_noticia" rows="10">{{$value["contenido_noticia"]}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer col-md-12 justify-content-between">
                                <button type="button" class="btn btn-danger col-md-5" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary col-md-5">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        @endforeach

        <script>
        $("#editarNoticia").modal();
        </script>

        @else

        {{$status}}

    @endif

    @endif

    <!--=====  End of Editar noticia  ======-->
@else
    @include('paginas/errores/401')
@endif
@endauth


<!--==========================================
=            Sección de alertas            =
==========================================-->

@if (Session::has("no-validacion"))

<script>
  swal({
    title: "¡Error!",
    text: "¡Hay campos no válidos en el formulario!",
    type: "error"
  });
</script>

@endif

@if (Session::has("data-empty"))

<script>
  swal({
    title: "¡Error!",
    text: "No hay datos en el formulario.",
    type: "error"
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

@if (Session::has("no-borrar"))

<script>
  swal({
    title: "¡Error!",
    text: "Esta noticia no se puede eliminar.",
    type: "error"
  });
</script>

@endif

@if (Session::has("ok-eliminar"))

  <script>
    swal({
      title: "¡Bien Hecho!",
      text: "Noticia eliminado.",
      type: "success"
    });
 </script>

@endif

<!--=====  End of Sección de alertas  ======-->

@endsection
