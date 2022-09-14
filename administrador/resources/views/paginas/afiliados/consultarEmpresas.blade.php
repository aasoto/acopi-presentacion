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
                @media (min-width: 768px) {
                    .w-md-100 {
                        width: 100% !important;
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
            </style>
            <div class="content-wrapper" style="min-height: 243px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Gestión Empresas</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('afiliados/inicio') }}">Afiliados</a></li>
                                    <li class="breadcrumb-item active">Consultar Empresas</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="container-fluid">
                        @foreach ($paginaweb as $element)
                        @endforeach
                        <div class="row">
                            <div class="col-12">

                                <input type="hidden" name="sectores" id="sectores" value='{{ $sector_empresa }}'>
                                <div id="listadoEmpresas" name="listadoEmpresas">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h3 class="card-title">Consultar Empresas</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                    title="Collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-md-12 text-center">
                                                @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos') || (Auth::user()->rol == 'Asistente de dirección') || (Auth::user()->rol == 'Director ejecutivo'))
                                                <a href="{{ url('afiliados/empresas') }}">
                                                    <button type="button" class="btn btn-success col-md-5">
                                                        <i class="fas fa-plus"></i> Agregar nueva empresa
                                                    </button>
                                                </a>
                                                @endif
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-primary btn-flat">Más
                                                        opciones</button>
                                                    <button type="button"
                                                        class="btn btn-primary btn-flat dropdown-toggle dropdown-icon"
                                                        data-toggle="dropdown">
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu" role="menu">
                                                        <a class="dropdown-item"
                                                            href="{{ $element['servidor'] }}afiliados/afiliadosEmpleados">Ver
                                                            empleados</a>
                                                        <a class="dropdown-item"
                                                            href="{{ $element['servidor'] }}afiliados/empresasInactivas">Ver
                                                            empresas inactivas</a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item"
                                                            href="{{ $element['servidor'] }}afiliados/exportarEmpresas">Exportar
                                                            datos</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <table id="tablaEmpresas" class="table table-bordered table-hover dt-responsive">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Acciones</th>
                                                        <th>NIT</th>
                                                        <th>Razón social</th>
                                                        <th>Representante</th>
                                                        <th>Estado</th>
                                                        <th>Telefonos</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Acciones</th>
                                                        <th>NIT</th>
                                                        <th>Razón social</th>
                                                        <th>Representante</th>
                                                        <th>Estado</th>
                                                        <th>Telefonos</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="card-footer">

                                        </div>
                                    </div>
                                </div>

                                <div id="descripcionEmpresa" name="descripcionEmpresa" style="visibility: hidden;">
                                    <div class="card card-primary collapsed-card" id="tarjetaDescripcion">
                                        <div class="card-header">
                                            <h3 class="card-title">Consultar Empresa</h3>
                                            <div class="card-tools">
                                                <button type="button" title="Regresar" class="btn btn-tool verTablaEmpresas">
                                                    <i class="fas fa-arrow-left"></i>
                                                </button>
                                                <button type="button" title="Minimizar" class="btn btn-tool"
                                                    data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <style>
                                            .row-flex {
                                                display: flex;
                                                flex-wrap: wrap;
                                            }
                                        </style>
                                        <div class="card-body">
                                            <div id="tablaEmpresa">

                                            </div>
                                            <div class="row row-flex">
                                                <!--Col izquierda-->
                                                <div class="col-12 col-md-6 w-md-100">
                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">NIT</p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break ">
                                                            <p class="text-break pt-2" id="nit"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Col Derecha-->
                                                <div class="col-12 col-md-6 w-100">

                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Razón social</p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break ">
                                                            <p class="text-break pt-2" id="razon_social"> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-flex  ">
                                                <!--Col izquierda-->
                                                <div class="col-12 col-md-6 w-md-100">
                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none  ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Representante
                                                            </p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break  ">
                                                            <p class="text-break pt-2" id="representante"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Col Derecha-->
                                                <div class="col-12 col-md-6 w-md-100">

                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Número empleados
                                                            </p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break ">
                                                            <p class="text-break pt-2" id="numero_empleados"> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-flex  ">
                                                <!--Col izquierda-->
                                                <div class="col-12 col-md-6 w-md-100">
                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none  ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Dirección</p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break  ">
                                                            <p class="text-break pt-2" id="direccion"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Col Derecha-->
                                                <div class="col-12 col-md-6 w-md-100">

                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Teléfono</p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break ">
                                                            <p class="text-break pt-2" id="telefono"> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-flex  ">
                                                <!--Col izquierda-->
                                                <div class="col-12 col-md-6 w-md-100">
                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none  ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Fax</p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break  ">
                                                            <p class="text-break pt-2" id="fax"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Col Derecha-->
                                                <div class="col-12 col-md-6 w-md-100">

                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Celular</p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break ">
                                                            <p class="text-break pt-2" id="celular"> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-flex  ">
                                                <!--Col izquierda-->
                                                <div class="col-12 col-md-6 w-md-100">
                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none  ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Correo
                                                                electrónico</p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break  ">
                                                            <p class="text-break pt-2" id="correo_electronico"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Col Derecha-->
                                                <div class="col-12 col-md-6 w-md-100">

                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Sector</p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break ">
                                                            <p class="text-break pt-2" id="sector"> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-flex  ">
                                                <!--Col izquierda-->
                                                <div class="col-12 col-md-6 w-md-100">
                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none  ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Productos</p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break  ">
                                                            <p class="text-break pt-2" id="productos"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Col Derecha-->
                                                <div class="col-12 col-md-6 w-md-100">

                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Ciudad</p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break ">
                                                            <p class="text-break pt-2" id="ciudad"> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-flex  ">
                                                <!--Col izquierda-->
                                                <div class="col-12 col-md-6 w-md-100">
                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none  ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Estado</p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break  ">
                                                            <p class="text-break pt-2" id="estado"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Col Derecha-->
                                                <div class="col-12 col-md-6 w-md-100">

                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Pagos atrasados
                                                            </p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break ">
                                                            <p class="text-break pt-2" id="pagos_atrasados"> </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-flex  ">
                                                <!--Col izquierda-->
                                                <div class="col-12 col-md-6 w-md-100">
                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none  ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break ">Fecha
                                                                afiliación</p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break  ">
                                                            <p class="text-break pt-2" id="fecha_afiliacion"></p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!--Col Derecha-->
                                                <div class="col-12 col-md-6 w-md-100 d-none d-md-block">

                                                    <div class="row h-100">
                                                        <!--Enunciado-->
                                                        <div class="col-sm-5  border border-2  pb-2 border-xs-right-none ">
                                                            <p class=" font-weight-bold pt-2 pl-0  text-break "></p>
                                                        </div>
                                                        <!--Valor-->
                                                        <div class="col-sm-7  border border-2 pb-2 text-break ">
                                                            <p class="text-break pt-2" id=""> </p>
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
                </section>
            </div>

            <div class="modal" id="nuevoEmpleado">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-success">
                            <h4 class="modal-title">Agregar empleados de afiliados </h4>
                            <h4 class="modal-title" name="titulo_modal" id="titulo_modal"></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @if (Auth::user()->rol == 'Administrador' ||
                            Auth::user()->rol == 'Subdirector de comunicaciones y eventos' ||
                            Auth::user()->rol == 'Director ejecutivo' ||
                            Auth::user()->rol == 'Subdirector de desarrollo empresarial')
                            <form action="{{ url('/') }}/afiliados/consultarEmpresas" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" name="accion" id="accion" value="agregarEmpleadoAfiliado">
                                    <input type="hidden" name="id_empresa" id="id_empresa" value="">
                                    <input type="hidden" name="nit_empresa" id="nit_empresa" value="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tipo de documento<i style="color: red">*</i></label>
                                                <select class="form-control select2bs4" name="tipo_documento"
                                                    id="tipo_documento" style="width: 100%;" required>
                                                    <option selected="sin verificar"><i>Seleccionar tipo de documento...</i>
                                                    </option>
                                                    <option value="cedula">Cédula de Ciudadanía</option>
                                                    <option value="pasaporte">Pasaporte</option>
                                                    <option value="otro">Otro</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Número de documento<i style="color: red">*</i></label>
                                                <input type="number" class="form-control" name="numero_documento" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Primer nombre<i style="color: red">*</i></label>
                                                <input type="texto" class="form-control" name="primer_nombre" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Segundo nombre</label>
                                                <input type="texto" class="form-control" name="segundo_nombre">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Primer apellido<i style="color: red">*</i></label>
                                                <input type="texto" class="form-control" name="primer_apellido" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Segundo apellido<i style="color: red">*</i></label>
                                                <input type="texto" class="form-control" name="segundo_apellido" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Cargo del empleado<i style="color: red">*</i></label>
                                                <input type="texto" class="form-control" name="cargo_empleado" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fecha de nacimiento<i style="color: red">*</i></label>
                                                <input type="date" class="form-control" name="fecha_nacimiento" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group my-2 text-center">
                                                <label for="exampleInputPassword1">Foto de documento de identidad<i style="color: red">*</i></label><br>
                                                <div class="btn btn-default btn-file mb-3">
                                                    <i class="fas fa-paperclip"></i> Adjuntar documento
                                                    <input type="file" name="archivo_documento" required>
                                                </div>
                                                <br>
                                                <img src="{{ url('/') }}/vistas/images/afiliados/address-card.png"
                                                    class="img-fluid py-2 bg-secondary previsualizarImg_archivo_documento">
                                                <p class="help-block small mt-3">Dimensiones: 700px * 200px para imagenes |
                                                    Peso Max. 2MB | Formato: JPG, PNG o PDF</p>
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
                </div>
            </div>

            @if (isset($status))
                @if ($status == 200)
                    @foreach ($empresa as $key => $value)
                        <div class="modal" id="editarEmpresa">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h4 class="modal-title">Editar información empresa</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @if (Auth::user()->rol == 'Administrador' ||
                                        Auth::user()->rol == 'Subdirector de comunicaciones y eventos' ||
                                        Auth::user()->rol == 'Director ejecutivo' ||
                                        Auth::user()->rol == 'Subdirector de desarrollo empresarial')
                                        <form method="POST"
                                            action="{{ url('/') }}/afiliados/consultarEmpresas/{{ $value['id_empresa'] }}"
                                            enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Número de documento<i style="color: red">*</i></label>
                                                            <input type="texto" class="form-control" name="cedula"
                                                                value="{{ $value['cc_rprt_legal'] }}" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Afiliado</label>
                                                            <input type="texto" class="form-control" name="nombre"
                                                                value="{{ $value->nombre['primer_apellido'] . ' ' . $value->nombre['segundo_apellido'] . ' ' . $value->nombre['primer_nombre'] . ' ' . $value->nombre['segundo_nombre'] }}"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>NIT<i style="color: red">*</i></label>
                                                            <input type="texto" class="form-control" name="nit"
                                                                value="{{ $value['nit_empresa'] }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Razón social<i style="color: red">*</i></label>
                                                            <input type="texto" class="form-control" name="razon_social"
                                                                value="{{ $value['razon_social'] }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Número de empleados<i style="color: red">*</i></label>
                                                            <input type="number" class="form-control" name="num_empleados"
                                                                value="{{ $value['num_empleados'] }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Dirección<i style="color: red">*</i></label>
                                                            <input type="texto" class="form-control" name="direccion"
                                                                value="{{ $value['direccion_empresa'] }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Telefono<i style="color: red">*</i></label>
                                                            <input type="number" class="form-control" name="telefono"
                                                                value="{{ $value['telefono_empresa'] }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Fax</label>
                                                            <input type="texto" class="form-control" name="fax"
                                                                value="{{ $value['fax_empresa'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Celular</label>
                                                            <input type="texto" class="form-control" name="celular"
                                                                value="{{ $value['celular_empresa'] }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Correo electronico<i style="color: red">*</i></label>
                                                            <input type="email" class="form-control"
                                                                name="correo_electronico"
                                                                value="{{ $value['email_empresa'] }}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Sector empresa<i style="color: red">*</i></label>
                                                            <select class="form-control select2bs4" name="sector_empresa"
                                                                id="sector_empresa" style="width: 100%;" required>
                                                                @foreach ($sector_empresa as $key => $sector)
                                                                    @if ($sector['id_sector'] == $value['id_sector_empresa'])
                                                                        <option selected="{{ $sector['id_sector'] }}"
                                                                            value="{{ $sector['id_sector'] }}">
                                                                            {{ $sector['nombre_sector'] }}</option>
                                                                    @else
                                                                        <option value="{{ $sector['id_sector'] }}">
                                                                            {{ $sector['nombre_sector'] }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Productos empresa</label>
                                                            @php
                                                                $tags = json_decode($value['productos_empresa'], true);
                                                                $productos = '';
                                                                foreach ($tags as $key => $cadena) {
                                                                    $productos .= $cadena . ',';
                                                                }
                                                            @endphp
                                                            <input type="texto" class="form-control" name="productos"
                                                                value="{{ $productos }}" data-role="tagsinput">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Ciudad<i style="color: red">*</i></label>
                                                            <select class="form-control select2bs4" name="ciudad"
                                                                id="ciudad" style="width: 100%;">
                                                                @foreach ($municipios as $key => $municipio)
                                                                    @if ($value['ciudad_empresa'] == $municipio['abreviatura'])
                                                                        <option selected="selected"
                                                                            value="{{ $municipio['abreviatura'] }}">
                                                                            {{ $municipio['nombre'] }}</option>
                                                                    @else
                                                                        <option value="{{ $municipio['abreviatura'] }}">
                                                                            {{ $municipio['nombre'] }}</option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Fecha afiliación</label>
                                                            <input type="date" class="form-control"
                                                                name="fecha_afiliacion"
                                                                value="{{ $value['fecha_afiliacion_empresa'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="card-title">Documentos de respaldo</div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Carta de bienvenida</label>
                                                                    <input type="hidden" name="carta_bienvenida_actual"
                                                                        id="carta_bienvenida_actual"
                                                                        value="{{ $value['carta_bienvenida'] }}">
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                name="carta_bienvenida" id="carta_bienvenida">
                                                                            @if ($value['carta_bienvenida'] == '')
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">Seleccionar archivo
                                                                                    formato PDF .pdf</label>
                                                                            @else
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">carta_bienvenida_{{ $value['nit_empresa'] }}.pdf</label>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Acta de compromiso</label>
                                                                    <input type="hidden" name="acta_compromiso_actual"
                                                                        id="acta_compromiso_actual"
                                                                        value="{{ $value['acta_compromiso'] }}">
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                name="acta_compromiso" id="acta_compromiso">
                                                                            @if ($value['acta_compromiso'] == '')
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">Seleccionar archivo
                                                                                    formato PDF</label>
                                                                            @else
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">acta_compromiso_{{ $value['nit_empresa'] }}.pdf</label>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Estudio de afiliación</label>
                                                                    <input type="hidden" name="estudio_afiliacion_actual"
                                                                        id="estudio_afiliacion_actual"
                                                                        value="{{ $value['estadio_afiliacion'] }}">
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                name="estudio_afiliacion"
                                                                                id="estudio_afiliacion">
                                                                            @if ($value['estudio_afiliacion'] == '')
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">Seleccionar archivo
                                                                                    formato PDF</label>
                                                                            @else
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">estudio_afiliacion_{{ $value['nit_empresa'] }}.pdf</label>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Registro Único Tributario (RUT)</label>
                                                                    <input type="hidden" name="rut_actual" id="rut_actual"
                                                                        value="{{ $value['rut'] }}">
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                name="rut" id="rut">
                                                                            @if ($value['rut'] == '')
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">Seleccionar archivo
                                                                                    formato PDF</label>
                                                                            @else
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">rut_{{ $value['nit_empresa'] }}.pdf</label>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Registro en Camara de Comercio</label>
                                                                    <input type="hidden" name="camara_comercio_actual"
                                                                        id="camara_comercio_actual"
                                                                        value="{{ $value['camara_comercio'] }}">
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                name="camara_comercio" id="camara_comercio">
                                                                            @if ($value['camara_comercio'] == '')
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">Seleccionar archivo
                                                                                    formato PDF</label>
                                                                            @else
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">camara_comercio_{{ $value['nit_empresa'] }}.pdf</label>
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Documento de fechas de cumpleaños</label>
                                                                    <input type="hidden" name="fechas_birthday_actual"
                                                                        id="fechas_birthday_actual"
                                                                        value="{{ $value['fechas_birthday'] }}">
                                                                    <div class="input-group">
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input"
                                                                                name="fechas_birthday" id="fechas_birthday">
                                                                            @if ($value['fechas_birthday'] == '')
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">Seleccionar archivo
                                                                                    formato PDF</label>
                                                                            @else
                                                                                <label class="custom-file-label"
                                                                                    for="exampleInputFile">fechas_birthday_{{ $value['nit_empresa'] }}.pdf</label>
                                                                            @endif
                                                                        </div>
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
                                                <button type="submit" class="btn btn-primary"
                                                    action="{{ url('afiliados/consultarEmpresas/') }}{{ $value['id_empresa'] }}"
                                                    id="guardarCambiosEmpresas">Guardar</button>
                                            </div>
                                        </form>
                                    @else
                                        @include('paginas/errores/401-modal')
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <script>
                        $("#editarEmpresa").modal();
                    </script>
                @else
                    {{ $status }}
                @endif
            @endif

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
    @if (Session::has('ok-editar'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "Información actualizada correctamente.",
                type: "success"
            });
        </script>
    @endif
    @if (Session::has('ok-crear-empleado'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "El empleado fuero ingresado correctamente al sistema.",
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
