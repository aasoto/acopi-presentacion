@extends('plantilla')

@section('content')
@auth
@if ((Auth::user()->rol == "Administrador") || (Auth::user()->rol == "Director ejecutivo"))
<div class="content-wrapper" style="min-height: 243px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sectores empresas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ url('afiliados/inicio') }}">Afiliados</a></li>
              <li class="breadcrumb-item active">Sectores empresas</li>
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
            <div class="card-title">Consultar sectores empresas</div>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <div class="col-md-12 text-center">
              <button class="btn btn-success col-md-6" data-toggle="modal" data-target="#ingresarSectorEmpresa">
                <i class="fas fa-plus"></i> Nuevo sector empresa
              </button>
            </div>
            <br>
            <table id="tablaSectoresEmpresas" class="table table-bordered table-hover dt-responsive">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nombre</th>
                  <th>Procedimientos</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
              <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Nombre</th>
                  <th>Procedimientos</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="card-footer"></div>
        </div>
      </div>
    </section>

  </div>

  <div class="modal" id="ingresarSectorEmpresa">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success">
          <h4 class="modal-title">Ingresar sector empresa</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{url('/')}}/afiliados/sectorempresas" method="post" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre del sector</label>
                  <input type="text" class="form-control" name="nombre" value="" required>
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

  @if (isset($status))
    @if ($status == 200)
      @foreach ($sector as $key => $value)
      <div class="modal" id="editarSector">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h4 class="modal-title">Editar sector</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{url('/')}}/afiliados/sectorempresas/{{$value["id_sector"]}}" method="post" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre del sector</label>
                      <input type="text" class="form-control" name="nombre" value="{{$value["nombre_sector"]}}" required>
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
      @endforeach
      <script>
        $("#editarSector").modal();
      </script>

      @else
      {{$status}}
    @endif
  @endif
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
    text: "Nuevo sector añadido.",
    type: "success"
  });
</script>
@endif
@if (Session::has("error"))
<script>
  swal({
    title: "¡Error!",
    text: "Hay campos vacios en el formulario.",
    type: "error"
  });
</script>
@endif
@if (Session::has("ok-editar"))
<script>
  swal({
    title: "¡Bien Hecho!",
    text: "Los datos fueron actualizados satisfactoriamente.",
    type: "success"
  });
</script>
@endif
@if (Session::has("no-borrar"))
<script>
  swal({
    title: "¡Error!",
    text: "No se puedo borrar el sector.",
    type: "error"
  });
</script>
@endif
@endsection
