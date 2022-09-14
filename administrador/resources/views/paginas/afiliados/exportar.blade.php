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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tipo documento</th>
                      <th>Número documento</th>
                      <th>Nombre completo</th>
                      <th>F. nacimiento</th>
                      <th>Genero</th>
                      <th>Correo electronico</th>
                      <th>Telefono o celular</th>
                      <th>Foto</th>
                      <th>Documento</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($afiliados as $key => $value)
                    <tr>
                      <td>{{$value["id_rprt_legal"]}}</td>
                      <td>
                        @if ($value["tipo_documento_rprt"] == "cedula")
                          Cédula
                        @elseif ($value["tipo_documento_rprt"] == "pasaporte")
                          Pasaporte
                        @elseif ($value["tipo_documento_rprt"] == "otro")
                          Otro
                        @else
                          Sin especificar
                        @endif
                      </td>
                      <td>{{$value["cc_rprt_legal"]}}</td>
                      <td>{{$value["primer_apellido"]}} {{$value["segundo_apellido"]}} {{$value["primer_nombre"]}} {{$value["segundo_nombre"]}}</td>
                      <td>{{$value["fecha_nacimiento"]}}</td>
                      <td>
                        @if ($value["sexo_rprt"] == "m")
                          Másculino
                        @elseif ($value["sexo_rprt"] == "f")
                          Femenino
                        @else
                          Sin especificar
                        @endif
                      </td>
                      <td>{{$value["email_rprt"]}}</td>
                      <td>{{$value["telefono_rprt"]}}</td>
                      <td><img src="{{ url('/') }}/{{$value["foto_rprt"]}}"></td>
                      <td><img src="{{ url('/') }}/{{$value["foto_cedula_rprt"]}}"></td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Tipo documento</th>
                      <th>Número documento</th>
                      <th>Nombre completo</th>
                      <th>F. nacimiento</th>
                      <th>Genero</th>
                      <th>Correo electronico</th>
                      <th>Telefono o celular</th>
                      <th>Foto</th>
                      <th>Documento</th>
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