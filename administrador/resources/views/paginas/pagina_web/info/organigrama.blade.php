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
                                    <li class="breadcrumb-item active">Organigrama</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="content">
                    @foreach ($pagina_web as $element)
                    @endforeach
                    <div class="content-fluid">
                        <form action="{{ url('/') }}/pagina_web/info/organigrama/{{ $element->id }}" method="post"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Organigrama</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <label for="exampleInputFile">Imagen del organigrama</label>
                                            <div class="form-group my-2 text-center">
                                                <div class="btn btn-default btn-file">
                                                    <i class="fas fa-paperclip"></i> Adjuntar Imagen
                                                    <input type="file" name="organigrama" value="">
                                                    <input type="hidden" name="organigrama_actual" id="organigrama_actual" value="{{$element->organigrama}}">
                                                </div>
                                                <br>
                                                <br>
                                                <img src="@php if(isset($element->organigrama)){echo url('/').'/'.$element->organigrama;} @endphp" class="previsualizarImg_organigrama img-fluid py-2">
                                                <p class="help-block small">Peso Max. 2MB | Formato: JPG o PNG</p>
                                            </div>
                                            <br>
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
