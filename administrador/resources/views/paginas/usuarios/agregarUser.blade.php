@extends('plantilla')

@section('content')
@auth
@if (Auth::user()->rol == 'Administrador')
  <div class="content-wrapper" style="min-height: 243px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestión Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/') }}/usuarios/consultarUser">Usuarios</a></li>
              <li class="breadcrumb-item active">Agregar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-success">
          <div class="card-header">
            <div class="card-title">Agregar usuario</div>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <table id="tablaEmpleadosUsuario" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tipo Doc.</th>
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
                  <th>ID</th>
                  <th>Tipo Doc.</th>
                  <th>Num. Doc.</th>
                  <th>Nombre completo</th>
                  <th>Área</th>
                  <th>Procedimientos</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
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
    title: "¡Bien hecho!",
    text: "Usuario generado correctamente.",
    type: "warning"
  });
</script>
@endif
@endsection
