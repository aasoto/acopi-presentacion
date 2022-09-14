@extends('plantilla')

@section('content')
    @auth
        @if (Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Director ejecutivo')
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
                                    <li class="breadcrumb-item active">Consultar</li>
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
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Ingresar empresa</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <form action="{{ url('/') }}/afiliados/empresas" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            <input type="hidden" name="accion" id="accion"
                                                value="agregarEmpresaAfiliado">
                                            {{--<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Número de documento</label>
                                                        <input type="texto" class="form-control" name="cedula"
                                                            value="{{ $value['cc_rprt_legal'] }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Afiliado</label>
                                                        <input type="texto" class="form-control" name="nombre"
                                                            value="{{ $value['primer_apellido'] . ' ' . $value['segundo_apellido'] . ' ' . $value['primer_nombre'] . ' ' . $value['segundo_nombre'] }}"
                                                            readonly>
                                                    </div>
                                                </div>
                                            </div>--}}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>NIT<i style="color: red">*</i></label>
                                                        <input type="texto" class="form-control" name="nit"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Razón social<i style="color: red">*</i></label>
                                                        <input type="texto" class="form-control"
                                                            name="razon_social" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Número de empleados<i style="color: red">*</i></label>
                                                        <input type="number" class="form-control"
                                                            name="num_empleados" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Dirección<i style="color: red">*</i></label>
                                                        <input type="texto" class="form-control" name="direccion"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Telefono<i style="color: red">*</i></label>
                                                        <input type="number" class="form-control" name="telefono"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Fax</label>
                                                        <input type="texto" class="form-control" name="fax">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Celular</label>
                                                        <input type="texto" class="form-control" name="celular">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Correo electronico<i style="color: red">*</i></label>
                                                        <input type="email" class="form-control"
                                                            name="correo_electronico" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Sector empresa<i style="color: red">*</i></label>
                                                        <select class="form-control select2bs4"
                                                            name="sector_empresa" id="sector_empresa"
                                                            style="width: 100%;" required>
                                                            <option value="">Seleccionar...</option>
                                                            @foreach ($sectores as $key => $sector)
                                                                <option value="{{ $sector['id_sector'] }}">
                                                                    {{ $sector['nombre_sector'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Productos empresa</label>
                                                        <input type="texto" class="form-control"
                                                            name="productos" data-role="tagsinput">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Ciudad</label>
                                                        <select class="form-control select2bs4" name="ciudad"
                                                            id="ciudad" style="width: 100%;">
                                                            <option value="">Seleccionar...</option>
                                                            @foreach ($municipios as $key => $municipio)
                                                                <option value="{{ $municipio['abreviatura'] }}">
                                                                    {{ $municipio['nombre'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Fecha afiliación</label>
                                                        <input type="date" class="form-control"
                                                            name="fecha_afiliacion"
                                                            value="@php echo date('Y-m-d') @endphp"
                                                            max="@php echo date('Y-m-d') @endphp">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="card-title">Adjuntar documentos de respaldo</div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Carta de bienvenida</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file"
                                                                            class="custom-file-input"
                                                                            name="carta_bienvenida"
                                                                            id="carta_bienvenida">
                                                                        <label class="custom-file-label"
                                                                            for="exampleInputFile">Seleccionar
                                                                            archivo formato PDF</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Acta de compromiso</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file"
                                                                            class="custom-file-input"
                                                                            name="acta_compromiso"
                                                                            id="acta_compromiso">
                                                                        <label class="custom-file-label"
                                                                            for="exampleInputFile">Seleccionar
                                                                            archivo formato PDF</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Estudio de afiliación</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file"
                                                                            class="custom-file-input"
                                                                            name="estudio_afiliacion"
                                                                            id="estudio_afiliacion">
                                                                        <label class="custom-file-label"
                                                                            for="exampleInputFile">Seleccionar
                                                                            archivo formato PDF</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Registro Único Tributario (RUT)</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file"
                                                                            class="custom-file-input"
                                                                            name="rut" id="rut">
                                                                        <label class="custom-file-label"
                                                                            for="exampleInputFile">Seleccionar
                                                                            archivo formato PDF</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Registro en Camara de Comercio</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file"
                                                                            class="custom-file-input"
                                                                            name="camara_comercio"
                                                                            id="camara_comercio">
                                                                        <label class="custom-file-label"
                                                                            for="exampleInputFile">Seleccionar
                                                                            archivo formato PDF</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Documento de fechas de cumpleaños</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file"
                                                                            class="custom-file-input"
                                                                            name="fechas_birthday"
                                                                            id="fechas_birthday">
                                                                        <label class="custom-file-label"
                                                                            for="exampleInputFile">Seleccionar
                                                                            archivo formato PDF</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-success col-md-6">
                                                    <i class="fas fa-check"></i> Guardar nueva empresa
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
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
    @if (isset($empresa_existe))
        @if ($empresa_existe == 'si')
            <script>
                swal({
                    title: "¡Este usuario ya tiene una empresa registrada!",
                    text: "¿Desea registrarle una otra empresa? Si no lo desea puede cancelar esta acción.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Sí, registrar otra empresa!"
                }).then(function(result) {
                    if (!result.value) {
                        window.history.back();
                    }
                });
            </script>
        @endif
    @endif

@endsection
