@extends('plantilla')

@section('content')
    @auth
        @if (Auth::user()->rol == 'Administrador' ||
            Auth::user()->rol == 'Director ejecutivo' ||
            Auth::user()->rol == 'Subdirector de desarrollo empresarial')
            <div class="content-wrapper" style="min-height: 243px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Gestión de citas</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                                    <li class="breadcrumb-item">Citas</li>
                                    <li class="breadcrumb-item active">Calendario</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <input type="hidden" id="citas_afiliados" name="citas_afiliados" value="{{ $citas_afiliados }}">
                        <input type="hidden" name="totalCitasAfiliados" id="totalCitasAfiliados"
                            value="{{ $total_citas_afiliados }}">
                        <input type="hidden" id="citas_interesados" name="citas_interesados" value="{{ $citas_interesados }}">
                        <input type="hidden" name="totalCitasInteresados" id="totalCitasInteresados"
                            value="{{ $total_citas_interesados }}">
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
                                    <button class="btn btn-success col-md-6 agregarCita">
                                        <i class="fas fa-calendar-alt"></i> Agendar cita
                                    </button>
                                </div>
                                <div id="calendarioCitas"></div>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                </section>

            </div>

            <div class="modal" id="crearCitaAfiliado">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div id="cabecera" class="modal-header bg-success">
                            <h4 class="modal-title">Agendar cita</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table id="tablaAgendarCita" class="table table-bordered table-hover dt-responsive">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Documento</th>
                                        <th>Afiliado</th>
                                        <th>NIT</th>
                                        <th>Empresa</th>
                                        <th>Agenda</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Documento</th>
                                        <th>Afiliado</th>
                                        <th>NIT</th>
                                        <th>Empresa</th>
                                        <th>Agenda</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div id="pie" class="modal-footer col-md-12 justify-content-between">
                            <button id="cerrar" type="button" class="btn btn-default col-md-3"
                                data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <div class="modal" id="crearCitaAfiliado2">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div id="cabecera" class="modal-header bg-success">
                            <h4 class="modal-title">Agendar cita</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/') }}/citas/general" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" id="soy_afiliado" name="soy_afiliado">
                                            <input type="hidden" id="id_empresa" name="id_empresa">
                                            <label>NIT</label>
                                            <input type="text" class="form-control" id="nit" name="nit" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Razon social</label>
                                            <input type="text" class="form-control" id="razon_social" name="razon_social"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Identificación afiliado<i style="color: red">*</i></label>
                                            <input type="text" class="form-control" id="identificacion"
                                                name="identificacion" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Afiliado</label>
                                            <input type="text" class="form-control" id="afiliado" name="afiliado"
                                                readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Fecha<i style="color: red">*</i></label>
                                            <input type="date" class="form-control" id="fecha" name="fecha"
                                            min="@php echo date('Y-m-d') @endphp" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Hora<i style="color: red">*</i></label>
                                            <input type="time" class="form-control" id="hora" name="hora"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Área<i style="color: red">*</i></label>
                                            <select class="form-control" id="area" name="area" required>
                                                <option value="">Seleccionar... </option>
                                                @foreach ($roles as $key => $value)
                                                    <option value="{{ $value['rol'] }}">{{ $value['rol'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pie" class="modal-footer col-md-12 justify-content-between">
                                <button id="cerrar" type="button" class="btn btn-default col-md-3"
                                    data-dismiss="modal">Cerrar</button>
                                <button id="guardar" type="submit" class="btn btn-success col-md-3">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <div class="modal" id="crearCitaInteresado">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div id="cabecera" class="modal-header bg-success">
                            <h4 class="modal-title">Agendar cita</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ url('/') }}/citas/general" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <input type="hidden" id="soy_interesado" name="soy_interesado">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Identificación<i style="color: red">*</i></label>
                                            <input type="number" class="form-control" id="identificacion"
                                                name="identificacion">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Nombres y apellidos<i style="color: red">*</i></label>
                                            <input type="text" class="form-control" id="nombres" name="nombres">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Fecha<i style="color: red">*</i></label>
                                            <input type="date" class="form-control" id="fecha" name="fecha"
                                            min="@php echo date('Y-m-d') @endphp" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Hora<i style="color: red">*</i></label>
                                            <input type="time" class="form-control" id="hora" name="hora"
                                                required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Área<i style="color: red">*</i></label>
                                            <select class="form-control" id="area" name="area" required>
                                                <option value="">Seleccionar... </option>
                                                @foreach ($roles as $key => $value)
                                                    <option value="{{ $value['rol'] }}">{{ $value['rol'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="pie" class="modal-footer col-md-12 justify-content-between">
                                <button id="cerrar" type="button" class="btn btn-default col-md-3"
                                    data-dismiss="modal">Cerrar</button>
                                <button id="guardar" type="submit" class="btn btn-success col-md-3">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            @if (isset($status))
                @if ($status == 200)
                    @foreach ($cita as $key => $value)
                        <div class="modal" id="infoCita">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h4 class="modal-title">Información cita</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="row">
                                                @if ($value['tipo_usuario_cita'] == 'afiliado')
                                                    <div class="col-md-6">
                                                        @php
                                                            $nombre_afiliado = $value['primer_nombre'] . ' ' . $value['segundo_nombre'] . ' ' . $value['primer_apellido'] . ' ' . $value['segundo_apellido'];
                                                        @endphp
                                                        <label>Afiliado: </label> {{ $nombre_afiliado }}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Empresa: </label> {{ $value['razon_social'] }}
                                                    </div>
                                                @endif
                                                @if ($value['tipo_usuario_cita'] == 'interesado')
                                                    <div class="col-md-6">
                                                        <label>Identificación: </label> {{ $value['cc_interesado'] }}
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Nombres y apellidos: </label> {{ $value['nombre_interesado'] }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Fecha: </label> {{ $value['fecha_cita'] }}
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Hora: </label> {{ $value['hora_cita'] }}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Área: </label> {{ $value['area'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer col-md-12 justify-content-between">
                                        @php
                                            echo '<button type="button" class="btn btn-default col-md-3 eliminarCita" action="'.url()->current().'" method="DELETE" pagina="citas/general" token="'.csrf_token().'">Eliminar</button>';
                                        @endphp
                                        <button type="button" class="btn btn-primary col-md-3" data-toggle="modal"
                                            data-target="#editarCita">Editar</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    @endforeach
                    <script>
                        $("#infoCita").modal();
                    </script>

                    @foreach ($cita as $key => $value)
                        <div class="modal" id="editarCita">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h4 class="modal-title">Editar cita</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('/') }}/citas/general/{{ $value['id'] }}" method="post"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                @if ($value['tipo_usuario_cita'] == 'afiliado')
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input type="hidden" id="soy_afiliado" name="soy_afiliado"
                                                                value="true">
                                                            <input type="hidden" id="id_empresa" name="id_empresa"
                                                                value="{{ $value['id_empresa'] }}">
                                                            <label>NIT</label>
                                                            <input type="text" class="form-control" id="nit"
                                                                name="nit" value="{{ $value['nit_empresa'] }}" readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Razon social</label>
                                                            <input type="text" class="form-control" id="razon_social"
                                                                name="razon_social" value="{{ $value['razon_social'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Identificación afiliado<i style="color: red">*</i></label>
                                                            <input type="text" class="form-control" id="identificacion"
                                                                name="identificacion" value="{{ $value['cc_rprt_legal'] }}"
                                                                readonly>
                                                        </div>
                                                        <div class="col-md-6">
                                                            @php
                                                                $nombre = $value['primer_nombre'] . ' ' . $value['segundo_nombre'] . ' ' . $value['primer_apellido'] . ' ' . $value['segundo_apellido'];
                                                            @endphp
                                                            <label>Afiliado</label>
                                                            <input type="text" class="form-control" id="afiliado"
                                                                name="afiliado" value="{{ $nombre }}" readonly>
                                                        </div>
                                                    </div>
                                                @endif
                                                @if ($value['tipo_usuario_cita'] == 'interesado')
                                                    <input type="hidden" id="soy_interesado" name="soy_interesado"
                                                        value="true">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Identificación<i style="color: red">*</i></label>
                                                            <input type="number" class="form-control" id="identificacion"
                                                                name="identificacion" value="{{ $value['cc_interesado'] }}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Nombres y apellidos<i style="color: red">*</i></label>
                                                            <input type="text" class="form-control" id="nombres"
                                                                name="nombres" value="{{ $value['nombre_interesado'] }}">
                                                        </div>
                                                    </div>
                                                @endif
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Fecha<i style="color: red">*</i></label>
                                                        <input type="date" class="form-control" id="fecha"
                                                            name="fecha" value="{{ $value['fecha_cita'] }}" min="@php echo date('Y-m-d') @endphp" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Hora<i style="color: red">*</i></label>
                                                        <input type="time" class="form-control" id="hora"
                                                            name="hora" value="{{ $value['hora_cita'] }}" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Área<i style="color: red">*</i></label>
                                                        <select class="form-control" id="area" name="area" required>
                                                            <option value="{{ $value['area'] }}">{{ $value['area'] }}
                                                            </option>
                                                            @foreach ($roles as $key => $rol)
                                                                @if ($value['area'] != $rol['rol'])
                                                                    <option value="{{ $rol['rol'] }}">{{ $rol['rol'] }}
                                                                    </option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Estado<i style="color: red">*</i></label>
                                                        <select class="form-control" id="estado" name="estado" required>
                                                            <option value="{{ $value['estado_cita'] }}">
                                                                {{ $value['estado_cita'] }}</option>
                                                            @if ($value['estado_cita'] != 'atendida')
                                                                <option value="atendida">atendida</option>
                                                            @endif
                                                            @if ($value['estado_cita'] != 'perdida')
                                                                <option value="perdida">perdida</option>
                                                            @endif
                                                            @if ($value['estado_cita'] != 'cancelada')
                                                                <option value="cancelada">cancelada</option>
                                                            @endif
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer col-md-12 justify-content-between">
                                            <button id="cerrar" type="button" class="btn btn-default col-md-3"
                                                data-dismiss="modal">Cerrar</button>
                                            <button id="guardar" type="submit"
                                                class="btn btn-warning col-md-3">Guardar</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                    @endforeach
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
                text: "Está ingresando caracteres no validos.",
                type: "error"
            });
        </script>
    @endif
    @if (Session::has('ok-crear'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "La cita ha sido guardada correctamente.",
                type: "success"
            });
        </script>
    @endif
    @if (Session::has('ok-actualizar'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "La cita se ha actualizado correctamente.",
                type: "success"
            });
        </script>
    @endif
    @if (Session::has('no-editar'))
        <script>
            swal({
                title: "¡Error!",
                text: "No se puedo cambiar es estado de la cita.",
                type: "error"
            });
        </script>
    @endif
    @if (Session::has('no-borrar'))
        <script>
            swal({
                title: "¡Error!",
                text: "No se puedo borrar esta cita.",
                type: "error"
            });
        </script>
    @endif

@endsection
