@extends('plantilla')

@section('content')
@auth
    @if ((Auth::user()->rol == "Administrador") || (Auth::user()->rol == "Director ejecutivo") || (Auth::user()->rol == "Asistente de dirección"))
    <div class="content-wrapper" style="min-height: 243px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Gestión empleados y pasantes</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('afiliados/inicio') }}">Empleados y pasantes</a></li>
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
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tipo documento</th>
                          <th>Número documento</th>
                          <th>Nombre completo</th>
                          <th>Genero</th>
                          <th>F. nacimiento</th>
                          <th>Rol</th>
                          <th>Estado</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                          $contador = 1;
                        @endphp
                        @foreach ($empleados as $key => $empleado)
                          <tr>
                           <td>{{$contador++}}</td>
                           <td>
                             @foreach ($tipos_documentos as $key => $tipo_documento)
                               @if ($empleado["tipo_documento"] == $tipo_documento["codigo_doc"])
                                 {{$tipo_documento["nombre_doc"]}}
                               @endif
                             @endforeach
                           </td>
                           <td>{{$empleado["num_documento"]}}</td>
                           <td>{{$empleado["primer_apellido"]}} {{$empleado["segundo_apellido"]}} {{$empleado["primer_nombre"]}} {{$empleado["segundo_nombre"]}}</td>
                           <td>
                             @foreach ($generos as $key => $genero)
                               @if ($genero["codigo_genero"] == $empleado["sexo"])
                                 {{$genero["nombre_genero"]}}
                               @endif
                             @endforeach
                           </td>
                           <td>{{$empleado["fecha_nacimiento"]}}</td>
                           <td>
                             @foreach ($roles as $key => $rol)
                               @if ($rol["id"] == $empleado["id_rol"])
                                 {{$rol["rol"]}}
                               @endif
                             @endforeach
                           </td>
                           <td>{{$empleado["estado"]}}</td>
                          </tr>
                        @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>Tipo documento</th>
                          <th>Número documento</th>
                          <th>Nombre completo</th>
                          <th>Genero</th>
                          <th>F. nacimiento</th>
                          <th>Rol</th>
                          <th>Estado</th>
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
