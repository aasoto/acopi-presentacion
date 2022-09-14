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
            <h1>Cumpleaños empleados de afiliados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ url('afiliados/inicio') }}">Afiliados</a></li>
              <li class="breadcrumb-item active">Cumpleaños empleados de afiliados</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Cumpleaños empleados de afiliados</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <table id="tablaBirthdayAfiliadosEmpleados" class="table table-bordered table-hover dt-responsive">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nombres</th>
                  <th>Cargo</th>
                  <th>Empresa</th>
                  <th>Fecha de nacimiento</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $contador = 1;
                @endphp
                @foreach ($cumplimentados as $key => $value)
                  <tr>
                    <td>{{$contador++}}</td>
                    <td>{{$value["primer_apellido"]." ".$value["segundo_apellido"]." ".$value["primer_nombre"]." ".$value["segundo_nombre"]}}</td>
                    <td>{{$value["cargo_empleado_afiliado"]}}</td>
                    <td>{{$value["razon_social"]}}</td>
                    <td>{{$value["fecha_nacimiento"]}}</td>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nombres</th>
                  <th>Cargo</th>
                  <th>Empresa</th>
                  <th>Fecha de nacimiento</th>
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
@else
    @include('paginas/errores/401')
@endif
@endauth
@endsection
