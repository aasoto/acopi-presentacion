@extends('plantilla')

@section('content')
@auth
@if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos') || (Auth::user()->rol == 'Asistente de dirección') || (Auth::user()->rol == 'Director ejecutivo') || (Auth::user()->rol == 'Subdirector administrativo y financiero') || (Auth::user()->rol == 'Subdirector de desarrollo empresarial') || (Auth::user()->rol == 'Subdirector juridico'))
<div class="content-wrapper" style="min-height: 243px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Gestión empleados de afiliados</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="{{ url('afiliados/inicio') }}">Afiliados</a></li>
						<li class="breadcrumb-item active">Consultar empleados de afiliados</li>
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
					<h3 class="card-title">Consultar empleados de afiliados</h3>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
							<i class="fas fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="card-body">
					<div class="form-group">
						<div class="col-md-12 text-center">
							<button type="button" class="btn btn-info col-md-5" id="botonAfiliadosEmpleadosbirthday" name="botonAfiliadosEmpleadosbirthday" data-toggle='modal' data-target='#dateBirthday'>
								<i class="fas fa-birthday-cake"></i> Ver cumpleaños
							</button>
						</div>
					</div>
					<table id="tablaAfiliadosEmpleados" class="table table-bordered table-hover dt-responsive">
						<thead>
							<tr>
								<th>No.</th>
								<th>Tipo doc.</th>
								<th>Número documento</th>
								<th>Nombres</th>
								<th>Razón social</th>
								<th>Cargo</th>
								<th>Fecha de nacimiento</th>
								<th>Procedimientos</th>
							</tr>
						</thead>
						<tbody>
						</tbody>
						<tfoot>
							<tr>
								<th>No.</th>
								<th>Tipo doc.</th>
								<th>Número documento</th>
								<th>Nombres</th>
								<th>Razón social</th>
								<th>Cargo</th>
								<th>Fecha de nacimiento</th>
								<th>Procedimientos</th>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="card-footer">

				</div>
			</div>
		</div>
	</section>
</div>

<div class="modal" id="dateBirthday">
<div class="modal-dialog modal-sm">
	<div class="modal-content">
		<div class="modal-header bg-info">
			<h4 class="modal-title">Seleccionar fecha </h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<div class="modal-body">
			<div class="form-group">
				<input type="date" class="form-control" name="fecha_birthday" id="fecha_birthday">
			</div>
		</div>
		<div class="modal-footer justify-content-between">
			<button type="button" class="btn btn-default bg-danger" data-dismiss="modal">Cerrar</button>
			<button type="button" class="btn btn-info consultarBirthday">Consultar</button>
		</div>

	</div>
</div>
</div>
@else
	@include('paginas/errores/401')
@endif
@endauth

@endsection
