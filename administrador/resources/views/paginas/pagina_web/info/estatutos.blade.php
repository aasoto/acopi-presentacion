@extends('plantilla')

@section('content')
    @auth
        @if (Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Director general' || Auth::user()->rol == 'Asistente de dirección')
            <div class="content-wrapper" style="min-height: 243px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Estatutos y código de ética</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Página web</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Información general</a></li>
                                    <li class="breadcrumb-item active">Estatutos</li>
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
                                <form action="{{ url('/') }}/pagina_web/info/estatutos/{{ $element->id }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <!-- Default box -->
                                    <div class="card card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Estatutos</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Documento estatutos</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="estatutos_doc" id="estatutos_doc">
                                                                @if (isset($element->estatutos_doc))
                                                                    <label class="custom-file-label" for="exampleInputFile">estatutos-acopi-cesar.pdf</label>
                                                                @else
                                                                    <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo formato PDF</label>
                                                                @endif
                                                                <input type="hidden" name="actual_estatutos_doc" id="actual_estatutos_doc" value="{{$element->estatutos_doc}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for=""></label>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        @if ($element->watch_estatutos_doc)
                                                            <input class="form-check-input verEstatutos" type="checkbox" role="switch" value="" name="checkbox_estatutos_doc" id="checkbox_estutos_doc" checked>
                                                        @else
                                                            <input class="form-check-input verEstatutos" type="checkbox" role="switch" value="" name="checkbox_estatutos_doc" id="checkbox_estutos_doc">
                                                        @endif
                                                        <label class="form-check-label" for="checkbox_estatutos_doc">
                                                            Ver documento
                                                        </label>
                                                        <input type="hidden" name="watch_estatutos_doc" id="watch_estatutos_doc" value="{{$element->watch_estatutos_doc}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="estatutos_text">Digite información adicional sobre los estatutos</label>
                                                        <textarea class="form-control summernote-sm" name="estatutos_text" rows="10">{{ $element->estatutos_text }}</textarea>
                                                    </div>
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
                                    </div>
                                    <!-- /.card -->

                                    <!-- Default box -->
                                    <div class="card card-warning">
                                        <div class="card-header">
                                            <h3 class="card-title">Código de ética</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Documento código de ética</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="codigo_etica_doc" id="codigo_etica_doc">
                                                                @if (isset($element->codigo_etica_doc))
                                                                    <label class="custom-file-label" for="exampleInputFile">codigo-de-etica-acopi-cesar.pdf</label>
                                                                @else
                                                                    <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo formato PDF</label>
                                                                @endif
                                                                <input type="hidden" name="actual_codigo_etica_doc" id="actual_codigo_etica_doc" value="{{$element->codigo_etica_doc}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for=""></label>
                                                    </div>
                                                    <div class="form-check form-switch">
                                                        @if ($element->watch_codigo_etica_doc)
                                                            <input class="form-check-input verCodigoEtica" type="checkbox" role="switch" value="" id="checkbox_codigo_etica_doc" checked>
                                                        @else
                                                            <input class="form-check-input verCodigoEtica" type="checkbox" role="switch" value="" id="checkbox_codigo_etica_doc">
                                                        @endif
                                                        <label class="form-check-label" for="checkbox_codigo_etica_doc">
                                                            Ver documento
                                                        </label>
                                                        <input type="hidden" name="watch_codigo_etica_doc" id="watch_codigo_etica_doc" value="{{$element->watch_codigo_etica_doc}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label for="codigo_etica_text">Digite información adicional sobre los estatutos</label>
                                                        <textarea class="form-control summernote-sm" name="codigo_etica_text" rows="10">{{ $element->estatutos_text }}</textarea>
                                                    </div>
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
                                    </div>
                                    <!-- /.card -->
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <script>
                $(function() {
                    //File-input
                    bsCustomFileInput.init();
                })
            </script>
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
    @if (Session::has('no-pdf'))
        <script>
            swal({
                title: "¡Error!",
                text: "El documento que desea subir no está en formato PDF, porfavor intente de nuevo.",
                type: "error"
            });
        </script>
    @endif
@endsection
