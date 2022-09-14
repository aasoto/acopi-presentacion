@extends('plantilla')

@section('content')
@auth
@if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos') || (Auth::user()->rol == 'Subdirector de desarrollo empresarial'))
    <div class="content-wrapper" style="min-height: 243px;">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Gestión entrevistas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Página web</a></li>
                            <li class="breadcrumb-item active">Entrevistas</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Consultar Entrevistas</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-success col-md-6" data-toggle="modal" data-target="#crearEntrevista">
                                        <i class="fas fa-plus"></i> Nueva Entrevista
                                    </button>
                                </div>
                                <table id="tablaEntrevistas" class="table table-bordered table-hover dt-responsive">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th style="width: 200px;">Titulo</th>
                                            <th style="width: 500px;">Descripción</th>
                                            <th>Acciones</th>
                                            <th>Video</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th style="width: 200px;">Titulo</th>
                                            <th style="width: 500px;">Descripción</th>
                                            <th>Acciones</th>
                                            <th>Video</th>
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

    <div class="modal" id="crearEntrevista">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Crear Entrevista</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{url('/')}}/pagina_web/entrevistas" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo</label>
                                    <input type="text" class="form-control" name="titulo_entrevista" value="{{old("titulo_entrevista")}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Descripción</label>
                                    <textarea class="form-control" rows="6" name="descripcion_entrevista" value="{{old("descripcion_entrevista")}}"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link</label>
                                    <input type="text" class="form-control inputVideo" name="video_entrevista" id="video_entrevista" value="{{old("video_entrevista")}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer col-md-12 justify-content-between">
                        <button type="button" class="btn btn-default col-md-5 bg-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn col-md-5 btn-success">Guardar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!--=======================================
    =            Editar entrevista            =
    ========================================-->

    @if (isset($status))
        @if ($status == 200)
            @foreach ($entrevista as $key => $value)
                <div class="modal" id="editarEntrevista">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h4 class="modal-title">Editar Entrevista</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="POST" action="{{url('/')}}/pagina_web/entrevistas/{{$value["id"]}}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Titulo</label>
                                                <input type="text" class="form-control" name="titulo_entrevista" value="{{$value["titulo_entrevista"]}}" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Descripción</label>
                                                <textarea class="form-control" rows="6" name="descripcion_entrevista" value="">{{$value["descripcion_entrevista"]}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Link</label>
                                                <input type="text" class="form-control inputVideo" name="video_entrevista" id="video_entrevista" value="{{$value["video_entrevista"]}}" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer col-md-12 justify-content-between">
                                    <button type="button" class="btn btn-default col-md-5 bg-danger" data-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary col-md-5">Guardar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            @endforeach

            <script>
                $("#editarEntrevista").modal();
            </script>

            @else
            {{$status}}
        @endif
    @endif

    <!--====  End of Editar entrevista  ====-->
@else
    @include('paginas/errores/401')
@endif
@endauth


@if (Session::has("no-validacion"))
<script>
	swal({
		title: "¡Cuidado!",
		text: "Está intentando ingresar caracteres no validos.",
		type: "warning"
	});
</script>
@endif
@if (Session::has("ok-crear"))
<script>
	swal({
		title: "¡Bien Hecho!",
		text: "Información actualizada.",
		type: "success"
	});
</script>
@endif
@if (Session::has("error"))
<script>
	swal({
		title: "¡Error!",
		text: "Error al intentar actualizar.",
		type: "error"
	});
</script>
@endif

@if (Session::has("link-no-valido"))
<script>
	swal({
		title: "¡Error!",
		text: "Link del video invalido.",
		type: "error"
	});
</script>
@endif

@endsection
