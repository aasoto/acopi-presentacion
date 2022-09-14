@extends('plantilla')

@section('content')
    @auth
        @if (Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Subdirector de comunicaciones y eventos' || Auth::user()->rol == 'Director ejecutivo' || Auth::user()->rol == 'Asistente de dirección')
            <div class="content-wrapper" style="min-height: 243px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Gestión de eventos</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('afiliados/inicio') }}">Eventos</a></li>
                                    <li class="breadcrumb-item active">Calendario</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <input type="hidden" name="eventos" id="eventos" value="{{ $eventos }}">
                        <input type="hidden" name="totalEventos" id="totalEventos" value="{{ $total_eventos }}">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="card-title">Calendario</div>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 text-center">
                                    {{-- <button class="btn btn-default col-md-6" data-toggle="modal" data-target="#crearEvento">
                <i class="fas fa-calendar-alt"></i> Crear evento
              </button> --}}
                                    <div class="btn-group col-md-6">
                                        <button type="button" class="btn btn-default dropdown-toggle dropdown-icon"
                                            data-toggle="dropdown">
                                            <i class="fas fa-calendar-alt"></i> Crear evento
                                        </button>
                                        <div class="dropdown-menu col-md-12" role="menu">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#crearEvento">Evento</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" data-toggle="modal"
                                                data-target="#crearActividad">Actividad</a>
                                        </div>
                                    </div>
                                </div>
                                <div id="calendarioEventos"></div>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                </section>

            </div>

            <div class="modal" id="crearEvento">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div id="cabecera" class="modal-header bg-default">
                            <h4 class="modal-title">Crear Evento</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/') }}/eventos/general" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="tipo_evento" id="tipo_evento" value="evento">
                            <input type="hidden" name="escenario" id="escenario" value="sistema">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <label>Seleccionar un color para identificar el evento.<i style="color: red">*</i></label>
                                            </div>
                                            <div class="btn-group justify-content-center"
                                                style="width: 100%; margin-bottom: 10px;">
                                                <input type="hidden" name="color" id="color" value="" required>
                                                <ul class="fc-color-picker" id="color-chooser">
                                                    <li><a class="text-purple" href="#"><i id="purple-icono"
                                                                title="Purpura" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-indigo" href="#"><i id="indigo-icono"
                                                                title="Indigo" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-navy" href="#"><i id="navy-icono"
                                                                title="Azul marino" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-primary" href="#"><i id="primary-icono"
                                                                title="Azul primario" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-lightblue" href="#"><i id="lightblue-icono"
                                                                title="Azul cielo" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-info" href="#"><i id="info-icono"
                                                                title="Azul informativo" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-teal" href="#"><i id="teal-icono"
                                                                title="Verde menta" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-olive" href="#"><i id="olive-icono"
                                                                title="Verde oliva" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-success" href="#"><i id="success-icono"
                                                                title="Verde" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-lime" href="#"><i id="lime-icono"
                                                                title="Verde lima" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-warning" href="#"><i id="warning-icono"
                                                                title="Amarillo" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-orange" href="#"><i id="orange-icono"
                                                                title="Naranja" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-danger" href="#"><i id="danger-icono"
                                                                title="Rojo" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-maroon" href="#"><i id="maroon-icono"
                                                                title="Rojo granate" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-pink" href="#"><i id="pink-icono"
                                                                title="Rosa" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-fuchsia" href="#"><i id="fuchsia-icono"
                                                                title="Fucsia" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-light" href="#"><i id="light-icono"
                                                                title="Blanco" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-secondary" href="#"><i id="secondary-icono"
                                                                title="Secundario" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-gray" href="#"><i id="gray-icono"
                                                                title="Gris" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-gray-dark" href="#"><i id="gray-dark-icono"
                                                                title="Gris oscuro" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-black" href="#"><i id="black-icono"
                                                                title="Negro" class="fas fa-square"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Nombre del evento<i style="color: red">*</i></label>
                                            <input type="text" class="form-control" name="nombre" value=""
                                                required>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group text-center">
                                                <label for="exampleInputFile">Imagen de portada<i style="color: red">*</i></label>
                                                <div class="form-group my-2 text-center">
                                                    <div class="btn btn-default btn-file">
                                                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de portada
                                                        <input type="file" name="portada_evento" required>
                                                    </div>
                                                    <img class="previsualizarImg_portada_evento img-fluid py-2">
                                                    <p class="help-block small">Dimensiones: 1024px * 250px | Peso Max. 2MB |
                                                        Formato: JPG o PNG</p>
                                                </div>
                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Descripción<i style="color: red">*</i></label>
                                                <textarea class="form-control" rows="6" name="descripcion" required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Palabras claves<i style="color: red">*</i></label>
                                                <input type="text" class="form-control" name="palabras_claves"
                                                    data-role="tagsinput" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Ruta<i style="color: red">*</i></label>
                                                <input type="text" class="form-control inputRuta" name="ruta"
                                                    value="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="nameEditor">Contenido noticia<i style="color: red">*</i></label>
                                                <textarea class="form-control summernote-sm" name="contenido_noticia" rows="10" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Ponentes</label>
                                            <textarea class="form-control" name="ponentes" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Patrocinadores</label>
                                            <textarea class="form-control" name="patrocinadores" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Número participantes</label>
                                            <input type="number" class="form-control" name="num_participantes"
                                                value="">
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input todo-dia" type="checkbox" id="todo-dia">
                                                <input type="hidden" name="allDay" id="allDay" value="false">
                                                <label class="form-check-label" for="todo-dia"> El evento durará todo el
                                                    día.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Fecha inicio<i style="color: red">*</i></label>
                                            <input type="date" class="form-control" name="fecha-inicio" value=""
                                            min="@php echo date('Y-m-d') @endphp" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Hora inicio</label>
                                            <input type="time" class="form-control" name="hora-inicio" id="hora-inicio"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Fecha final</label>
                                            <input type="date" class="form-control" name="fecha-final" id="fecha-final"
                                                value="" min="@php echo date('Y-m-d') @endphp">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Hora final</label>
                                            <input type="time" class="form-control" name="hora-final" id="hora-final"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pie" class="modal-footer col-md-12 justify-content-between">
                                <button id="cerrar" type="button" class="btn btn-default col-md-3"
                                    data-dismiss="modal">Cerrar</button>
                                <button id="guardar" type="submit" class="btn btn-default col-md-3">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <div class="modal" id="crearActividad">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div id="actividad-cabecera" class="modal-header bg-default">
                            <h4 class="modal-title">Crear Actividad</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/') }}/eventos/general" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="tipo_evento" id="tipo_evento" value="actividad">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <label>Seleccionar un color para identificar la actividad.<i style="color: red">*</i></label>
                                            </div>
                                            <div class="btn-group justify-content-center"
                                                style="width: 100%; margin-bottom: 10px;">
                                                <input type="hidden" name="actividad-color" id="actividad-color"
                                                    value="" required>
                                                <ul class="fc-color-picker" id="color-chooser">
                                                    <li><a class="text-purple" href="#"><i id="actividad-purple-icono"
                                                                title="Purpura" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-indigo" href="#"><i id="actividad-indigo-icono"
                                                                title="Indigo" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-navy" href="#"><i id="actividad-navy-icono"
                                                                title="Azul marino" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-primary" href="#"><i
                                                                id="actividad-primary-icono" title="Azul primario"
                                                                class="fas fa-square"></i></a></li>
                                                    <li><a class="text-lightblue" href="#"><i
                                                                id="actividad-lightblue-icono" title="Azul cielo"
                                                                class="fas fa-square"></i></a></li>
                                                    <li><a class="text-info" href="#"><i id="actividad-info-icono"
                                                                title="Azul informativo" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-teal" href="#"><i id="actividad-teal-icono"
                                                                title="Verde menta" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-olive" href="#"><i id="actividad-olive-icono"
                                                                title="Verde oliva" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-success" href="#"><i
                                                                id="actividad-success-icono" title="Verde"
                                                                class="fas fa-square"></i></a></li>
                                                    <li><a class="text-lime" href="#"><i id="actividad-lime-icono"
                                                                title="Verde lima" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-warning" href="#"><i
                                                                id="actividad-warning-icono" title="Amarillo"
                                                                class="fas fa-square"></i></a></li>
                                                    <li><a class="text-orange" href="#"><i id="actividad-orange-icono"
                                                                title="Naranja" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-danger" href="#"><i id="actividad-danger-icono"
                                                                title="Rojo" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-maroon" href="#"><i id="actividad-maroon-icono"
                                                                title="Rojo granate" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-pink" href="#"><i id="actividad-pink-icono"
                                                                title="Rosa" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-fuchsia" href="#"><i
                                                                id="actividad-fuchsia-icono" title="Fucsia"
                                                                class="fas fa-square"></i></a></li>
                                                    <li><a class="text-light" href="#"><i id="actividad-light-icono"
                                                                title="Blanco" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-secondary" href="#"><i
                                                                id="actividad-secondary-icono" title="Secundario"
                                                                class="fas fa-square"></i></a></li>
                                                    <li><a class="text-gray" href="#"><i id="actividad-gray-icono"
                                                                title="Gris" class="fas fa-square"></i></a></li>
                                                    <li><a class="text-gray-dark" href="#"><i
                                                                id="actividad-gray-dark-icono" title="Gris oscuro"
                                                                class="fas fa-square"></i></a></li>
                                                    <li><a class="text-black" href="#"><i id="actividad-black-icono"
                                                                title="Negro" class="fas fa-square"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Nombre de la actividad<i style="color: red">*</i></label>
                                            <input type="text" class="form-control" name="nombre" value=""
                                                required>
                                            <label>Tematica</label>
                                            <textarea class="form-control" name="tematica" rows="8"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Ponentes</label>
                                            <textarea class="form-control" name="ponentes" rows="3"></textarea>
                                            <label>Patrocinadores</label>
                                            <textarea class="form-control" name="patrocinadores" rows="3"></textarea>
                                            <label>Número participantes</label>
                                            <input type="number" class="form-control" name="num_participantes"
                                                value="">
                                        </div>
                                    </div>
                                    <hr class="my-4">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input todo-dia" type="checkbox" id="todo-dia">
                                                <input type="hidden" name="allDay" id="allDay" value="false">
                                                <label class="form-check-label" for="todo-dia"> La actividad durará todo el
                                                    día.</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Fecha inicio<i style="color: red">*</i></label>
                                            <input type="date" class="form-control" name="fecha-inicio" value=""
                                            min="@php echo date('Y-m-d') @endphp" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Hora inicio</label>
                                            <input type="time" class="form-control" name="hora-inicio" id="hora-inicio"
                                                value="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Fecha final</label>
                                            <input type="date" class="form-control" name="fecha-final" id="fecha-final"
                                                value="" min="@php echo date('Y-m-d') @endphp">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Hora final</label>
                                            <input type="time" class="form-control" name="hora-final" id="hora-final"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="actividad-pie" class="modal-footer col-md-12 justify-content-between">
                                <button id="actividad-cerrar" type="button" class="btn btn-default col-md-3"
                                    data-dismiss="modal">Cerrar</button>
                                <button id="actividad-guardar" type="submit"
                                    class="btn btn-default col-md-3">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            @if (isset($status))
                @if ($status == 200)
                    @foreach ($evento as $key => $value)
                        <div class="modal" id="verEvento">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header" style='background: {{ $value['backgroundColor'] }};'>
                                        @if ($value['backgroundColor'] == '#01ff70' || $value['backgroundColor'] == '#ffc107' || $value['backgroundColor'] == '#ff851b' || $value['backgroundColor'] == '#1f2d3d')
                                            <h4 class="modal-title">{{ $value['nombre'] }}</h4>
                                        @else
                                            <h4 class="modal-title text-white">{{ $value['nombre'] }}</h4>
                                        @endif
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Tematica: </label>
                                                    <p>{{ $value['tematica'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Ponentes: </label> {{ $value['ponentes'] }}
                                                <br>
                                                <label>Patrocinadores: </label> {{ $value['patrocinadores'] }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Número de participantes: </label> {{ $value['num_participantes'] }}
                                            </div>
                                            <div class="col-md-6">

                                            </div>
                                        </div>
                                        @if ($value['allDay'] == 'true')
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Evento todo el día: </label> {{ $value['fecha_inicio'] }}
                                                </div>
                                            </div>
                                        @else
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Inicia: </label> {{ $value['fecha_inicio'] }} a las
                                                    {{ $value['hora_inicio'] }}
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Finaliza: </label> {{ $value['fecha_final'] }} a las
                                                    {{ $value['hora_final'] }}
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                    <div class="modal-footer col-md-12 justify-content-between"
                                        style="background: {{ $value['backgroundColor'] }};">
                                        @php
                                            echo '
                        <button id="eliminarEvento" type="button" class="btn btn-outline-light col-md-3 eliminarEvento" action="'.url()->current().'" method="DELETE" pagina="eventos/general" token="'.csrf_token().'">Eliminar</button>';
                                        @endphp
                                        <button id="editar" type="button" class="btn btn-outline-light col-md-3"
                                            data-toggle="modal" data-target="#editarEvento"
                                            data-dismiss="modal">Editar</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    @endforeach
                    <script>
                        $("#verEvento").modal();
                    </script>
                    <div class="modal" id="editarEvento">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div id="editar-cabecera" class="modal-header bg-default">
                                    @if ($value['backgroundColor'] == '#01ff70' || $value['backgroundColor'] == '#ffc107' || $value['backgroundColor'] == '#ff851b' || $value['backgroundColor'] == '#1f2d3d')
                                        <h4 class="modal-title">Editar Evento</h4>
                                    @else
                                        <h4 class="modal-title text-white">Editar Evento</h4>
                                    @endif
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ url('/') }}/eventos/general/{{ $value['id'] }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="text-center">
                                                        <label>Seleccionar un color para identificar el evento.<i style="color: red">*</i></label>
                                                    </div>
                                                    <div class="btn-group justify-content-center"
                                                        style="width: 100%; margin-bottom: 10px;">
                                                        <input type="hidden" name="editar-color" id="editar-color"
                                                            value="{{ $value['backgroundColor'] }}" required>
                                                        <ul class="fc-color-picker" id="color-chooser">
                                                            <li><a class="editar-purple text-purple" href="#"><i
                                                                        id="editar-purple-icono" title="Purpura"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-indigo text-indigo" href="#"><i
                                                                        id="editar-indigo-icono" title="Indigo"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-navy text-navy" href="#"><i
                                                                        id="editar-navy-icono" title="Azul marino"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-primary text-primary" href="#"><i
                                                                        id="editar-primary-icono" title="Azul primario"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-lightblue text-lightblue" href="#"><i
                                                                        id="editar-lightblue-icono" title="Azul cielo"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-info text-info" href="#"><i
                                                                        id="editar-info-icono" title="Azul informativo"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-teal text-teal" href="#"><i
                                                                        id="editar-teal-icono" title="Verde menta"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-olive text-olive" href="#"><i
                                                                        id="editar-olive-icono" title="Verde oliva"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-success text-success" href="#"><i
                                                                        id="editar-success-icono" title="Verde"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-lime text-lime" href="#"><i
                                                                        id="editar-lime-icono" title="Verde lima"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-warning text-warning" href="#"><i
                                                                        id="editar-warning-icono" title="Amarillo"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-orange text-orange" href="#"><i
                                                                        id="editar-orange-icono" title="Naranja"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-danger text-danger" href="#"><i
                                                                        id="editar-danger-icono" title="Rojo"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-maroon text-maroon" href="#"><i
                                                                        id="editar-maroon-icono" title="Rojo granate"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-pink text-pink" href="#"><i
                                                                        id="editar-pink-icono" title="Rosa"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-fuchsia text-fuchsia" href="#"><i
                                                                        id="editar-fuchsia-icono" title="Fucsia"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-light text-light" href="#"><i
                                                                        id="editar-light-icono" title="Blanco"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-secondary text-secondary" href="#"><i
                                                                        id="editar-secondary-icono" title="Secundario"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-gray text-gray" href="#"><i
                                                                        id="editar-gray-icono" title="Gris"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-gray-dark text-gray-dark" href="#"><i
                                                                        id="editar-gray-dark-icono" title="Gris oscuro"
                                                                        class="fas fa-square"></i></a></li>
                                                            <li><a class="editar-black text-black" href="#"><i
                                                                        id="editar-black-icono" title="Negro"
                                                                        class="fas fa-square"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Nombre del evento<i style="color: red">*</i></label>
                                                    <input type="text" class="form-control" name="editar-nombre"
                                                        value="{{ $value['nombre'] }}" required>
                                                    <label>Tematica</label>
                                                    <textarea class="form-control" name="editar-tematica" rows="8">{{ $value['tematica'] }}</textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Ponentes</label>
                                                    <textarea class="form-control" name="editar-ponentes" rows="3">{{ $value['ponentes'] }}</textarea>
                                                    <label>Patrocinadores</label>
                                                    <textarea class="form-control" name="editar-patrocinadores" rows="3">{{ $value['patrocinadores'] }}</textarea>
                                                    <label>Número participantes</label>
                                                    <input type="number" class="form-control"
                                                        name="editar-num_participantes"
                                                        value="{{ $value['num_participantes'] }}">
                                                </div>
                                            </div>
                                            <hr class="my-4">
                                            <div class="row">
                                                <div class="col-md-12 text-center">
                                                    <div class="form-check form-switch">
                                                        @if ($value['allDay'] == 'true')
                                                            <input class="form-check-input editar-todo-dia" type="checkbox"
                                                                id="todo-dia" checked>
                                                            <input type="hidden" name="editar-allDay" id="editar-allDay"
                                                                value="true">
                                                        @else
                                                            <input class="form-check-input editar-todo-dia" type="checkbox"
                                                                id="todo-dia">
                                                            <input type="hidden" name="editar-allDay" id="editar-allDay"
                                                                value="false">
                                                        @endif

                                                        <label class="form-check-label" for="todo-dia"> El evento durará todo
                                                            el día.</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Fecha inicio<i style="color: red">*</i></label>
                                                    <input type="date" class="form-control" name="editar-fecha-inicio"
                                                        value="{{ $value['fecha_inicio'] }}" min="@php echo date('Y-m-d') @endphp" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Hora inicio</label>
                                                    <input type="time" class="form-control" name="editar-hora-inicio"
                                                        id="editar-hora-inicio" value="{{ $value['hora_inicio'] }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Fecha final</label>
                                                    <input type="date" class="form-control" name="editar-fecha-final"
                                                        id="editar-fecha-final" value="{{ $value['fecha_final'] }}" min="@php echo date('Y-m-d') @endphp">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Hora final</label>
                                                    <input type="time" class="form-control" name="editar-hora-final"
                                                        id="editar-hora-final" value="{{ $value['hora_final'] }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="editar-pie" class="modal-footer col-md-12 justify-content-between">
                                        <button id="editar-cerrar" type="button" class="btn btn-default col-md-3"
                                            data-dismiss="modal">Cerrar</button>
                                        <button id="editar-guardar" type="submit"
                                            class="btn btn-default col-md-3">Guardar</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $("#editar-cabecera").css("background", "{{ $value['backgroundColor'] }}");
                            $("#editar-pie").css("background", "{{ $value['backgroundColor'] }}");
                            if (("{{ $value['backgroundColor'] }}" == "#01ff70") || ("{{ $value['backgroundColor'] }}" ==
                                    "#ffc107") || ("{{ $value['backgroundColor'] }}" == "#ff851b") || (
                                    "{{ $value['backgroundColor'] }}" == "#1f2d3d")) {
                                $('#editar-cerrar').removeClass();
                                $('#editar-cerrar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
                                {{-- $("#editar-cerrar").css("background-color", "{{$value["backgroundColor"]}}"); --}}
                                $('#editar-guardar').removeClass();
                                $('#editar-guardar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
                                {{-- $("#editar-guardar").css("background-color", "{{$value["backgroundColor"]}}"); --}}
                                $('#eliminarEvento').removeClass();
                                $('#eliminarEvento').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark").addClass(
                                    "eliminarEvento");
                                $('#editar').removeClass();
                                $('#editar').addClass("btn").addClass("col-md-3").addClass("btn-outline-dark");
                            }
                        });
                    </script>
                @else
                    {{ $status }}
                @endif
            @endif
        @else
            @include('paginas/errores/401')
        @endif
    @endauth

    @if (Session::has('error'))
        <script>
            swal({
                title: "¡Error!",
                text: "Formulario vacio.",
                type: "error"
            });
        </script>
    @endif
    @if (Session::has('no-validacion'))
        <script>
            swal({
                title: "¡Error!",
                text: "Está ingresando caracteres no validos o no ha seleccionado un color para el evento.",
                type: "error"
            });
        </script>
    @endif
    @if (Session::has('no-validacion-2'))
        <script>
            swal({
                title: "¡Error!",
                text: "Está ingresando caracteres no validos en alguno de los campos secundarios.",
                type: "error"
            });
        </script>
    @endif
    @if (Session::has('ok-crear'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "El evento ha sido guardado correctamente.",
                type: "success"
            });
        </script>
    @endif
    @if (Session::has('ok-actualizar'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "Evento actualizado correctamente.",
                type: "success"
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            swal({
                title: "¡Error!",
                text: "No se puedo borrar el evento.",
                type: "error"
            });
        </script>
    @endif

@endsection
