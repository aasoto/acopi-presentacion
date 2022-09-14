@extends('plantilla')

@section('content')
    @auth
        @if (Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Director ejecutivo' || Auth::user()->rol == 'Subdirector administrativo y financiero')
            <div class="content-wrapper" style="min-height: 243px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Consultar Pagos</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                                    <li class="breadcrumb-item active">Consultar pagos</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <section class="content">
                    <div class="container-fluid">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Información General</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 text-center">
                                    <a href="{{ url('pagos/ingresar') }}" class="btn btn-primary col-md-3">
                                        <i class="fas fa-receipt"></i> Ingresar pago individual
                                    </a>
                                    <button class="btn btn-success col-md-3" data-toggle="modal" data-target="#generarPagos">
                                        <i class="fas fa-receipt"></i> Generar pagos de este mes
                                    </button>
                                    <a href="{{ url('pagos/parametros') }}"
                                        title="Configurar parametros para generación de pagos" class="btn btn-default col-md-3">
                                        <i class="fas fa-cogs"></i> Parametros
                                    </a>
                                </div>
                                <br>
                                <table id="tablaPagos" class="table table-bordered table-striped dt-responsive">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Representante</th>
                                            <th>Empresa</th>
                                            <th>Mes</th>
                                            <th>Estado</th>
                                            <th>Valor deuda</th>
                                            <th>Valor mes</th>
                                            <th>Valor abono</th>
                                            <th>Valor recibo</th>
                                            <th>Fecha limite</th>
                                            <th>Procedimientos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Representante</th>
                                            <th>Empresa</th>
                                            <th>Mes</th>
                                            <th>Estado</th>
                                            <th>Valor deuda</th>
                                            <th>Valor mes</th>
                                            <th>Valor recibo</th>
                                            <th>Valor recibo</th>
                                            <th>Fecha limite</th>
                                            <th>Procedimientos</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="modal" id="ingresarPago">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title">Generar recibo de pago individual</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body text-center">
                            <table id="tablaPagosEmpresas" class="table table-bordered table-striped dt-responsive">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Documento</th>
                                        <th>Afiliado</th>
                                        <th>NIT</th>
                                        <th>Empresa</th>
                                        <th>Estado</th>
                                        <th>Procedimiento</th>
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
                                        <th>Estado</th>
                                        <th>Procedimiento</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                            {{--<button type="button" class="btn btn-danger col-md-5" data-dismiss="modal"><i
                                    class="fas fa-window-close"></i> Cerrar</button>
                            <button type="submit" class="btn btn-success col-md-5"><i class="fas fa-save"></i>
                                Generar</button>--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal" id="generarPagos">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ url('/') }}/pagos/general">
                            @csrf
                            <div class="modal-header bg-success">
                                <h4 class="modal-title">Generar recibos de pago del mes de @php
                                    setlocale(LC_TIME, 'spanish');
                                    echo strftime('%B');
                                @endphp</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body text-center">
                                <p>¿Desea generar los recibos del mes?</p>
                                <h5>Digite su contraseña</h5>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                                <button type="button" class="btn btn-danger col-md-5" data-dismiss="modal"><i
                                        class="fas fa-window-close"></i> Cerrar</button>
                                <button type="submit" class="btn btn-success col-md-5"><i class="fas fa-save"></i>
                                    Generar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            @include('paginas/errores/401')
        @endif
    @endauth
    @if (Session::has('no-validacion'))
        <script>
            swal({
                title: "¡Error!",
                text: "Constraseña incorrecta.",
                type: "error"
            });
        </script>
    @endif
    @if (Session::has('pagos_generados'))
        <script>
            swal({
                title: "¡Error!",
                text: "Pagos generados en el pasado.",
                type: "error"
            });
        </script>
    @endif
    @if (Session::has('ok-crear'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "Todos los pagos ha sido generados exitosamente.",
                type: "success"
            });
        </script>
    @endif
    @if (Session::has('no-editar'))
        <script>
            swal({
                title: "¡Error!",
                text: "No se pudo reportar el pago.",
                type: "error"
            });
        </script>
    @endif
@endsection
