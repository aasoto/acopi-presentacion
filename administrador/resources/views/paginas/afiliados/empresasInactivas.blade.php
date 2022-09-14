@extends('plantilla')

@section('content')
@auth
@if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos') || (Auth::user()->rol == 'Asistente de dirección') || (Auth::user()->rol == 'Director ejecutivo') || (Auth::user()->rol == 'Subdirector administrativo y financiero') || (Auth::user()->rol == 'Subdirector de desarrollo empresarial') || (Auth::user()->rol == 'Subdirector juridico'))
    <div class="content-wrapper" style="min-height: 243px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Consultar empresas inactivas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('afiliados/inicio') }}">Afiliados</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('afiliados/consultarEmpresas') }}">Consultar empresas</a></li>
                            <li class="breadcrumb-item active">Consultar empresas inactivas</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Empresas inactivas</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tableEmpresasInactivas" class="table table-bordered table-striped dt-responsive">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIT</th>
                                    <th>Razón social</th>
                                    <th>Representante</th>
                                    <th>Telefonos</th>
                                    <th>Procedimientos</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($empresas as $key => $value)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$value["nit_empresa"]}}</td>
                                    <td>{{$value["razon_social"]}}</td>
                                    <td>{{$value["primer_apellido"]." ".$value["segundo_apellido"]." ".$value["primer_nombre"]." ".$value["segundo_nombre"]}}</td>
                                    <td>{{$value["telefono_empresa"]." - ".$value["celular_empresa"]}}</td>
                                    <td>
                                        @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector administrativo y financiero') || (Auth::user()->rol == 'Director ejecutivo'))
                                        <div class="text-center">
                                            <div class="btn-group">
                                                <a href="{{url()->current().'/'.$value['id_empresa']}}" class="btn btn-warning btn-sm text-white">
                                                    <i class="far fa-life-ring"></i> Rescatar
                                                </a>
                                            </div>
                                        </div>
                                        @else
                                        <div class="text-center">
                                            <div class="btn-group">

                                            </div>
                                        </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>NIT</th>
                                    <th>Razón social</th>
                                    <th>Representante</th>
                                    <th>Telefonos</th>
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
        @if (isset($status))
            @if ($status == 200)
                <div class="modal" id="solucionFinanciera">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h4 class="modal-title">Solucionar situación financiera</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table id="example1" class="table table-bordered table-striped dt-responsive">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Mes</th>
                                            <th>Estado</th>
                                            <th>Valor deuda</th>
                                            <th>Valor mes</th>
                                            <th>Valor recibo</th>
                                            <th>Fecha limite</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($deuda as $key => $value)
                                        <tr>
                                            <td>{{$value["id"]}}</td>
                                            <td>{{$value["mes_recibo"]}}</td>
                                            <td>{{$value["estado"]}}</td>
                                            <td>{{$value["valor_deuda"]}}</td>
                                            <td>{{$value["valor_mes"]}}</td>
                                            <td>{{$value["valor_recibo"]}}</td>
                                            <td>{{$value["fecha_limite"]}}</td>
                                            <td>
                                                @php
                                                if ($value["estado"] == "pendiente") {
                                                    echo '
                                                    <div class="text-center">
                                                        <button title="Reactivar empresa" class="btn btn-success btn-sm reactivarEmpresa" recibo="'.$value["id"].'" action="'.url("afiliados/reactivarEmpresa/".$value["id_empresa"]).'" method="PUT" pagina="afiliados/empresasInactivas" token="'.csrf_token().'">
                                                        <i class="fas fa-check"></i>
                                                        </button>
                                                    </div>
                                                    ';
                                                }
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Mes</th>
                                        <th>Estado</th>
                                        <th>Valor deuda</th>
                                        <th>Valor mes</th>
                                        <th>Valor recibo</th>
                                        <th>Fecha limite</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $("#solucionFinanciera").modal();
            </script>
        @endif
        @if ($status == 404)
            <script>
                swal({
                    title: "¡Error!",
                    text: "No se encontraron duedas con la entidad.",
                    type: "error"
                });
            </script>
        @endif
    @endif
@else
    @include('paginas/errores/401')
@endif
@endauth
@if (Session::has("activada"))
    <script>
        swal({
            title: "¡Bien Hecho!",
            text: "La empresa ha sido actualizada.",
            type: "success"
        });
    </script>
@endif
@endsection
