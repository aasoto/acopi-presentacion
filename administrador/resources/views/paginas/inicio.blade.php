@extends('plantilla')

@section('content')
    @auth
        <div class="content-wrapper" style="min-height: 243px;">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Inicio</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a>
                                <li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    @auth
                        @if (isset($empleado))
                            @if (Hash::check($empleado[0]['num_documento'], Auth::user()->password))
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="card card-warning">
                                            <div class="card-header">
                                                <div class="card-title">Cambio de contraseña</div>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                        title="Collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <form method="POST" action="{{ url('/') }}/usuarios/perfil/{{ Auth::user()->id }}"
                                                enctype="multipart/form-data">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="accion" id="accion" value="inicio">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <h3>¡Bienvenido a ACOPIsoft!</h3>
                                                        <label>Para tener una mayor seguridad en el manejo de la información se
                                                            recomienda cambiar la contraseña generica por una que solo pueda saber
                                                            usted.</label>
                                                        <p>No recomendamos el intercambio de contraseñas, las acciones generadas con
                                                            su usuario correrán bajo su responsabilidad. Para generar con facilmente
                                                            una contraseña valida puede consultar el instructivo de creación de
                                                            contraseñas ubicado en la parte inferior del formulario.</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="password" class="form-control" name="password_1"
                                                                    placeholder="Ingrese nueva contraseña" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <input type="password" class="form-control" name="password_2"
                                                                    placeholder="Confirme la nueva contraseña" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#modal-instructivo-password">Ver instructivo de creación de
                                                        contraseñas</a>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="col-md-12 text-center">
                                                        <button type="submit" class="btn btn-warning col-md-6">
                                                            <i class="fas fa-lock"></i> Guardar contraseña
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            @else
                                @if (Auth::user()->rol == 'Administrador')
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>Afiliados</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-address-card"></i>
                                                </div>
                                                <a href="{{ url('afiliados/inicio') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-success">
                                                <div class="inner">
                                                    <h3>Usuarios</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-users"></i>
                                                </div>
                                                <a href="{{ url('usuarios/consultarUser') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3 style="color: white;">Pagos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-money-bill-alt"></i>
                                                </div>
                                                <a href="{{ url('pagos/general') }}" class="small-box-footer">
                                                    <h7 style="color: white;">Gestionar </h7><i class="fas fa-arrow-circle-right"
                                                        style="color: white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-orange">
                                                <div class="inner">
                                                    <h3 style="color: white;">Citas</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-business-time"></i>
                                                </div>
                                                <a href="{{ url('citas/general') }}" class="small-box-footer">
                                                    <h7 style="color: white;">Gestionar </h7><i class="fas fa-arrow-circle-right"
                                                        style="color: white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-danger">
                                                <div class="inner">
                                                    <h3>Empleados</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-user-friends"></i>
                                                </div>
                                                <a href="{{ url('empleados/general') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-fuchsia">
                                                <div class="inner">
                                                    <h3>Eventos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-glass-cheers"></i>
                                                </div>
                                                <a href="{{ url('eventos/general') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-gray">
                                                <div class="inner">
                                                    <h3>Documentos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-file-pdf"></i>
                                                </div>
                                                <a href="{{ url('documentos/inicio') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-purple">
                                                <div class="inner">
                                                    <h3>Indicadores</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-chart-bar"></i>
                                                </div>
                                                <a href="{{ url('indicadores/inicio') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-lime">
                                                <div class="inner">
                                                    <h3>Proyectos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-project-diagram"></i>
                                                </div>
                                                <a href="{{ url('proyectos') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (Auth::user()->rol == 'Director ejecutivo')
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>Afiliados</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-address-card"></i>
                                                </div>
                                                <a href="{{ url('afiliados/inicio') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3 style="color: white;">Pagos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-money-bill-alt"></i>
                                                </div>
                                                <a href="{{ url('pagos/general') }}" class="small-box-footer">
                                                    <h7 style="color: white;">Gestionar </h7><i class="fas fa-arrow-circle-right"
                                                        style="color: white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-orange">
                                                <div class="inner">
                                                    <h3 style="color: white;">Citas</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-business-time"></i>
                                                </div>
                                                <a href="{{ url('citas/general') }}" class="small-box-footer">
                                                    <h7 style="color: white;">Gestionar </h7><i class="fas fa-arrow-circle-right"
                                                        style="color: white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-danger">
                                                <div class="inner">
                                                    <h3>Empleados</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-user-friends"></i>
                                                </div>
                                                <a href="{{ url('empleados/general') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-fuchsia">
                                                <div class="inner">
                                                    <h3>Eventos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-glass-cheers"></i>
                                                </div>
                                                <a href="{{ url('eventos/general') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-gray">
                                                <div class="inner">
                                                    <h3>Documentos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-file-pdf"></i>
                                                </div>
                                                <a href="{{ url('documentos/inicio') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-lime">
                                                <div class="inner">
                                                    <h3>Proyectos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-project-diagram"></i>
                                                </div>
                                                <a href="{{ url('proyectos') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (Auth::user()->rol == 'Subdirector administrativo y financiero')
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>Afiliados</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-address-card"></i>
                                                </div>
                                                <a href="{{ url('afiliados/inicio') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-warning">
                                                <div class="inner">
                                                    <h3 style="color: white;">Pagos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-money-bill-alt"></i>
                                                </div>
                                                <a href="{{ url('pagos/general') }}" class="small-box-footer">
                                                    <h7 style="color: white;">Gestionar </h7><i class="fas fa-arrow-circle-right"
                                                        style="color: white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (Auth::user()->rol == 'Subdirector de desarrollo empresarial')
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>Afiliados</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-address-card"></i>
                                                </div>
                                                <a href="{{ url('afiliados/inicio') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-orange">
                                                <div class="inner">
                                                    <h3 style="color: white;">Citas</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-business-time"></i>
                                                </div>
                                                <a href="{{ url('citas/general') }}" class="small-box-footer">
                                                    <h7 style="color: white;">Gestionar </h7><i class="fas fa-arrow-circle-right"
                                                        style="color: white;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (Auth::user()->rol == 'Subdirector juridico')
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>Afiliados</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-address-card"></i>
                                                </div>
                                                <a href="{{ url('afiliados/inicio') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (Auth::user()->rol == 'Subdirector de comunicaciones y eventos')
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>Afiliados</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-address-card"></i>
                                                </div>
                                                <a href="{{ url('afiliados/inicio') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-fuchsia">
                                                <div class="inner">
                                                    <h3>Eventos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-glass-cheers"></i>
                                                </div>
                                                <a href="{{ url('eventos/general') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if (Auth::user()->rol == 'Asistente de dirección')
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-info">
                                                <div class="inner">
                                                    <h3>Afiliados</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-address-card"></i>
                                                </div>
                                                <a href="{{ url('afiliados/inicio') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-danger">
                                                <div class="inner">
                                                    <h3>Empleados</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-user-friends"></i>
                                                </div>
                                                <a href="{{ url('empleados/general') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-fuchsia">
                                                <div class="inner">
                                                    <h3>Eventos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-glass-cheers"></i>
                                                </div>
                                                <a href="{{ url('eventos/general') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-gray">
                                                <div class="inner">
                                                    <h3>Documentos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-file-pdf"></i>
                                                </div>
                                                <a href="{{ url('documentos/inicio') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-6">
                                            <!-- small box -->
                                            <div class="small-box bg-lime">
                                                <div class="inner">
                                                    <h3>Proyectos</h3>
                                                    <br>
                                                    <br>
                                                </div>
                                                <div class="icon">
                                                    <i class="fas fa-project-diagram"></i>
                                                </div>
                                                <a href="{{ url('proyectos') }}" class="small-box-footer">Gestionar <i
                                                        class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div class="row">

                                    {{-- <div class="col-lg-3 col-6">
                  <!-- small box -->
                  <div class="small-box bg-indigo">
                    <div class="inner">
                      <h3>Página web</h3>
                      <br>
                      <br>
                    </div>
                    <div class="icon">
                      <i class="fas fa-globe"></i>
                    </div>
                    <a href="{{ url('pagina_web/inicio') }}" class="small-box-footer">Gestionar <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                @if (Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Subdirector de comunicaciones y eventos' || Auth::user()->rol == 'Asistente de dirección' || Auth::user()->rol == 'Subdirector de desarrollo empresarial' || Auth::user()->rol == 'Subdirector administrativo y financiero' || Auth::user()->rol == 'Director ejecutivo')
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                        <div class="inner">
                            <h3>Afiliados</h3>
                            <br>
                            <br>
                        </div>
                        <div class="icon">
                            <i class="fas fa-address-card"></i>
                        </div>
                        <a href="{{ url('afiliados/inicio') }}" class="small-box-footer">Gestionar <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif
                @if (Auth::user()->rol == 'Administrador')
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Usuarios</h3>
                            <br>
                            <br>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ url('usuarios/consultarUser') }}" class="small-box-footer">Gestionar <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif
                @if (Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Director ejecutivo' || Auth::user()->rol == 'Subdirector administrativo y financiero')
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                        <div class="inner">
                            <h3 style="color: white;">Pagos</h3>
                            <br>
                            <br>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-bill-alt"></i>
                        </div>
                        <a href="{{ url('pagos/general') }}" class="small-box-footer"><h7 style="color: white;">Gestionar </h7><i class="fas fa-arrow-circle-right" style="color: white;"></i></a>
                        </div>
                    </div>
                @endif
                @if (Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Director ejecutivo' || Auth::user()->rol == 'Subdirector de desarrollo empresarial')
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-orange">
                        <div class="inner">
                            <h3 style="color: white;">Citas</h3>
                            <br>
                            <br>
                        </div>
                        <div class="icon">
                            <i class="fas fa-business-time"></i>
                        </div>
                        <a href="{{url('citas/general')}}" class="small-box-footer"><h7 style="color: white;">Gestionar </h7><i class="fas fa-arrow-circle-right" style="color: white;"></i></a>
                        </div>
                    </div>
                @endif
              </div>
              <div class="row">
                @if (Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Director ejecutivo' || Auth::user()->rol == 'Asistente de dirección')
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>Empleados</h3>
                            <br>
                            <br>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-friends"></i>
                        </div>
                        <a href="{{url('empleados/general')}}" class="small-box-footer">Gestionar <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif
                @if (Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Director ejecutivo' || Auth::user()->rol == 'Asistente de dirección' || Auth::user()->rol == 'Subdirector de comunicaciones y eventos')
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-fuchsia">
                        <div class="inner">
                            <h3>Eventos</h3>
                            <br>
                            <br>
                        </div>
                        <div class="icon">
                            <i class="fas fa-glass-cheers"></i>
                        </div>
                        <a href="{{ url('eventos/general') }}" class="small-box-footer">Gestionar <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif
                @if (Auth::user()->rol == 'Administrador' || Auth::user()->rol == 'Director ejecutivo' || Auth::user()->rol == 'Asistente de dirección')
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-gray">
                        <div class="inner">
                            <h3>Documentos</h3>
                            <br>
                            <br>
                        </div>
                        <div class="icon">
                            <i class="fas fa-file-pdf"></i>
                        </div>
                        <a href="{{ url('documentos/inicio') }}" class="small-box-footer">Gestionar <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endif --}}
                                </div>
                            @endif
                        @endif
                    @endauth
                </div>

                <div class="modal fade" id="modal-instructivo-password">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Instructivo de creación de contraseñas</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Las contraseñas aceptadas en este aplicativo deben tener minimo 6 caracteres, pero no se
                                    pueden crear contraseñas que contengan letras con tildes es decir (áéíóú) ni tampoco
                                    espacios. Los unicos caracteres especiales admitidos son los siguientes(- _ ! % ? * .).</p>
                                <p>Para tener una contraseña segura y así salvaguardar los datos se recomienda la creación de
                                    contraseñas de la siguiente manera:</p>
                                <ol type="A">
                                    <li>Longitud de contraseña: como mínimo 8 caracteres.</li>
                                    <li>Caracteres numéricos: como mínimo 2 números.</li>
                                    <li>Caracteres especiales: como mínimo 1 carácter.</li>
                                    <li>Letras mayúsculas: como mínimo 1 letra mayúscula.</li>
                                    <li>Letras minúsculas: como mínimo 1 letra minúscula.</li>
                                </ol>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </section>
            <!-- /.content -->
        </div>
    @endauth
    @if (Session::has('no-editar'))
        <script>
            swal({
                title: "¡Error!",
                text: "No se pudo cambiar el modo.",
                type: "error"
            });
        </script>
    @endif
    @if (Session::has('no-validacion'))
        <script>
            swal({
                title: "¡Cuidado!",
                text: "Está intentando ingresar caracteres no validos.",
                type: "warning"
            });
        </script>
    @endif
    @if (Session::has('ok-editar'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "Información actualizada correctamente.",
                type: "success"
            });
        </script>
    @endif
    @if (Session::has('no-match-new-password'))
        <script>
            swal({
                title: "¡Error!",
                text: "Las nuevas contraseñas no son iguales, verifique.",
                type: "error"
            });
        </script>
    @endif
    @if (Session::has('no-datos'))
        <script>
            swal({
                title: "¡Cuidado!",
                text: "El formulario de datos está vacio.",
                type: "warning"
            });
        </script>
    @endif
@endsection
