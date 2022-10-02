@extends('plantilla')

@section('content')
    @auth
        @if (Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Director general' || Auth::user()->rol == 'Asistente de dirección')
            <div class="content-wrapper" style="min-height: 243px;">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Gestión de información general</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Página web</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Información general</a>
                                    </li>
                                    <li class="breadcrumb-item active">Extra</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content">
                    @foreach ($pagina_web as $element)
                    @endforeach
                    <div class="content-fluid">
                        <form action="{{ url('/') }}/pagina_web/info/extra/{{ $element->id }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="listaAliados" id="listaAliados" value="{{ $element->aliados }}">
                            <input type="hidden" name="eliminar" id="eliminar" value="no">

                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Historia</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="historia">Digite o edite aquí la historia de la agremiación</label>
                                            <textarea class="form-control summernote-sm" name="historia" rows="10">{{ $element->historia }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-warning col-md-6" name="guardar" id="guardar">
                                            <i class="fas fa-check"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Actualidad</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="historia">Digite o edite aquí la actualidad de la agremiación</label>
                                            <textarea class="form-control summernote-sm" name="actualidad" rows="10">{{ $element->actualidad }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-warning col-md-6" name="guardar" id="guardar">
                                            <i class="fas fa-check"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Proyección</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label for="historia">Digite o edite aquí la proyección de la agremiación</label>
                                            <textarea class="form-control summernote-sm" name="proyeccion" rows="10">{{ $element->proyeccion }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-warning col-md-6" name="guardar" id="guardar">
                                            <i class="fas fa-check"></i> Guardar
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </section>
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
