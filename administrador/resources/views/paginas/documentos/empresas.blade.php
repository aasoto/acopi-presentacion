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
                  <li class="breadcrumb-item active">Consultar empresas</li>
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
                @if (url()->current() == $servidor."documentos/empresas")
                  <div class="card card-primary">
                    <div class="card-header">
                      <div class="card-title">Consultar documentación empresas</div>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <table id="tablaDocumentacionEmpresas" class="table table-bordered table-hover dt-responsive">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>NIT</th>
                            <th>Razón social</th>
                            <th>Num. doc. repr. legal</th>
                            <th>Repr. legal</th>
                            <th>Procedimientos</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th>No.</th>
                            <th>NIT</th>
                            <th>Razón social</th>
                            <th>Num. doc. repr. legal</th>
                            <th>Repr. legal</th>
                            <th>Procedimientos</th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>
                @endif

                @if (isset($status))
                  @if ($status == 200)
                    @foreach ($empresa as $key => $value)
                      <div class="card card-primary">
                        <div class="card-header">
                          <div class="card-title">Documentación empresa</div>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                              <i class="fas fa-minus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-4 col-sm-6 col-12" data-toggle="modal" data-target="#modal-carta-bienvenida">
                              <a href="#">
                                <div class="info-box shadow">
                                  <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-number">Carta de bienvenida</span>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12" data-toggle="modal" data-target="#modal-acta-compromiso">
                              <a href="#">
                                <div class="info-box shadow">
                                  <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-number">Acta de compromiso</span>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12" data-toggle="modal" data-target="#modal-estudio-afiliacion">
                              <a href="#">
                                <div class="info-box shadow">
                                  <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-number">Estudio de afiliación</span>
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4 col-sm-6 col-12" data-toggle="modal" data-target="#modal-rut">
                              <a href="#">
                                <div class="info-box shadow">
                                  <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-number">Registro Unico Tributario - RUT</span>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12" data-toggle="modal" data-target="#modal-camara-comercio">
                              <a href="#">
                                <div class="info-box shadow">
                                  <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-number">Camara de comercio</span>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12" data-toggle="modal" data-target="#modal-fechas-birthday">
                              <a href="#">
                                <div class="info-box shadow">
                                  <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
                                  <div class="info-box-content">
                                    <span class="info-box-number">Lista fechas de cumpleaños</span>
                                  </div>
                                </div>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="modal-carta-bienvenida">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Carta de bienvenida</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              @php
                                $carta_bienvenida = $servidor.$value["carta_bienvenida"];
                              @endphp
                              @if ($carta_bienvenida == $servidor)
                                <div class="form-group text-center">
                                  <i class="fas fa-file" style="color: #adb5bd; font-size: 100px;"></i>
                                  <br>
                                  <h4>Carta de bienvenida no encontrada</h4>
                                </div>
                              @else
                                <iframe src="{{$carta_bienvenida}}" style="width: 80%; height: 400px;"></iframe>
                              @endif
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <a href="{{ url('/') }}/{{$value["carta_bienvenida"]}}" class="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i>Ver en nueva pestaña</button>
                              </a>
                              <a download="Carta de bienvenida - {{$value["nit_empresa"]}} - {{$value["razon_social"]}}" href="{{ url('/') }}/{{$value["carta_bienvenida"]}}" class="">
                                <button type="button" class="btn btn-success"><i class="fas fa-download"></i> Descargar</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="modal-acta-compromiso">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Acta de compromiso</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              @php
                                $acta_compromiso = $servidor.$value["acta_compromiso"];
                              @endphp
                              @if ($acta_compromiso == $servidor)
                                <div class="form-group text-center">
                                  <i class="fas fa-file" style="color: #adb5bd; font-size: 100px;"></i>
                                  <br>
                                  <h4>Acta de compromiso no encontrada</h4>
                                </div>
                              @else
                                <iframe src="{{$acta_compromiso}}" style="width: 80%; height: 400px;"></iframe>
                              @endif
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <a href="{{ url('/') }}/{{$value["acta_compromiso"]}}" class="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i>Ver en nueva pestaña</button>
                              </a>
                              <a download="Acta de compromiso - {{$value["nit_empresa"]}} - {{$value["razon_social"]}}" href="{{ url('/') }}/{{$value["acta_compromiso"]}}" class="">
                                <button type="button" class="btn btn-success"><i class="fas fa-download"></i> Descargar</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="modal-estudio-afiliacion">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Estudio de afiliación</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              @php
                                $estudio_afiliacion = $servidor.$value["estudio_afiliacion"];
                              @endphp
                              @if ($estudio_afiliacion == $servidor)
                                <div class="form-group">
                                  <i class="fas fa-file" style="color: #adb5bd; font-size: 100px;"></i>
                                  <br>
                                  <h4>Estudio de afiliación no encontrada</h4>
                                </div>
                              @else
                                <iframe src="{{$estudio_afiliacion}}" style="width: 80%; height: 400px;"></iframe>
                              @endif
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <a href="{{ url('/') }}/{{$value["estudio_afiliacion"]}}" class="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i>Ver en nueva pestaña</button>
                              </a>
                              <a download="Estudio de afiliación - {{$value["nit_empresa"]}} - {{$value["razon_social"]}}" href="{{ url('/') }}/{{$value["estudio_afiliacion"]}}" class="">
                                <button type="button" class="btn btn-success"><i class="fas fa-download"></i> Descargar</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="modal-rut">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Registro Unico Tributario - RUT</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              @php
                                $rut = $servidor.$value["rut"];
                              @endphp
                              @if ($rut == $servidor)
                                <div class="form-group text-center">
                                  <i class="fas fa-file" style="color: #adb5bd; font-size: 100px;"></i>
                                  <br>
                                  <h4>Registro Unico Tributario RUT no encontrada</h4>
                                </div>
                              @else
                                <iframe src="{{$rut}}" style="width: 80%; height: 400px;"></iframe>
                              @endif
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <a href="{{ url('/') }}/{{$value["rut"]}}" class="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i>Ver en nueva pestaña</button>
                              </a>
                              <a download="RUT - {{$value["nit_empresa"]}} - {{$value["razon_social"]}}" href="{{ url('/') }}/{{$value["rut"]}}" class="">
                                <button type="button" class="btn btn-success"><i class="fas fa-download"></i> Descargar</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="modal-camara-comercio">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Camara de comercio</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              @php
                                $camara_comercio = $servidor.$value["camara_comercio"];
                              @endphp
                              @if ($camara_comercio == $servidor)
                                <div class="form-group text-center">
                                  <i class="fas fa-file" style="color: #adb5bd; font-size: 100px;"></i>
                                  <br>
                                  <h4>Camara de comercio no encontrada</h4>
                                </div>
                              @else
                                <iframe src="{{$camara_comercio}}" style="width: 80%; height: 400px;"></iframe>
                              @endif
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <a href="{{ url('/') }}/{{$value["camara_comercio"]}}" class="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i>Ver en nueva pestaña</button>
                              </a>
                              <a download="Camara de comercio - {{$value["nit_empresa"]}} - {{$value["razon_social"]}}" href="{{ url('/') }}/{{$value["camara_comercio"]}}" class="">
                                <button type="button" class="btn btn-success"><i class="fas fa-download"></i> Descargar</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="modal-fechas-birthday">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Fechas de cumpleaños</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              @php
                                $fechas_birthday = $servidor.$value["fechas_birthday"];
                              @endphp
                              @if ($fechas_birthday == $servidor)
                                <div class="form-group text-center">
                                  <i class="fas fa-file" style="color: #adb5bd; font-size: 100px;"></i>
                                  <br>
                                  <h4>Fechas de cumpleaños no encontradas</h4>
                                </div>
                              @else
                                <iframe src="{{$fechas_birthday}}" style="width: 80%; height: 400px;"></iframe>
                              @endif
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <a href="{{ url('/') }}/{{$value["fechas_birthday"]}}" class="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i>Ver en nueva pestaña</button>
                              </a>
                              <a download="Fecha de cumpleaños - {{$value["nit_empresa"]}} - {{$value["razon_social"]}}" href="{{ url('/') }}/{{$value["fechas_birthday"]}}" class="">
                                <button type="button" class="btn btn-success"><i class="fas fa-download"></i> Descargar</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    @endforeach
                    @foreach ($representante_empresa as $key => $value)
                      <div class="card card-primary">
                        <div class="card-header">
                          <div class="card-title">Documentación afiliado o representante legal de la empresa</div>
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
                                    <span class="info-box-number">Foto</span>
                                  </div>
                                </div>
                              </a>
                            </div>
                            <div class="col-md-4 col-sm-6 col-12" data-toggle="modal" data-target="#modal-cedula">
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
                              <h4 class="modal-title">Foto de afiliado y representate legal de la empresa</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              @php
                                $foto = $servidor.$value["foto_rprt"];
                              @endphp
                              @if ($foto == $servidor)
                                <div class="form-group text-center">
                                  <i class="fas fa-file" style="color: #adb5bd; font-size: 100px;"></i>
                                  <br>
                                  <h4>Foto no encontrada</h4>
                                </div>
                              @else
                                <img src="{{$foto}}" style="width: 300px; height: 400px;">
                              @endif
                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <a href="{{ url('/') }}/{{$value["foto_rprt"]}}" class="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i>Ver en nueva pestaña</button>
                              </a>
                              <a download="Foto - {{$value["cc_rprt_legal"]}} - {{$value["primer_apellido"]}} {{$value["segundo_apellido"]}} {{$value["primer_nombre"]}} {{$value["segundo_nombre"]}}" href="{{ url('/') }}/{{$value["foto_rprt"]}}" class="">
                                <button type="button" class="btn btn-success"><i class="fas fa-download"></i> Descargar</button>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="modal fade" id="modal-cedula">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Documento de identidad</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-center">
                              @if ($tipo_cedula == "pdf")
                                @php
                                  $pdf = $servidor.$value["foto_cedula_rprt"];
                                @endphp
                                @if ($pdf == $servidor)
                                  <div class="form-group text-center">
                                    <i class="fas fa-file-pdf" style="color: #adb5bd; font-size: 100px;"></i>
                                    <br>
                                    <h4>PDF no encontrado</h4>
                                  </div>
                                @else
                                  <iframe src="{{$pdf}}" style="width: 80%; height: 400px;"></iframe>
                                @endif
                              @endif
                              @if ($tipo_cedula == "imagen")
                                @php
                                  $foto = $servidor.$value["foto_cedula_rprt"];
                                @endphp
                                @if ($foto == $servidor)
                                  <div class="form-group text-center">
                                    <i class="fas fa-file" style="color: #adb5bd; font-size: 100px;"></i>
                                    <br>
                                    <h4>Foto no encontrada</h4>
                                  </div>
                                @else
                                  <img src="{{$foto}}" style="width: 400px; height: 400px;">
                                @endif
                              @endif

                            </div>
                            <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                              <a href="{{ url('/') }}/{{$value["foto_cedula_rprt"]}}" class="">
                                <button type="button" class="btn btn-primary"><i class="fas fa-eye"></i>Ver en nueva pestaña</button>
                              </a>
                              <a download="Documento de identidad - {{$value["cc_rprt_legal"]}} - {{$value["primer_apellido"]}} {{$value["segundo_apellido"]}} {{$value["primer_nombre"]}} {{$value["segundo_nombre"]}}" href="{{ url('/') }}/{{$value["foto_cedula_rprt"]}}" class="">
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
