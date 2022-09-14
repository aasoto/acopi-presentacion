@extends('plantilla')

@section('content')
@auth
@if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de desarrollo empresarial'))
<div class="content-wrapper" style="min-height: 243px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestión interesados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Página web</a></li>
              <li class="breadcrumb-item active">Interesados</li>
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
            <!-- Default box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Consultar Interesados</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table id="tablaInteresados" class="table table-bordered table-hover dt-responsive">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nombre</th>
                      <th>Empresa</th>
                      <th>Correo Electronico</th>
                      <th>Telefono</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No.</th>
                      <th>Nombre</th>
                      <th>Empresa</th>
                      <th>Correo Electronico</th>
                      <th>Telefono</th>
                      <th>Estado</th>
                      <th>Acciones</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">

              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>

@else
    @include('paginas/errores/401')
@endif
@endauth


@if (Session::has("ok-editar"))
<script>
  swal({
    title: "¡Bien Hecho!",
    text: "El interesado ha sido contactado.",
    type: "success"
  });
</script>
@endif
@if (Session::has("no-editar"))
<script>
  swal({
    title: "¡Error!",
    text: "El interesado no se encontró.",
    type: "error"
  });
</script>
@endif

  @endsection
