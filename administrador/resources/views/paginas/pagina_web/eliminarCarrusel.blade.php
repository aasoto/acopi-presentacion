@extends('plantilla')

@section('content')
<div class="content-wrapper" style="min-height: 243px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Eliminar Carrusel</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="#">Página web</a></li>
						<li class="breadcrumb-item"><a href="#">Carrusel</a></li>
						<li class="breadcrumb-item active">Eliminar</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
		<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<!--===============================================
					=            Tarjeta eliminar carrusel            =
					================================================-->
					
					<div class="card card-primary">
						@foreach ($paginaweb as $element) @endforeach
						<div class="card-header">
							<h3 class="card-title">Editar Carrusel</h3>
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<form action="{{url('/')}}/pagina_web/eliminarCarrusel/{{$element->id}}" method="post" enctype="multipart/form-data">
							@method('PUT')
							@csrf
							<div class="card-body">
			                	<table id="tablaCarrusel" class="table">
									<thead>
										<tr>
											<th>No.</th>
											<th>Categoría</th>
											<th>Titulo</th>
											<th>Texto</th>
											<th>Fondo</th>
											<th>Eliminar</th>
										</tr>
									</thead>
									<tbody class="listadoCarrusel">
										<input type='hidden' name='carrusel' value='{{$element->carrusel}}' id='listaCarrusel'>
										@php
	                      					$carousel = json_decode($element->carrusel, true);
	                      					foreach ($carousel as $key => $value){
	                      						echo '
	                      							<tr>
	                      								<td>'.($key+1).'</td>
	                      								<td>'.$value["categoria"].'</td>
	                      								<td>'.$value["titulo"].'</td>
	                      								<td>'.$value["texto"].'</td>
	                      								<td><img src="'.$element->servidor.'/'.$value["fondo"].'" width="200px" height="133px"></td>
	                      								<td>
	                      									<div class="input-group-text" style="cursor:pointer">
	                      										<button class="btn btn-danger px-2 rounded-circle eliminarItem" titulo="'.$value["titulo"].'" texto="'.$value["texto"].'"boton-1="'.$value["boton-1"].'"boton-2="'.$value["boton-2"].'"foto-delante="'.$value["foto-delante"].'"fondo="'.$value["fondo"].'" action="'.url()->current().'/'.$element->id.'" method="PUT" pagina="pagina_web/eliminarCarrusel" token="'.csrf_token().'">
	                      											&times;
	                      										</button>
	                      									</div>
	                      								</td>
	                      							</tr>
	                      						';

	                      						/*echo '
	                      							<tr>
	                      								<td>'.($key+1).'</td>
	                      								<td>'.$value["categoria"].'</td>
	                      								<td>'.$value["titulo"].'</td>
	                      								<td>'.$value["texto"].'</td>
	                      								<td><img src="'.$element->servidor.'/'.$value["fondo"].'" width="200px" height="133px"></td>
	                      								<td>
	                      									<div class="input-group-text" style="cursor:pointer">
	                      										<span class="bg-danger px-2 rounded-circle eliminarItem" titulo="'.$value["titulo"].'" texto="'.$value["texto"].'"boton-1="'.$value["boton-1"].'"boton-2="'.$value["boton-2"].'"foto-delante="'.$value["foto-delante"].'"fondo="'.$value["fondo"].'">
	                      											&times;
	                      										</span>
	                      									</div>
	                      								</td>
	                      							</tr>
	                      						';*/
	                      					}
										@endphp
									</tbody>
									<tfoot>
										<tr>
											<th>No.</th>
											<th>Categoría</th>
											<th>Titulo</th>
											<th>Texto</th>
											<th>Fondo</th>
											<th>Eliminar</th>
										</tr>
									</tfoot>
								</table> 
							</div>
							<div class="card-footer">
								<button type="submit" class="btn btn-primary actualizarCarrusel">
				                  	<i class="fas fa-check"></i> Guardar todo
				                </button>
							</div>
						</form>
						
					</div>
					
					<!--====  End of Tarjeta eliminar carrusel  ====-->
					
				</div>
			</div>
		</div>
	</section>
</div>

  @if (Session::has("no-validacion"))
    <script>
      swal({
          title: "¡Cuidado!",
          text: "Está intentando ingresar caracteres no validos.",
          icon: "warning"
      });
    </script>
  @endif
  @if (Session::has("ok-editar"))
    <script>
      swal({
          title: "¡Bien Hecho!",
          text: "Información actualizada.",
          icon: "success"
      });
    </script>
  @endif
  @if (Session::has("error"))
    <script>
      swal({
          title: "¡Error!",
          text: "Error al intentar actualizar.",
          icon: "error"
      });
    </script>
  @endif
  @if (Session::has("no-validacion-imagen"))
    <script>
      swal({
          title: "¡Error!",
          text: "Formato incorrecto de imagen.",
          icon: "error"
      });
    </script>
  @endif

@endsection