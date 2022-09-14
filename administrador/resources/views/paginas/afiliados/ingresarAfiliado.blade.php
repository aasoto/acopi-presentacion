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
                                    <li class="breadcrumb-item active">Ingresar</li>
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
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Empresas sin afiliados</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="tablaEmpresasNoAfiliados" class="table table-bordered table-hover dt-responsive">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>NIT</th>
                                                    <th>Razón Social</th>
                                                    <th>Dirección</th>
                                                    <th>Telefono</th>
                                                    <th>Procedimiento</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>NIT</th>
                                                    <th>Razón Social</th>
                                                    <th>Dirección</th>
                                                    <th>Telefono</th>
                                                    <th>Procedimiento</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>

                                <div class="ingresarAfiliado" id="ingresarAfiliado" name="ingresarAfiliado" style="visibility: hidden;">
                                    @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos') || (Auth::user()->rol == 'Asistente de dirección') || (Auth::user()->rol == 'Director ejecutivo'))
                                    <form action="{{url('/')}}/afiliados/general" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="escenario" id="escenario" value="sistema">
                                        <div class="card card-success collapsed-card" id="tarjetaIngresarAfiliado">
                                        <div class="card-header">
                                            <div class="card-title">Agregar Afiliado</div>
                                            <div class="card-tools">
                                            <button type="button" title="Regresar" class="btn btn-tool verTablaEmpresas">
                                                <i class="fas fa-arrow-left"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <input type="hidden" id="id-empresa" name="id-empresa" value="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label>NIT empresa<i style="color: red">*</i></label>
                                                    <input type="text" class="form-control" id="nit_empresa" name="nit_empresa" required readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                    <label>Razón social<i style="color: red">*</i></label>
                                                    <input type="text" class="form-control" id="razon_social" name="razon_social" required readonly>
                                                    </div>
                                                </div>
                                                </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Tipo de documento<i style="color: red">*</i></label>
                                                <select class="form-control select2bs4" name="tipo_documento" id="tipo_documento" style="width: 100%;" required>
                                                    <option selected="sin verificar"><i>Seleccionar tipo de documento...</i></option>
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
                                                <input type="text" class="form-control" name="primer_nombre" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Segundo nombre</label>
                                                <input type="text" class="form-control" name="segundo_nombre">
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Primer apellido<i style="color: red">*</i></label>
                                                <input type="text" class="form-control" name="primer_apellido" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Segundo apellido<i style="color: red">*</i></label>
                                                <input type="text" class="form-control" name="segundo_apellido" required>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Sexo<i style="color: red">*</i></label>
                                                <select class="form-control select2bs4" name="sexo" id="sexo" style="width: 100%;" required>
                                                    <option selected="sin verificar"><i>Seleccionar sexo...</i></option>
                                                    <option value="m">Masculino</option>
                                                    <option value="f">Femenino</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Fecha de nacimiento<i style="color: red">*</i></label>
                                                <input type="date" class="form-control" name="fecha_nacimiento"
                                                    value="@php echo date('Y-m-d'); @endphp"
                                                    max="@php echo date('Y-m-d'); @endphp" required>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Correo electronico</label>
                                                <input type="email" class="form-control" name="correo_electronico">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Telefono o celular</label>
                                                <input type="number" class="form-control" name="telefono">
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
                                                    <label for="exampleInputPassword1">Foto afiliado</label><br>
                                                    {{--<div class="btn btn-default btn-file mb-3">
                                                        <i class="fas fa-paperclip"></i> Adjuntar foto
                                                        <input type="file" name="foto">
                                                    </div>--}}
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="foto" id="foto">
                                                        <label class="custom-file-label" for="exampleInputFile">Seleccionar foto formato JPG, JPEG o PNG</label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="text-center">
                                                        <img src="" class="img-fluid py-2 bg-secondary previsualizarImg_foto">
                                                        <p class="help-block small mt-3">Dimensiones: 700px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">

                                                    <div class="form-group my-2">
                                                    <label for="exampleInputPassword1">Documento de identidad</label>
                                                    <br>
                                                    {{--<div class="btn btn-default btn-file mb-3">
                                                        <i class="fas fa-paperclip"></i> Adjuntar documento
                                                        <input type="file" name="archivo_documento" required>
                                                    </div>--}}
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="archivo_documento" id="archivo_documento">
                                                        <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo formato JPG, JPEG, PNG o PDF</label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="text-center">
                                                        <img src="" class="img-fluid py-2 bg-secondary previsualizarImg_archivo_documento">
                                                        <div class="form-group text-center logoPDF"></div>
                                                        <p class="help-block small mt-3">Dimensiones: 700px * 200px para imagenes | Peso Max. 2MB | Formato: JPG, PNG o PDF</p>
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
                                                <i class="fas fa-check"></i> Guardar nuevo afiliado
                                            </button>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
                                    @else
                                        @include('paginas/errores/401')
                                    @endif
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
    @if (Session::has('ok-crear'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "La empresa fue agregada correctamente al sistema, ahora busquela en el siguiente listado y agregue toda la información personal del afiliado o de la persona que represente a la empresa ante la entidad.",
                type: "success"
            });
        </script>
    @endif
@endsection
