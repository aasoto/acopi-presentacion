@extends('plantilla')

@section('content')
@auth
    @if ((Auth::user()->rol == "Administrador") || (Auth::user()->rol == "Director ejecutivo") || (Auth::user()->rol == "Asistente de dirección") || (Auth::user()->rol == "Subdirector juridico"))
    <div class="content-wrapper" style="min-height: 243px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Gestión Documental</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('/documentos/inicio') }}">Documentos</a></li>
                  <li class="breadcrumb-item active">Consultar empleados</li>
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
                @if (url()->current() == $servidor."documentos/empleados")
                  <div class="card card-primary">
                    <div class="card-header">
                      <div class="card-title">Consultar documentación empleados</div>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <table id="tablaDocumentacionEmpleados" class="table table-bordered table-hover dt-responsive">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Num. Doc.</th>
                            <th>Nombre completo</th>
                            <th>Área</th>
                            <th>Procedimientos</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>No.</th>
                            <th>Num. Doc.</th>
                            <th>Nombre completo</th>
                            <th>Área</th>
                            <th>Procedimientos</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                @endif

                @if (isset($status))
                  @if ($status == 200)
                    @foreach ($empleado as $key => $value)
                      <div class="card card-primary">
                        <div class="card-header">
                          <div class="card-title">Documentación empleado o pasante</div>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4 col-sm-6 col-12" data-toggle="modal" data-target="#modal-foto">
                              <a href="#">
                                <div class="info-box shadow">
                                  <span class="info-box-icon bg-primary"><i class="fas fa-portrait"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-number">Foto empleado o pasante</span>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12" data-toggle="modal" data-target="#modal-hoja-de-vida">
                              <a href="#">
                                <div class="info-box shadow">
                                  <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-number">Hoja de vida</span>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12" data-toggle="modal" data-target="#modal-documento-identidad">
                              <a href="#">
                                <div class="info-box shadow">
                                  <span class="info-box-icon bg-primary"><i class="fas fa-address-card"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-number">Documento de identidad</span>
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="modal-foto">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Foto empleado o pasante</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              @php
                                $foto = $servidor.$value["foto"];
                              @endphp
                              @if ($foto == $servidor)
                                <div class="form-group text-center">
                                  <i class="fas fa-image" style="color: #adb5bd; font-size: 100px;"></i>
                                  <br>
                                  <h4>Imagen no encontrada</h4>
                                </div>
                              @else
                                <img src="{{$foto}}" style="width: 300px; height: 400px;">
                              @endif
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <a href="{{ url('/') }}/{{$value["foto"]}}" class="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i>Ver en nueva pestaña</button>
                              </a>
                              <a download="Foto empleado - {{$value["num_documento"]}} - {{$value["primer_apellido"]}} {{$value["segundo_apellido"]}} {{$value["primer_nombre"]}} {{$value["segundo_nombre"]}}" href="{{ url('/') }}/{{$value["foto"]}}" class="">
                                <button type="button" class="btn btn-success"><i class="fas fa-download"></i> Descargar</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="modal-hoja-de-vida">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Hoja de vida</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              @php
                                $hoja_de_vida = $servidor.$value["hoja_de_vida"];
                              @endphp
                              @if ($hoja_de_vida == $servidor)
                                <div class="form-group text-center">
                                  <i class="fas fa-file" style="color: #adb5bd; font-size: 100px;"></i>
                                  <br>
                                  <h4>Hoja de vida no encontrada</h4>
                                </div>
                              @else
                                <iframe src="{{$hoja_de_vida}}" style="width: 80%; height: 400px;"></iframe>
                              @endif
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <a href="{{ url('/') }}/{{$value["hoja_de_vida"]}}" class="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i>Ver en nueva pestaña</button>
                              </a>
                              <a download="Hoja de vida - {{$value["num_documento"]}} - {{$value["primer_apellido"]}} {{$value["segundo_apellido"]}} {{$value["primer_nombre"]}} {{$value["segundo_nombre"]}}" href="{{ url('/') }}/{{$value["hoja_de_vida"]}}" class="">
                                <button type="button" class="btn btn-success"><i class="fas fa-download"></i> Descargar</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="modal-documento-identidad">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Documento de identidad</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              @php
                                $documento_identidad = $servidor.$value["cedula"];
                              @endphp
                              @if ($documento_identidad == $servidor)
                                <div class="form-group text-center">
                                  <i class="fas fa-file" style="color: #adb5bd; font-size: 100px;"></i>
                                  <br>
                                  <h4>Documento de identidad no encontrado</h4>
                                </div>
                              @else
                                @if ($tipo_cedula == "pdf")
                                  <iframe src="{{$documento_identidad}}" style="width: 80%; height: 400px;"></iframe>
                                @endif
                                @if ($tipo_cedula == "imagen")
                                  <img src="{{$documento_identidad}}">
                                @endif
                              @endif
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <a href="{{ url('/') }}/{{$value["cedula"]}}" class="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i>Ver en nueva pestaña</button>
                              </a>
                              <a download="Documento de identidad - {{$value["num_documento"]}} - {{$value["primer_apellido"]}} {{$value["segundo_apellido"]}} {{$value["primer_nombre"]}} {{$value["segundo_nombre"]}}" href="{{ url('/') }}/{{$value["cedula"]}}" class="">
                                <button type="button" class="btn btn-success"><i class="fas fa-download"></i> Descargar</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                  @endif
                @endif
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
