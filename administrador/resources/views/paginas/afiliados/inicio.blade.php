@extends('plantilla')

@section('content')
<div class="content-wrapper" style="min-height: 243px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Gestión Página Web</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
						<li class="breadcrumb-item active">Afiliados</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content-header">
		<div class="container-fluid">
			<div class="card card-default color-palette-box">
				<div class="card-header">
					<h3 class="card-title">
						<i class="fas fa-address-card"></i>
						Afiliados
					</h3>
				</div>
				<div class="card-body">
					<div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
							<a href="{{ url('afiliados/consultarEmpresas') }}">
								<div class="info-box shadow">
									<span class="info-box-icon bg-primary"><i class="fas fa-store-alt"></i></span>
									<div class="info-box-content">
										<span class="info-box-number">Consultar empresas</span>
									</div>
								</div>
							</a>
						</div>
						<div class="col-md-3 col-sm-6 col-12">
							<a href="{{ url('afiliados/general') }}">
								<div class="info-box shadow">
									<span class="info-box-icon bg-primary"><i class="fas fa-id-card-alt"></i></span>
									<div class="info-box-content">
										<span class="info-box-number">Consultar afiliados</span>
									</div>
								</div>
							</a>
						</div>
                        @if ((Auth::user()->rol == "Administrador") || (Auth::user()->rol == "Director ejecutivo"))
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box shadow" data-toggle="dropdown">
                                    <span class="info-box-icon bg-primary"><i class="fas fa-edit"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-number">Editar datos predeterminados</span>
                                    </div>
                                </div>
                                <div class="dropdown-menu" role="menu">
                                <a class="dropdown-item" href="{{ url('afiliados/municipios') }}">Editar municipios del departamento</a>
                                <a class="dropdown-item" href="{{ url('afiliados/sectorempresas') }}">Editar categoría empresariales</a>
                                </div>
                            </div>
                        @endif
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

@endsection
