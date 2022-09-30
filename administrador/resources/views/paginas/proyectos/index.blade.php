@extends('plantilla')

@section('content')
    @auth
        @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Director ejecutivo' || (Auth::user()->rol == 'Asistente de dirección')))
            <div class="content-wrapper" style="min-height: 243px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <h1>Gestión de proyectos</h1>
                        </div>
                        <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Proyectos</a></li>
                            <li class="breadcrumb-item active">Consultar</li>
                        </ol>
                        </div>
                    </div>
                    </div><!-- /.container-fluid -->
                </section>

                    <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <!--=============================================
                        =            Sección Información General            =
                        =============================================-->
                        <div class="card card-primary">
                        <!--==============================================
                        =            Card header - cabecera            =
                        ==============================================-->

                            <div class="card-header">
                                <h3 class="card-title">Información General</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                </div>
                            </div>

                            <!--=====  End of Card header - cabecera  ======-->

                            <!--==============================
                            =            Cuerpo            =
                            ==============================-->

                            <div class="card-body">
                                <div class="col-md-12 text-center">
                                    <a href="{{ route('proyectos.create') }}">
                                        <button class="btn btn-success col-md-5">
                                            <i class="fas fa-plus"></i> Agregar proyecto
                                        </button>
                                    </a>
                                </div>
                                <br>
                                <table id="example1" class="table table-bordered table-striped dt-responsive">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Sector</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($proyectos as $proyecto)
                                        <tr>
                                            <td>{{$proyecto->id}}</td>
                                            <td>{{$proyecto->nombre_sector}}</td>
                                            <td>{{$proyecto->nombre}}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('proyectos.edit', $proyecto->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-pencil-alt text-white"></i>
                                                    </a>
                                                    <button class="btn btn-danger btn-sm eliminarProyecto" title="Eliminar" action="{{url('/')}}/proyectos/{{$proyecto->id}}" method="DELETE" imagen_proyecto="{{$proyecto->imagen_proyecto}}" pagina="proyectos" token="{{csrf_token()}}">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Sector</th>
                                            <th>Nombre</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!--=====  End of Cuerpo  ======-->

                            <!--=====================================
                            =            Pie de pagina            =
                            =====================================-->

                            <div class="card-footer">

                            </div>

                            <!--====  End of Pie de pagina  ======-->
                        </div>
                    </div>
                </section>
            </div>
        @endif
    @endauth
    @if (Session::has('ok-guardado'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "Proyecto agregado exitosamente.",
                type: "success"
            });
        </script>
    @endif
    @if (Session::has('ok-edit'))
        <script>
            swal({
                title: "¡Bien Hecho!",
                text: "Proyecto actualizado exitosamente.",
                type: "success"
            });
        </script>
    @endif
@endsection
