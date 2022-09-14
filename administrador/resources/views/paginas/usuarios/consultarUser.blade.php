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
                    <li class="breadcrumb-item"><a href="{{ url('/') }}/usuarios">Usuarios</a></li>
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
                    {{--<button class="btn btn-success col-md-5" data-toggle="modal" data-target="#crearUsuario">
                        <i class="fas fa-user-plus"></i> Agregar nuevo 1
                    </button>--}}
                    <a href="{{ url('usuarios/agregarUser') }}">
                        <button class="btn btn-success col-md-5">
                        <i class="fas fa-user-plus"></i> Agregar nuevo
                        </button>
                    </a>
                    </div>
                    <table id="tablaUsuarios" class="table table-bordered table-striped dt-responsive">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombres</th>
                        <th>Correo</th>
                        <th>Foto</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                        {{--@foreach ($usuarios as $key => $value)
                        <tr>
                            <td>{{($key+1)}}</td>
                            <td>{{$value["name"]}}</td>
                            <td>{{$value["email"]}}</td>
                            <td class="text-center">
                            @if (isset($value['foto']))
                                <img src="{{ url('/') }}/{{$value['foto']}}" width="25px" height="25px"></td>
                            @else
                                <img src="{{ url('/') }}/vistas/images/usuarios/unknown.png" width="25px" height="25px"></td>
                            @endif
                            <td>
                            @if (isset($value['foto']))
                                {{$value["rol"]}}
                            @else
                                <i>Sin verificar</i>
                            @endif
                            </td>
                            <td class="text-center">
                            <div class="btn-group">
                                <a href="{{url('/')}}/usuarios/consultarUser/{{$value["id"]}}" class="btn btn-warning btn-sm">
                                <i class="fas fa-pencil-alt text-white"></i>
                                </a>
                                <button class="btn btn-danger btn-sm eliminarRegistro" action="{{url('/')}}/usuarios/consultarUser/{{$value["id"]}}" method="DELETE" pagina="usuarios/consultarUser">
                                @csrf
                                <i class="fas fa-trash-alt"></i>
                                </button>--}}
                                {{--<form method="post" action="{{url('/')}}/usuarios/consultarUser/{{$value["id"]}}">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash-alt text-white"></i>
                                </button>
                                </form>--}}
                            {{--</div>
                            </td>
                        </tr>
                        @endforeach--}}
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Nombres</th>
                        <th>Correo</th>
                        <th>Foto</th>
                        <th>Rol</th>
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
            </form>
            </div>
        </section>
    </div>

    <!--=====================================
    =            Crear usuario            =
    =====================================-->

    <div class="modal" id="crearUsuario">

        <div class="modal-dialog">

            <div class="modal-content">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="modal-header bg-success">
                <h4 class="modal-title">Crear Usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                {{-- Nombre --}}
                <div class="input-group mb-3">
                    <div class="input-group-append input-group-text">
                    <i class="fas fa-user"></i>
                    </div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="input-group mb-3">
                    <div class="input-group-append input-group-text">
                    <i class="fas fa-envelope"></i>
                    </div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="input-group mb-3">
                    <div class="input-group-append input-group-text">
                    <i class="fas fa-key"></i>
                    </div>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña mínimo de 8 caracteres">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                {{-- Confirmar Password --}}
                <div class="input-group mb-3">
                    <div class="input-group-append input-group-text">
                    <i class="fas fa-key"></i>
                    </div>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar contraseña">
                </div>
                </div>

                <div class="modal-footer d-flex justify-content-between">

                    <button type="button" class="btn btn-danger col-md-5" data-dismiss="modal"><i class="fas fa-window-close"></i> Cerrar</button>
                    <button type="submit" class="btn btn-success col-md-5"><i class="fas fa-save"></i> Guardar</button>

                </div>
            </form>
            </div>
        </div>
    </div>

    <!--=====  End of Crear usuario  ======-->

    <!--============================================
    =            Editar administrador            =
    ============================================-->

    @if (isset($status))
        @if ($status == 200)
            @foreach ($usuario as $key => $value)

            <div class="modal" id="editarUsuario">
                <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="{{url('/')}}/usuarios/consultarUser/{{$value["id"]}}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title">Editar Administrador</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">
                        {{-- Nombre --}}
                        <div class="input-group mb-3">

                            <div class="input-group-append input-group-text">
                            <i class="fas fa-user"></i><i style="color: red">*</i>
                            </div>

                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $value["name"] }}" required autocomplete="name" autofocus placeholder="Nombre">

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>

                        {{-- Email --}}
                        <div class="input-group mb-3">
                            <div class="input-group-append input-group-text">
                            <i class="fas fa-envelope"></i><i style="color: red">*</i>
                            </div>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $value["email"] }}" required autocomplete="email" placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="input-group mb-3">
                            <div class="input-group-append input-group-text">
                            <i class="fas fa-key"></i>
                            </div>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Contraseña mínimo de 8 caracteres">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <input type="hidden" name="password_actual" value="{{$value["password"]}}">

                        {{-- Rol --}}
                        <div class="input-group mb-3">
                            <div class="input-group-append input-group-text">
                            <i class="fas fa-list-ul"></i>
                            </div>
                            <select class="form-control"  name="rol" required>
                            @if ($value["rol"] == null)
                                <option value="" active>Seleccione... </option>
                                @foreach ($roles as $key => $rol)
                                <option value='{{$rol["rol"]}}'>{{$rol["rol"]}}</option>
                                @endforeach
                            @else
                                <option value='{{$value["rol"]}}' active>{{$value["rol"]}}</option>
                                @foreach ($roles as $key => $rol)
                                <option value='{{$rol["rol"]}}'>{{$rol["rol"]}}</option>
                                @endforeach
                            @endif


                            {{--@if ($value["rol"] == "administrador" || $value["rol"] == "")

                                <option value="administrador">administrador</option>
                                <option value="editor">editor</option>

                            @else

                                <option value="editor">editor</option>
                                <option value="administrador">administrador</option>

                            @endif--}}

                            </select>
                        </div>

                        {{-- Foto --}}
                        <hr class="pb-2">
                        <div class="form-group my-2 text-center">
                            <div class="btn btn-default btn-file">
                            <i class="fas fa-paperclip"></i> Adjuntar Foto
                            <input type="file" name="foto">
                            </div>
                            <br>
                            @if ($value["foto"] == null)
                            <img src="{{url('/')}}/vistas/images/usuarios/admin.png" class="previsualizarImg_foto img-fluid py-2 w-25 rounded-circle">
                            @else
                            <img src="{{url('/')}}/{{$value["foto"]}}" class="previsualizarImg_foto img-fluid py-2 w-25 rounded-circle">
                            @endif
                            <input type="hidden" value="{{$value["foto"]}}" name="imagen_actual">
                            <p class="help-block small">Dimensiones: 200px * 200px | Peso Max. 2MB | Formato: JPG o PNG</p>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <div>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        </div>
                        <div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
            @endforeach

            <script>
            $("#editarUsuario").modal();
            </script>

            @else

            {{$status}}

        @endif

    @endif

    <!--=====  End of Editar administrador  ======-->
@else
 @include('paginas/errores/401')
@endif
@endauth

<!--==========================================
=            Sección de alertas            =
==========================================-->

@if (Session::has("no-validacion"))

<script>
  swal({
    title: "¡Error!",
    text: "¡Hay campos no válidos en el formulario!",
    icon: "error"
  });
</script>

@endif

@if (Session::has("data-empty"))

<script>
  swal({
    title: "¡Error!",
    text: "No hay datos en el formulario.",
    icon: "error"
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

@if (Session::has("no-borrar"))

<script>
  swal({
    title: "¡Error!",
    text: "Este usuario no se puede eliminar.",
    icon: "error"
  });
</script>

@endif

@if (Session::has("ok-eliminar"))

  <script>
    swal({
      title: "¡Bien Hecho!",
      text: "Usuario eliminado.",
      icon: "success"
    });
 </script>

@endif

<!--=====  End of Sección de alertas  ======-->


@endsection
