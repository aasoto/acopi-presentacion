@extends('plantilla')

@section('content')
@auth
    @if ((Auth::user()->rol == "Administrador") || (Auth::user()->rol == "Director ejecutivo") || (Auth::user()->rol == "Asistente de dirección"))
    <div class="content-wrapper" style="min-height: 243px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Gestión empleados y pasantes</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                  <li class="breadcrumb-item"><a href="{{ url('afiliados/inicio') }}">Empleados y pasantes</a></li>
                  <li class="breadcrumb-item active">Consultar</li>
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
                <div class="card card-primary">
                  <div class="card-header">
                    <div class="card-title">Información de empleados y pasantes</div>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="col-md-12 text-center">
                      <button type="button" class="btn btn-success col-md-5 agregarEmpleadoPasante">
                        <i class="fas fa-plus"></i> Agregar nuevo empleado o pasante
                      </button>
                      <a href="{{ url('/') }}/empleados/exportar">
                        <button type="button" class="btn btn-primary col-md-5">
                          <i class="fas fa-table"></i> Exportar datos
                        </button>
                      </a>
                    </div>
                    <br>
                    <table id="tablaEmpleados" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Tipo Doc.</th>
                          <th>Num. Doc.</th>
                          <th>Nombre completo</th>
                          <th>Sexo</th>
                          <th>Fecha nacimiento</th>
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
                          <th>Sexo</th>
                          <th>Fecha nacimiento</th>
                          <th>Área</th>
                          <th>Procedimientos</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="card-footer">

                  </div>
                </div>

                <div class="card card-success collapsed-card" id="ingresarEmpleadoPasante" style="visibility: hidden;">
                  <div class="card-header">
                    <div class="card-title">Agregar empleado o pasante</div>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <form action="{{url('/')}}/empleados/general" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <input type="hidden" name="escenario" id="escenario" value="sistema">
                            <label>Tipo de documento<i style="color: red">*</i></label>
                            <select class="form-control select2bs4" name="tipo_documento" id="tipo_documento" style="width: 100%;" required>
                              @foreach ($tipos_documentos as $key => $tipo_documento)
                                @if ($tipo_documento["codigo_doc"] == "CC")
                                  <option selected="selected" value="{{$tipo_documento["codigo_doc"]}}">{{$tipo_documento["nombre_doc"]}}</option>
                                @else
                                  <option value="{{$tipo_documento["codigo_doc"]}}">{{$tipo_documento["nombre_doc"]}}</option>
                                @endif
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Número de documento<i style="color: red">*</i></label>
                            <input type="text" class="form-control" name="num_documento" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Primer nombre<i style="color: red">*</i></label>
                            <input type="text" class="form-control" name="primer_nombre" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Segundo nombre</label>
                            <input type="text" class="form-control" name="segundo_nombre">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Primer apellido<i style="color: red">*</i></label>
                            <input type="text" class="form-control" name="primer_apellido" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Segundo apellido<i style="color: red">*</i></label>
                            <input type="text" class="form-control" name="segundo_apellido" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Genero<i style="color: red">*</i></label>
                            <select class="form-control select2bs4" name="genero" id="genero" style="width: 100%;" required>
                              <option selected="selected" value="">Seleccionar... </option>
                              @foreach ($generos as $key => $genero)
                                <option value="{{$genero["codigo_genero"]}}">{{$genero["nombre_genero"]}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Fecha de nacimiento<i style="color: red">*</i></label>
                            <input type="date" class="form-control datetimepicker-input" name="fecha_nacimiento" id="fecha_nacimiento" value="@php echo date('Y-m-d') @endphp" max="@php echo date('Y-m-d') @endphp" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Correo electronico<i style="color: red">*</i></label>
                            <input type="email" class="form-control" name="email" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Rol<i style="color: red">*</i></label>
                            <select class="form-control select2bs4" name="id_rol" id="id_rol" style="width: 100%;" required>
                              <option selected="selected" value="">Seleccionar... </option>
                              @foreach ($roles as $key => $rol)
                                <option value="{{$rol["id"]}}">{{$rol["rol"]}}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Estado<i style="color: red">*</i></label>
                            <select class="form-control select2bs4" name="estado" id="estado" style="width: 100%;" required>
                              <option selected="selected" value="Empleado">Empleado</option>
                              <option value="Pasante">Pasante</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card-header">
                          <div class="card-title">Adjuntar archivos</div>
                        </div>
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <label>Foto</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="foto" id="foto">
                                  <label class="custom-file-label" for="exampleInputFile">Seleccionar imagen formato JPG, JPEG o PNG</label>
                                </div>
                              </div>
                              <div class="form-group my-2 text-center">
                                <img class="previsualizarImg_foto img-fluid py-2">
                                <p class="help-block small">Dimensiones: 500px * 400px | Peso Max. 2MB | Formato: JPG o PNG</p>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <label>Hoja de vida</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="hoja_de_vida" id="hoja_de_vida">
                                  <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo PDF</label>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <label>Archivo documento de identidad</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="cedula" id="cedula">
                                  <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo PDF, JPG o PNG</label>
                                </div>
                              </div>
                              <div class="form-group my-2 text-center">
                                <img class="previsualizarImg_cedula img-fluid py-2">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success col-md-6">
                          <i class="fas fa-check"></i> Guardar
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

        </section>

    </div>

    @if (isset($status))
      @if ($status == 200)
        @foreach ($empleado as $key => $value)
        <div class="modal" id="editarEmpleado">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <form method="POST" action="{{url('/')}}/empleados/general/{{$value["id"]}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-header bg-warning">
                  <h4 class="modal-title">Editar empleado o pasante</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="hidden" name="escenario" id="escenario" value="sistema">
                        <label>Tipo de documento<i style="color: red">*</i></label>
                        <select class="form-control select2bs4" name="tipo_documento" id="tipo_documento" style="width: 100%;" required>
                          @foreach ($tipos_documentos as $key => $tipo_documento)
                            @if ($tipo_documento["codigo_doc"] == $value["tipo_documento"])
                              <option selected="selected" value="{{$tipo_documento["codigo_doc"]}}">{{$tipo_documento["nombre_doc"]}}</option>
                            @else
                              <option value="{{$tipo_documento["codigo_doc"]}}">{{$tipo_documento["nombre_doc"]}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Número de documento<i style="color: red">*</i></label>
                        <input type="text" class="form-control" name="num_documento" value="{{$value["num_documento"]}}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Primer nombre<i style="color: red">*</i></label>
                        <input type="text" class="form-control" name="primer_nombre" value="{{$value["primer_nombre"]}}" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Segundo nombre</label>
                        <input type="text" class="form-control" name="segundo_nombre" value="{{$value["segundo_nombre"]}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Primer apellido<i style="color: red">*</i></label>
                        <input type="text" class="form-control" name="primer_apellido" value="{{$value["primer_apellido"]}}" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Segundo apellido<i style="color: red">*</i></label>
                        <input type="text" class="form-control" name="segundo_apellido" value="{{$value["segundo_apellido"]}}" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Correo electronico<i style="color: red">*</i></label>
                        <input type="email" class="form-control" name="email" value="{{$value["email"]}}" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Genero<i style="color: red">*</i></label>
                        <select class="form-control select2bs4" name="genero" id="genero" style="width: 100%;" required>

                          @foreach ($generos as $key => $genero)
                            @if ($value["sexo"] == $genero["codigo_genero"])
                              <option selected="selected" value="{{$genero["codigo_genero"]}}">{{$genero["nombre_genero"]}}</option>
                            @else
                              <option value="{{$genero["codigo_genero"]}}">{{$genero["nombre_genero"]}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Fecha de nacimiento<i style="color: red">*</i></label>
                        <input type="date" class="form-control datetimepicker-input" name="fecha_nacimiento" id="fecha_nacimiento" value="{{$value["fecha_nacimiento"]}}" max="@php echo date('Y-m-d') @endphp" required>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Rol<i style="color: red">*</i></label>
                        <select class="form-control select2bs4" name="id_rol" id="id_rol" style="width: 100%;" required>
                          @foreach ($roles as $key => $rol)
                            @if ($rol["id"] == $value["id_rol"])
                              <option selected="selected" value="{{$rol["id"]}}">{{$rol["rol"]}}</option>
                            @else
                              <option value="{{$rol["id"]}}">{{$rol["rol"]}}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Estado<i style="color: red">*</i></label>
                        <select class="form-control select2bs4" name="estado" id="estado" style="width: 100%;" required>
                          @if ($value["estado"] == "Empleado")
                            <option selected="selected" value="Empleado">Empleado</option>
                          @else
                            <option value="Empleado">Empleado</option>
                          @endif

                          @if ($value["estado"] == "Pasante")
                            <option selected="selected" value="Pasante">Pasante</option>
                          @else
                            <option value="Pasante">Pasante</option>
                          @endif
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header">
                      <div class="card-title">Adjuntar archivos</div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <label>Foto</label>
                          <input type="hidden" name="foto_actual" id="foto_actual" value="{{$value["foto"]}}">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="foto" id="foto">
                              @if ($value["foto"] == "")
                                <label class="custom-file-label" for="exampleInputFile">Seleccionar imagen formato JPG, JPEG o PNG</label>
                              @else
                                <label class="custom-file-label" for="exampleInputFile">foto_{{$value["num_documento"]}}</label>
                              @endif
                            </div>
                          </div>
                          <div class="form-group my-2 text-center">
                            @if ($value["foto"] == "")
                              <img src="" class="previsualizarImg_foto img-fluid py-2">
                              <p class="help-block small">Dimensiones: 500px * 400px | Peso Max. 2MB | Formato: JPG o PNG</p>
                            @else
                              <img src="{{ url('/') }}/{{$value["foto"]}}" class="previsualizarImg_foto img-fluid py-2">
                              <p class="help-block small">Dimensiones: 500px * 400px | Peso Max. 2MB | Formato: JPG o PNG</p>
                            @endif

                          </div>
                        </div>
                        <div class="col-md-6">
                          <label>Hoja de vida</label>
                          <input type="hidden" name="hoja_de_vida_actual" id="hoja_de_vida_actual" value="{{$value["hoja_de_vida"]}}">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="hoja_de_vida" id="hoja_de_vida">
                              @if ($value["hoja_de_vida"] == "")
                                <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo formato PDF</label>
                              @else
                                <label class="custom-file-label" for="exampleInputFile">hoja_de_vida_{{$value["num_documento"]}}.pdf</label>
                              @endif
                            </div>
                          </div>
                          @if ($value["hoja_de_vida"] == "")
                            <div class="form-group text-center">
                              <i class="fas fa-file" style="color: #adb5bd; font-size: 100px;"></i>
                              <br>
                              <h4>Hoja de vida no encontrada</h4>
                            </div>
                          @else
                            <iframe src="{{ url('/') }}/{{$value["hoja_de_vida"]}}" style="width: 80%; height: 400px;"></iframe>
                          @endif
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <label>Archivo documento de identidad</label>
                          <input type="hidden" name="cedula_actual" id="cedula_actual" value="{{$value["cedula"]}}">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" name="cedula" id="cedula">
                              @if ($value["cedula"] == "")
                                <label class="custom-file-label" for="exampleInputFile">Seleccionar archivo PDF, JPG o PNG</label>
                              @else
                                <label class="custom-file-label" for="exampleInputFile">documento_{{$value["num_documento"]}}</label>
                              @endif
                            </div>
                          </div>
                          <div class="form-group my-2 text-center">
                            @if ($tipo_cedula == "pdf")
                              @if ($value["cedula"] == "")
                                <div class="form-group text-center">
                                  <i class="fas fa-file" style="color: #adb5bd; font-size: 100px;"></i>
                                  <br>
                                  <h4>Cedula no encontrada</h4>
                                </div>
                              @else
                                <iframe src="{{ url('/') }}/{{$value["cedula"]}}" style="width: 80%; height: 400px;"></iframe>
                              @endif
                            @endif
                            @if($tipo_cedula == "imagen")
                              @if ($value["cedula"] == "")
                                <div class="form-group text-center">
                                  <img src="" class="previsualizarImg_cedula img-fluid py-2">
                                </div>
                              @else
                                <img src="{{ url('/') }}/{{$value["cedula"]}}" class="previsualizarImg_cedula img-fluid py-2">
                              @endif
                            @endif
                            @if (($tipo_cedula != "pdf") && ($tipo_cedula != "imagen"))
                              <img src="" class="previsualizarImg_cedula img-fluid py-2">
                            @endif
                          </div>
                        </div>
                      </div>
                    </div>
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
         $("#editarEmpleado").modal();
        </script>
      @else
        {{$status}}
      @endif
    @endif

    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        //Initialize Select2 Elements
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
        //File-input
        bsCustomFileInput.init();
      })
    </script>

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
@if (Session::has("ok-editar"))
<script>
  swal({
    title: "¡Bien Hecho!",
    text: "Información actualizada correctamente.",
    type: "success"
  });
</script>
@endif
@if (Session::has("ok-crear"))
<script>
  swal({
    title: "¡Bien Hecho!",
    text: "El empleado fuero ingresado correctamente al sistema.",
    type: "success"
  });
</script>
@endif
@if (Session::has("error"))
<script>
  swal({
    title: "¡Error!",
    text: "Los datos estan vacios.",
    type: "error"
  });
</script>
@endif
@if (Session::has("no-pdf"))
<script>
  swal({
    title: "¡Error!",
    text: "El archivo que usted acaba de ingresar está en un formato no permitido, por favor ingrese solo archivos en formato PDF, extensión .pdf",
    type: "error"
  });
</script>
@endif
@if (Session::has("no-foto"))
<script>
  swal({
    title: "¡Error!",
    text: "El archivo que usted acaba de ingresar está en un formato no permitido, por favor ingrese solo fotos en formato JPG o PNG, extensión .jpg, .jpeg o .png",
    type: "error"
  });
</script>
@endif
@if (Session::has("no-borrar"))
<script>
  swal({
    title: "¡Error!",
    text: "No se pudo borrar el empleado o pasante.",
    type: "error"
  });
</script>
@endif
@endsection
