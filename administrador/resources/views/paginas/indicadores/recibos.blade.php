@extends('plantilla')

@section('content')
    @auth
        @if (Auth::user()->rol == 'Administrador')
            <div class="content-wrapper" style="min-height: 243px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Gestión de indicadores</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                                    <li class="breadcrumb-item active">Indicadores</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="form-group col-md-1"></div>
                        <div class="col-md-2">
                            <select class="form-control select2bs4" name="num_meses" id="num_meses">
                                <option value="{{$num_registros[0]->rango}}">{{$num_registros[0]->nombre}}</option>
                                <option value="6">6 meses</option>
                                <option value="12">1 año</option>
                                <option value="18">1 año y 6 meses</option>
                                <option value="24">2 años</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-success col-md-12 actualizarIndicadores" action="{{ url()->current() }}" method="POST" pagina="indicadores/empresas" token="{{csrf_token()}}">
                                <i class="fas fa-redo-alt"></i> Actualizar datos
                            </button>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <br>
                    <div class="container-fluid">
                        <input type="hidden" name="indicadores" id="indicadores" value="{{ $indicadores }}">
                        <input type="hidden" name="totalIndicadores" id="totalIndicadores" value="{{ $total_indicadores }}">
                        <input type="hidden" name="meses" id="meses" value="{{ $meses }}">
                        <input type="hidden" name="totaMeses" id="totalMeses" value="{{ $total_meses }}">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Gráfico de linea</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="lineChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- BAR CHART -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Gráfico de barras</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart"
                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- DONUT CHART -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Gráfico de anillas</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @php
                                    $fila = 0;
                                @endphp
                                @foreach ($indicadores as $key=>$indicador)
                                    @php
                                        $fila = $fila + 1;
                                    @endphp
                                    @if ($fila == 1)
                                        <div class="row">
                                            <div class="col-md-6">
                                                @foreach ($meses as $key=>$mes)
                                                    @if ($indicador["mes"] == $mes["codigo_mes"])
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <div class="card-title">{{$mes["nombre_mes"]}}</div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="chart">
                                                                    <canvas id="donutChart-{{$indicador["posicion"]}}"
                                                                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                    @endif
                                    @if ($fila == 2)
                                        <div class="col-md-6">
                                            @foreach ($meses as $key=>$mes)
                                                @if ($indicador["mes"] == $mes["codigo_mes"])
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <div class="card-title">{{$mes["nombre_mes"]}}</div>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="chart">
                                                                <canvas id="donutChart-{{$indicador["posicion"]}}"
                                                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    @php
                                        $fila = 0;
                                    @endphp
                                    @endif
                                @endforeach
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
@endsection
