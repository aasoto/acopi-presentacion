@extends('plantilla')

@section('content')
    @auth
        @if (Auth::user()->rol == 'Administrador' ||
            Auth::user()->rol == 'Subdirector de comunicaciones y eventos' ||
            Auth::user()->rol == 'Asistente de dirección' ||
            Auth::user()->rol == 'Director ejecutivo' ||
            Auth::user()->rol == 'Subdirector administrativo y financiero' ||
            Auth::user()->rol == 'Subdirector de desarrollo empresarial' ||
            Auth::user()->rol == 'Subdirector juridico')
            <style>
                .col-derecha {
                    display: flex;
                    flex-direction: column;
                    width: 50%;
                }

                .col-izquierda {
                    display: flex;
                    flex-direction: column;
                    width: 50%;
                }

                .row-left {
                    flex: 1 0 auto;
                }

                .row-right-height-equal {
                    flex: 1 0 auto;
                    max-width: 100% !important;
                    margin-right: 0 !important;
                    margin-left: 0 !important;
                    align-self: stretch;
                    align-content: stretch;
                }

                .row-flex {
                    display: flex;
                    /* flex-direction: row;
                    align-items: stretch;
                    flex-wrap: nowrap; */
                    min-height: 100%;
                    flex-wrap: wrap;
                }

                .row-flex-item-left {
                    display: inline-block;
                    flex: 1 0 auto;
                    max-width: 33% !important;
                    margin-right: 0 !important;
                    margin-left: 0 !important;
                    align-self: stretch;
                    align-content: stretch;
                }

                .row-flex-item-right {
                    display: inline-block;
                    flex: 1 0 auto;
                    max-width: 67% !important;
                    margin-right: 0 !important;
                    margin-left: 0 !important;
                    align-self: stretch;
                    align-content: stretch;
                }

                @media (min-width:768px) {}

                @media (min-width: 992px) {
                    .border-lg-right-none {
                        border-right-width: 0 !important;
                    }
                }

                @media (min-width: 768px) {
                    .border-md-right-none {
                        border-right-width: 0 !important;
                    }

                    .position-md-static {
                        position: static !important;
                    }

                    .position-md-relative {
                        position: relative !important;
                    }

                    .position-md-absolute {
                        position: absolute !important;
                    }

                    .position-md-fixed {
                        position: fixed !important;
                    }

                    .position-md-sticky {
                        position: sticky !important;
                    }
                }

                @media (max-width: 575.98px) {
                    .border-xs-left-none {
                        border-left: none !important;
                    }

                    .border-xs-right-none {
                        border-right: none !important;
                    }

                    .border-xs-top-none {
                        border-top: none !important;
                    }

                    .border-xs-bottom-none {
                        border-bottom: none !important;
                    }

                }

                @media (max-width: 767.98px) {
                    .border-sm-left-none {
                        border-left: none !important;
                    }

                    .border-sm-right-none {
                        border-right: none !important;
                    }

                    .border-sm-top-none {
                        border-top: none !important;
                    }

                    .border-sm-bottom-none {
                        border-bottom: none !important;
                    }
                }

                @media (max-width:575px) {
                    .row-flex-item-right {
                        width: 100% !important;
                        max-width: 100% !important;
                        border-right-width: 0 !important;
                    }

                    .row-flex-item-left {
                        width: 100% !important;
                        max-width: 100% !important;
                    }
                }
            </style>
            <div class="content-wrapper" style="min-height: 243px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Gestión Afiliados</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('afiliados/inicio') }}">Afiliados</a></li>
                                    <li class="breadcrumb-item active">Consultar</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="container-fluid">
                        @foreach ($pagina_web as $element)
                        @endforeach
                        <div class="row">
                            <div class="col-12">
                                <!-- Default box -->
                                <div id="informacionPrimaria" name="informacionPrimaria">
                                    <div id="listadoAfiliado" name="listadoAfiliado">
                                        <div class="card card-primary consultarAfiliado">
                                            <div class="card-header">
                                                <h3 class="card-title">Consultar Afiliados</h3>

                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                        title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12 text-center">
                                                        @if (Auth::user()->rol == 'Administrador' ||
                                                            Auth::user()->rol == 'Subdirector de comunicaciones y eventos' ||
                                                            Auth::user()->rol == 'Asistente de dirección' ||
                                                            Auth::user()->rol == 'Director ejecutivo')
                                                            <a href="{{ url('afiliados/ingresarAfiliado') }}">
                                                                <button type="button" class="btn btn-success col-md-5">
                                                                    <i class="fas fa-plus"></i> Agregar nuevo afiliado
                                                                </button>
                                                            </a>
                                                        @endif
                                                        <a href="{{ $element['servidor'] }}afiliados/exportar">
                                                            <button type="button"
                                                                class="btn btn-primary col-md-5 tablaExportar"
                                                                id="botonExportar" name="botonExportar" action="'.$url.'">
                                                                <i class="fas fa-table"></i> Exportar datos
                                                            </button>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <br>
                                                </div>
                                                <table id="tablaAfiliados"
                                                    class="table table-bordered table-hover dt-responsive">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 50px;">No.</th>
                                                            <th style="width: 100px;">Identificación</th>
                                                            <th>Nombre</th>
                                                            <th style="width: 100px;">Telefono</th>
                                                            <th style="width: 100px;">Acciones</th>
                                                            {{-- <th>Nueva empresa</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th style="width: 50px;">No.</th>
                                                            <th style="width: 100px;">Identificación</th>
                                                            <th>Nombre</th>
                                                            <th style="width: 100px;">Telefono</th>
                                                            <th style="width: 100px;">Acciones</th>
                                                            {{-- <th>Nueva empresa</th> --}}
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <!-- /.card-body -->
                                            <div class="card-footer">
                                            </div>
                                            <!-- /.card-footer-->
                                        </div>
                                        <!-- /.card -->
                                        <div id="consultaAfiliado" name="consultaAfiliado" style="visibility: hidden;">
                                            <div class="card card-primary collapsed-card" id="tarjetaInformacionAfiliado">
                                                <div class="card-header">
                                                    <h3 class="card-title">Consultar Afiliado</h3>
                                                    <div class="card-tools">
                                                        <button type="button" title="Regresar"
                                                            class="btn btn-tool verTablaEmpresas">
                                                            <i class="fas fa-arrow-left"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                            title="Collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row" id="tablaAfiliado">
                                                        <!--Columna izquierda -->

                                                        <div
                                                            class="col-12 col-md-6 border px-0 border-sm-bottom-none   col-izquierda">


                                                            <div class="  border-bottom  row-right-height-equal  row-left">

                                                                <div class="row-flex">
                                                                    <div
                                                                        class="   col-12 justify-content-center text-center py-2 mx-0 ">
                                                                        <div class="row"></div>
                                                                        <img src="" id="foto" name="foto"
                                                                            class="my-auto " style="max-width: 100%">
                                                                        <div class="row"></div>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <!-- <div class=" border-2 px-0 border-sm-bottom-none   px-0 w-100  ">

                                                            </div> -->

                                                            <div class="   row-right-height-equal    row-left">
                                                                <div class=" row-flex     p-0    mx-0 align-self-end "
                                                                    style="margin-left:0;margin-right: 0;">

                                                                    <div
                                                                        class="row-flex-item-left p-2 border-right border-xs-right-none">
                                                                        <p class="font-weight-bold  text-break  "
                                                                            style="word-wrap: break-word;">Correo
                                                                            electrónico
                                                                        </p>
                                                                    </div>
                                                                    <div class="row-flex-item-right p-2 ">
                                                                        <p class=" pl-0 text-break" id="email"
                                                                            name="email" value=""
                                                                            style="border: none; background: #FFFFFF;"> </p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <style>

                                                        </style>
                                                        <!--Columna derecha -->
                                                        <div class="col-12 col-md-6 border border-3 px-0  col-derecha"
                                                            style="  ">


                                                            <div
                                                                class=" borde-2 border-bottom  row-right-height-equal  border border-2 border row-right">
                                                                <div class="row-flex">
                                                                    <div
                                                                        class=" col-sm-4 row-flex-item-left  text-break borde-2 border-right p-2 border-xs-right-none">
                                                                        <p class=" font-weight-bold pt-2 pl-0 text-break "
                                                                            id="tipo_documento" name="tipo_documento"
                                                                            style="border: none; "></p>
                                                                    </div>
                                                                    <div class=" col-sm-8 row-flex-item-right text-break p-2">
                                                                        <p class=" pt-2 pl-0 text-break" id="num_cedula"
                                                                            name="num_cedula" value=""
                                                                            style="border: none; background: #FFFFFF;"
                                                                            readonly></p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="  borde-2 border-bottom row-right-height-equal border border-2 border row-right">
                                                                <div class="row-flex">
                                                                    <div
                                                                        class=" col-sm-4 row-flex-item-left  text-break  borde-2 border-right p-2 border-xs-right-none">
                                                                        <p class="  font-weight-bold pt-2 pl-0 text-break "
                                                                            style="border: none; font-weight: bold; " readonly>
                                                                            Nombre completo</p>
                                                                    </div>
                                                                    <div class="col-sm-8 row-flex-item-right text-break p-2">
                                                                        <p class=" pt-2 pl-0 text-break" id="nombre_completo"
                                                                            name="nombre_completo" value=""
                                                                            style="border: none; background: #FFFFFF;"
                                                                            readonly></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="  borde-2 border-bottom row-right-height-equal border border-2 border row-right">
                                                                <div class="row-flex">
                                                                    <div
                                                                        class="row-flex-item-left  text-break borde-2 border-right p-2 border-xs-right-none">
                                                                        <p class="font-weight-bold pt-2 pl-0 text-break "
                                                                            style="border: none; font-weight: bold; " readonly>
                                                                            Genero</p>
                                                                    </div>
                                                                    <div class="row-flex-item-right text-break p-2">
                                                                        <p class=" pt-2 pl-0 text-break" id="genero"
                                                                            name="genero"
                                                                            style="border: none; background: #FFFFFF;"
                                                                            readonly></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="  borde-2 border-bottom row-right-height-equal border border-2 border row-right">
                                                                <div class="row-flex">
                                                                    <div
                                                                        class="row-flex-item-left  text-break borde-2 border-right  p-2 border-xs-right-none">
                                                                        <p class="font-weight-bold pt-2 pl-0 text-break "
                                                                            style="border: none; font-weight: bold; " readonly>
                                                                            Fecha de nacimiento</p>
                                                                    </div>
                                                                    <div class="row-flex-item-right text-break p-2">
                                                                        <p class=" pt-2 pl-0 text-break" id="fecha_nacimiento"
                                                                            name="fecha_nacimiento"
                                                                            style="border: none; background: #FFFFFF;"
                                                                            readonly></p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class=" row-right-height-equal border border-2 border row-right"
                                                                style="align-self: stretch;">
                                                                <div class="row-flex">
                                                                    <div
                                                                        class="row-flex-item-left  text-break  borde-2 border-right p-2 border-xs-right-none">
                                                                        <p class="font-weight-bold pt-2 pl-0 text-break "
                                                                            style="border: none; font-weight: bold; " readonly>
                                                                            Telefono o celular</p>
                                                                    </div>
                                                                    <div class="row-flex-item-right text-break p-2">
                                                                        <p class=" pt-2 pl-0 text-break" id="telefono"
                                                                            name="telefono"
                                                                            style="border: none; background: #FFFFFF;"
                                                                            readonly> </p>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                                <div class="card-footer">

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>



            <!--=====================================
            =            Editar Afiliado            =
            ======================================-->

            @if (isset($status))
                @if ($status == 200)
                    @foreach ($afiliado as $key => $value)
                        <div class="modal" id="editarAfiliado">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h4 class="modal-title">Editar Afiliado</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @if (Auth::user()->rol == 'Administrador' ||
                                        Auth::user()->rol == 'Asistente de dirección' ||
                                        Auth::user()->rol == 'Director ejecutivo')
                                        <form method="POST"
                                            action="{{ url('/') }}/afiliados/general/{{ $value['id_rprt_legal'] }}"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Tipo de documento</label>
                                                            <select class="form-control select2bs4" name="tipo_documento"
                                                                id="tipo_documento" style="width: 100%;" required>
                                                                <option value="{{ $value['tipo_documento_rprt'] }}">
                                                                    @if ($value['tipo_documento_rprt'] == 'cedula')
                                                                        Cédula de Ciudadanía
                                                                    @endif
                                                                    @if ($value['tipo_documento_rprt'] == 'pasaporte')
                                                                        Pasaporte
                                                                    @endif
                                                                    @if ($value['tipo_documento_rprt'] == 'otro')
                                                                        Otro
                                                                    @endif
                                                                </option>
                                                                <option value="cedula">Cédula de Ciudadanía</option>
                                                                <option value="pasaporte">Pasaporte</option>
                                                                <option value="otro">Otro</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Número de documento</label>
                                                            <input type="number" class="form-control"
                                                                name="numero_documento" value="{{ $value['cc_rprt_legal'] }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Primer nombre</label>
                                                            <input type="text" class="form-control" name="primer_nombre"
                                                                value="{{ $value['primer_nombre'] }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Segundo nombre</label>
                                                            <input type="text" class="form-control" name="segundo_nombre"
                                                                value="{{ $value['segundo_nombre'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Primer apellido</label>
                                                            <input type="text" class="form-control" name="primer_apellido"
                                                                value="{{ $value['primer_apellido'] }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Segundo apellido</label>
                                                            <input type="text" class="form-control"
                                                                name="segundo_apellido"
                                                                value="{{ $value['segundo_apellido'] }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Sexo</label>
                                                            <select class="form-control select2bs4" name="sexo"
                                                                id="sexo" style="width: 100%;" required>
                                                                <option value="{{ $value['sexo_rprt'] }}"><i>
                                                                        @if ($value['sexo_rprt'] == 'm')
                                                                            Masculino
                                                                        @endif
                                                                        @if ($value['sexo_rprt'] == 'f')
                                                                            Femenino
                                                                        @endif
                                                                    </i></option>
                                                                <option value="m">Masculino</option>
                                                                <option value="f">Femenino</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Fecha de nacimiento</label>
                                                            <input type="date" class="form-control"
                                                                name="fecha_nacimiento"
                                                                value="{{ $value['fecha_nacimiento'] }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Correo electronico</label>
                                                            <input type="email" class="form-control"
                                                                name="correo_electronico" value="{{ $value['email_rprt'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Telefono o celular</label>
                                                            <input type="number" class="form-control" name="telefono"
                                                                value="{{ $value['telefono_rprt'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="card-title">Adjuntar archivos</div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group my-2">
                                                                    <label for="exampleInputPassword1">Foto
                                                                        afiliado</label><br>
                                                                    <input type="hidden" value="{{ $value['foto_rprt'] }}"
                                                                        name="foto_actual">
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                name="foto" id="foto">
                                                                            <label class="custom-file-label"
                                                                                for="exampleInputFile">foto_afiliado_{{ $value['cc_rprt_legal'] }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="text-center">
                                                                        @if ($value['foto_rprt'] == '')
                                                                            <img src=""
                                                                                class="img-fluid py-2 bg-secondary previsualizarImg_foto">
                                                                        @else
                                                                            <img src="{{ url('/') }}/{{ $value['foto_rprt'] }}"
                                                                                class="img-fluid py-2 bg-secondary previsualizarImg_foto">
                                                                        @endif
                                                                        <p class="help-block small mt-3">Dimensiones: 200px *
                                                                            200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group my-2">
                                                                    <label for="exampleInputPassword1">Foto de documento de
                                                                        identidad</label>
                                                                    <input type="hidden" name="archivo_documento_actual"
                                                                        value="{{ $value['foto_cedula_rprt'] }}">
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                name="archivo_documento"
                                                                                id="archivo_documento">
                                                                            <label class="custom-file-label"
                                                                                for="exampleInputFile">documento_identidad_{{ $value['cc_rprt_legal'] }}</label>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="text-center">
                                                                        @if ($tipo_cedula == 'pdf')
                                                                            <iframe
                                                                                src="{{ url('/') }}/{{ $value['foto_cedula_rprt'] }}"
                                                                                style="width: 80%; height: 400px;"></iframe>
                                                                        @endif
                                                                        @if ($tipo_cedula == 'imagen')
                                                                            @if ($value['foto_cedula_rprt'] == '')
                                                                                <img src=""
                                                                                    class="img-fluid py-2 bg-secondary previsualizarImg_archivo_documento">
                                                                            @else
                                                                                <img src="{{ url('/') }}/{{ $value['foto_cedula_rprt'] }}"
                                                                                    class="img-fluid py-2 bg-secondary previsualizarImg_archivo_documento">
                                                                            @endif
                                                                        @endif
                                                                        <p class="help-block small mt-3">Peso Max. 2MB |
                                                                            Formato: JPG, PNG o PDF</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default bg-danger"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                            </div>
                                        </form>
                                    @else
                                        @include('paginas/errores/401-modal')
                                    @endif
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    @endforeach
                    <script>
                        $("#editarAfiliado").modal();
                    </script>
                @else
                    {{ $status }}
                @endif
            @endif

            <!--====  End of Editar Afiliado  ====-->

            <script>
                $(function() {
                    //Initialize Select2 Elements
                    $('.select2').select2()
                    //Initialize Select2 Elements
                    $('.select2bs4').select2({
                        theme: 'bootstrap4'
                    })
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
    @if (Session::has('ok-crear'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "El afiliado fue ingresado correctamente a la base de datos.",
                type: "success"
            });
        </script>
    @endif
    @if (Session::has('ok-editar'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "Información actualizada correctamente.",
                type: "success"
            });
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            swal({
                title: "¡Error!",
                text: "Los datos estan vacios.",
                type: "error"
            });
        </script>
    @endif


@endsection
