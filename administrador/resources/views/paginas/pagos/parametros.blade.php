@extends('plantilla')

@section('content')
@auth
@if ((Auth::user()->rol == "Administrador") || (Auth::user()->rol == "Director ejecutivo") || (Auth::user()->rol == "Subdirector administrativo y financiero"))
<div class="content-wrapper" style="min-height: 243px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Parametros Pagos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ url('pagos/general') }}">Pagos</a></li>
              <li class="breadcrumb-item active">Parametros pagos</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="col-md-6">
          @foreach ($parametros as $key => $value)
            <div class="card card-warning">
              <div class="card-header">
                <div class="card-title">Editar parametros</div>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <form action="{{url('/')}}/pagos/parametros/{{$value["id"]}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="usuario" value="{{ Auth::user()->email }}">
                    <label>Periodo en meses para estar activo</label>
                    <input type="number" class="form-control" name="periodo_activo" value="{{$value["periodo_activo"]}}" required>
                    <label>Valor cuota</label>
                    <input type="number" class="form-control" name="valor_cuota" value="{{$value["valor_cuota"]}}" required>
                    <label>Contraseña</label>
                    <input type="password" class="form-control" name="password" required>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button type="submite" class="btn btn-warning"><i class="fas fa-reload"></i> Actualizar</button>
                </div>
              </form>
            </div>
          @endforeach
        </div>
      </div>
    </section>
  </div>
@else
    @include('paginas/errores/401')
@endif
@endauth

@if (Session::has("no-autenticacion"))
<script>
  swal({
    title: "¡Error!",
    text: "Contreseña incorrecta.",
    type: "error"
  });
</script>
@endif
@if (Session::has("error"))
<script>
  swal({
    title: "¡Error!",
    text: "Formulario vacio.",
    type: "error"
  });
</script>
@endif
@if (Session::has("no-validacion"))
<script>
  swal({
    title: "¡Error!",
    text: "Está ingresando caracteres no validos.",
    type: "error"
  });
</script>
@endif
@if (Session::has("ok-actualizar"))
<script>
  swal({
    title: "¡Bien Hecho!",
    text: "Los parametros para generar los pagos se han actualizado correctamente.",
    type: "success"
  });
</script>
@endif

@endsection
