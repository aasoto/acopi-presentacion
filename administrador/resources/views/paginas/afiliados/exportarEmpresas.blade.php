@extends('plantilla')

@section('content')
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
              <li class="breadcrumb-item active">Exportar</li>
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
                <div class="card-title">Tabla para exportar datos</div>
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
                      <th>NIT</th>
                      <th>Razón social</th>
                      <th>Representante</th>
                      <th>Num. empleados</th>
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Fax</th>
                      <th>Celular</th>
                      <th>Correo electronico</th>
                      <th>Sector</th>
                      <th>Productos</th>
                      <th>Ciudad</th>
                      <th>Estado</th>
                      <th>Pagos atrasados</th>
                      <th>Fecha de afiliación</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                      $contador = 1;
                    @endphp
                    @foreach ($empresas as $key => $value)
                      
                    
                    <tr>
                      <td>{{$contador++}}</td>
                      <td>{{$value["nit_empresa"]}}</td>
                      <td>{{$value["razon_social"]}}</td>
                      <td>{{$value->nombre["primer_apellido"]." ".$value->nombre["segundo_apellido"]." ".$value->nombre["primer_nombre"]." ".$value->nombre["segundo_nombre"]}}</td>
                      <td>{{$value["num_empleados"]}}</td>
                      <td>{{$value["direccion_empresa"]}}</td>
                      <td>{{$value["telefono_empresa"]}}</td>
                      <td>{{$value["fax_empresa"]}}</td>
                      <td>{{$value["celular_empresa"]}}</td>
                      <td>{{$value["email_empresa"]}}</td>
                      <td>{{$value->sector["nombre_sector"]}}</td>
                      <td>{{$value["productos_empresa"]}}</td>
                      <td>{{$value["ciudad_empresa"]}}</td>
                      <td>{{$value["estado_afiliacion_empresa"]}}</td>
                      <td>{{$value["numero_pagos_atrasados"]}}</td>
                      <td>{{$value["fecha_afiliacion_empresa"]}}</td>
                    </tr>

                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>NIT</th>
                      <th>Razón social</th>
                      <th>Representante</th>
                      <th>Num. empleados</th>
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Fax</th>
                      <th>Celular</th>
                      <th>Correo electronico</th>
                      <th>Sector</th>
                      <th>Productos</th>
                      <th>Ciudad</th>
                      <th>Estado</th>
                      <th>Pagos atrasados</th>
                      <th>Fecha de afiliación</th>
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

@endsection