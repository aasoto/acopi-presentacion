@extends('plantilla')

@section('content')
@auth
@if (url()->current() != url('/').'/usuarios/perfil/'.Auth::user()->id)
    @include('/paginas/errores/511')
@else
<div class="content-wrapper" style="min-height: 243px;">
	<section class="content">
    	<div class="container-fluid">
    		<div class="row">
    			<br>
    			<br>
    			<br>
    		</div>
  			<div class="row">
  				<div class="col-md-3"></div>
      		<div class="col-md-6">
					  <!-- Widget: user widget style 1 -->
					  <div class="card card-widget widget-user">
						  <!-- Add the bg color to the header using any of the bg-* classes -->
						  <div class="widget-user-header bg-info">
							  <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
							  <h5 class="widget-user-desc">{{ Auth::user()->rol }}</h5>
						  </div>
						  <div class="widget-user-image">
							  <img class="img-circle elevation-2" src="{{ url('/') }}/{{ Auth::user()->foto }}" alt="User Avatar" data-toggle="modal" data-target="#modal-ver-foto" style="cursor:pointer">
						  </div>
						  <div class="card-footer">
							  <div class="row">
								  <div class="col-sm-4 border-right">

								  </div>
								  <!-- /.col -->
								  <div class="col-sm-4 border-right">
									  <div class="description-block" data-toggle="modal" data-target="#modal-editar-perfil" style="cursor:pointer">
										  <h5 class="description-header">Gestionar</h5>
										  <span class="description-text">PERFIL</span>
									  </div>
								  </div>
								  <!-- /.col -->
								  <div class="col-sm-4">

								  </div>
								  <!-- /.col -->
							  </div>
							  <!-- /.row -->
						  </div>
					  </div>
					  <!-- /.widget-user -->
				  </div>
				  <div class="col-md-3"></div>
  			</div>
      </div>

      <div class="modal fade" id="modal-ver-foto">
          <div class="modal-dialog modal-dialog-centered modal-sm">
              <div class="modal-content">
              	<div class="modal-body text-center">
              		<img src="{{ url('/') }}/{{ Auth::user()->foto }}">
              	</div>
              </div>
          </div>
      </div>

      @if (isset($status))
        @if ($status == 200)
          @foreach ($usuario as $key => $value)
            <div class="modal fade" id="modal-editar-perfil">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header bg-warning" style="cursor:pointer">
                    <h4 class="modal-title">Editar perfil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="{{url('/')}}/usuarios/perfil/{{$value["id"]}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" name="accion" id="accion" value="perfil">
                    <div class="modal-body">
                    <input type="hidden" name="foto_actual" id="foto_actual" value="{{$value["foto"]}}" required>
                    <div class="text-center">
                      <div class="contenedor">
                        <div class="btn btn-file" style="font-size: 100px;">
                          <img src="{{ url('/') }}/{{ $value["foto"] }}" class="previsualizarImg_foto_nueva img-fluid rounded-circle" style="width: 100%; height: 100%;">
                          <input type="file" name="foto_nueva">
                        </div>
                        <div class="centrado">
                          <i class="fas fa-camera"></i>
                          Cambiar foto
                        </div>
                      </div>
                      <style type="text/css">
                        .contenedor{
                          position: relative;
                          display: inline-block;
                          text-align: center;
                        }
                        .centrado{
                          position: absolute;
                          top: 50%;
                          left: 50%;
                          transform: translate(-50%, -50%);
                          font-size: 20px;
                          color: #fff;
                        }
                        .previsualizarImg_foto_nueva{
                          filter: brightness(50%);
                        }
                      </style>
                    </div>

                    <div class="form-group">
                      <label>Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$value["name"]}}" required>
                      </div>
                      <div class="card collapsed-card">
                        <div class="card-header" class="btn btn-tool" data-card-widget="collapse" style="cursor:pointer">
                          <div class="card-title">Actualizar contraseña</div>
                          <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                              <i class="fas fa-plus"></i>
                            </button>
                          </div>
                        </div>
                        <div class="card-body">
                          <div class="form-group">
                            <input type="password" class="form-control" name="password_actual" id="password_actual" placeholder="Contraseña actual" value="">
                            <br>
                            <input type="password" class="form-control" name="password_nueva_1" id="password_nueva_1" placeholder="Contrasena nueva" value="">
                            <br>
                            <input type="password" class="form-control" name="password_nueva_2" id="password_nueva_2" placeholder="Contraseña nueva confirmación" value="">
                          </div>
                          <a href="#" data-toggle="modal" data-target="#modal-instructivo-password">Ver instructivo de creación de contraseñas</a>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                      <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    </div>
                  </div>
                  </form>

                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
            </div>
          @endforeach
        @endif
        @if ($status == 404)
          <script>
            swal({
              title: "¡Error 404!",
              text: "No se encontró el usuario.",
              type: "error"
            });
          </script>
        @endif
      @endif

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
              <p>Las contraseñas aceptadas en este aplicativo deben tener minimo 6 caracteres, pero no se pueden crear contraseñas que contengan letras con tildes es decir (áéíóú) ni tampoco espacios. Los unicos caracteres especiales admitidos son los siguientes(- _ ! % ? * .).</p>
              <p>Para tener una contraseña segura y así salvaguardar los datos se recomienda la creación de contraseñas de la siguiente manera:</p>
              <ol type="A">
                <li>Longitud de contraseña: como mínimo 8 caracteres.</li>
                <li>Caracteres nuéricos: como mínimo 2 números.</li>
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
      <!-- /.modal -->

  </section>
</div>
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
@if (Session::has("ok-editar"))
<script>
  swal({
    title: "¡Bien Hecho!",
    text: "Información actualizada correctamente.",
    type: "success"
  });
</script>
@endif
@if (Session::has("password-field-empty"))
<script>
  swal({
    title: "¡Cuidado!",
    text: "Al parecer está intentando de cambiar la contraseña. Recuerde que para cambiar la contraseña de tener la contraseña actual y confirmar dos veces la nueva contraseña.",
    type: "warning"
  });
</script>
@endif
@if (Session::has("no-validacion-password"))
<script>
  swal({
    title: "¡Error!",
    text: "Contraseñas no validas. Se recomienda leer el instructivo de creación de contraseñas ubicado en la parte inferior del actualizar contraseñas.",
    type: "error"
  });
</script>
@endif
@if (Session::has("no-match-new-password"))
<script>
  swal({
    title: "¡Error!",
    text: "Las nuevas contraseñas no son iguales, verifique.",
    type: "error"
  });
</script>
@endif
@if (Session::has("no-match-current-password"))
<script>
  swal({
    title: "¡Error!",
    text: "Contraseña actual incorrecta.",
    type: "error"
  });
</script>
@endif
@if (Session::has("no-datos"))
<script>
  swal({
    title: "¡Cuidado!",
    text: "El formulario de datos está vacio.",
    type: "warning"
  });
</script>
@endif
@endsection
