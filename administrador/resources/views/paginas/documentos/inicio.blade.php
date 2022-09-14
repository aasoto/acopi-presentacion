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
                  <li class="breadcrumb-item active">Documentos</li>
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
                <div class="card card-default color-palette-box">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fas fa-file-pdf"></i>
                      Documentación
                    </h3>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-3 col-sm-6 col-12">
                        <a href="{{ url('documentos/empresas') }}">
                          <div class="info-box shadow">
                            <span class="info-box-icon bg-primary"><i class="fas fa-store-alt"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-number">Empresas</span>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-md-3 col-sm-6 col-12">
                        <a href="{{ url('documentos/empleados') }}">
                          <div class="info-box shadow">
                            <span class="info-box-icon bg-primary"><i class="fas fa-user-friends"></i></span>
                            <div class="info-box-content">
                              <span class="info-box-number">Empleados o pasantes</span>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
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
