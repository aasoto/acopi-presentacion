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
            <h1>Gestión Afiliados - Empleados por empresa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ url('afiliados/inicio') }}">Afiliados</a></li>
              <li class="breadcrumb-item active">Empleados por empresa</li>
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
                <div class="card-title">Información empleados de afiliados</div>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table id="tablaExportarEmpresas" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tipo Doc.</th>
                      <th>Num. Doc.</th>
                      <th>Nombre completo</th>
                      <th>Cargo</th>
                      <th>Fecha nacimiento</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $contador = 1;
                    @endphp
                    @foreach ($empleados as $key => $value)
                    <tr>
                      <td>{{$contador++}}</td>
                      <td>{{$value["tipo_doc_empleado_afiliado"]}}</td>
                      <td>{{$value["cc_empleado_afiliado"]}}</td>
                      <td>{{$value["primer_apellido"]." ".$value["segundo_apellido"]." ".$value["primer_nombre"]." ".$value["segundo_nombre"]}}</td>
                      <td>{{$value["cargo_empleado_afiliado"]}}</td>
                      <td>{{$value["fecha_nacimiento"]}}</td>
                    </tr>

                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Tipo Doc.</th>
                      <th>Num. Doc.</th>
                      <th>Nombre completo</th>
                      <th>Cargo</th>
                      <th>Fecha nacimiento</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="card-footer">

              </div>
            </div>
          </div>
        </div>
      </div>

    </section>

</div>
@else
    @include('paginas/errores/401')
@endif
@endauth

@endsection
