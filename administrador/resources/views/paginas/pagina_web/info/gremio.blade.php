@extends('plantilla')

@section('content')
    @auth
        @if (Auth::user()->rol == 'Administrador' ||
            Auth::user()->rol == 'Director general' ||
            Auth::user()->rol == 'Asistente de dirección')
            <div class="content-wrapper" style="min-height: 243px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Información del Gremio y Directivos</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Página web</a></li>
                                    <li class="breadcrumb-item active">Información del Gremio y Directivos</li>
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
                                @foreach ($pagina_web as $element)
                                @endforeach
                                <!-- Default box -->
                                <div class="card card-warning">
                                    <div class="card-header">
                                        <h3 class="card-title">Editar información de gremio y directivos</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <form action="{{ url('/') }}/pagina_web/info/gremio_directivos/{{ $element->id }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="historia">Digite o edite aquí el toda la información correspondiente a los directivos de la agremiación.</label>
                                                    <textarea class="form-control summernote-sm" name="gremio_directivos" rows="10">{{ $element->gremio_directivos }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-warning col-md-6" name="guardar" id="guardar">
                                                    <i class="fas fa-check"></i> Guardar
                                                </button>
                                            </div>
                                        </div>
                                        <!-- /.card-footer-->
                                    </form>
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
    @if (Session::has('no-validacion'))
        <script>
            swal({
                title: "¡Cuidado!",
                text: "Está intentando ingresar caracteres no validos.",
                type: "warning"
            });
        </script>
    @endif
    @if (Session::has('ok-editar'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "Información actualizada.",
                type: "success"
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            swal({
                title: "¡Error!",
                text: "Error al intentar actualizar.",
                type: "error"
            });
        </script>
    @endif
@endsection
