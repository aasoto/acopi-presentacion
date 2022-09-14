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
            <h1>Productos y Servicios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="#">Página web</a></li>
              <li class="breadcrumb-item active">Productos y Servicios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      @foreach ($paginaweb as $element) @endforeach
      <div class="container-fluid">
        <!--=====================================================
        =            Consultar productos y servicios            =
        ======================================================-->
        <form action="{{url('/')}}/pagina_web/info/productos/{{$element->id}}" method="post" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <input type="hidden" name="listaProductos" id="listaProductos" value="{{$element->productos}}">
          <input type="hidden" name="eliminar" id="eliminar" value="no">
          @php
          echo '<div class="row listadoProductos">';
            $contador = json_decode($element->productos, true);
            $total_productos = 0;
            foreach ($contador as $key => $value){
              $total_productos++;
            }
            $contador = 0;
            $filas = round($total_productos/2);
            //echo '<pre>'; print_r($total_productos); echo '</pre>';
            $productos = json_decode($element->productos, true);
            $indice = 0;
            $numero_producto = 0;
            foreach ($productos as $key => $value){
              if($numero_producto < $filas){
                echo '
                <div class="col-md-6">
                  <div class="card card-primary collapsed-card">
                    <div class="card-header">
                      <h3 class="card-title">'.$value["num"].' - '.$value["nombre"].'</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Número</label>
                            <input type="text" class="form-control" name="numero-'.$indice.'" value="'.$value["num"].'" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Nombre</label>
                            <input type="text" class="form-control" name="nombre-'.$indice.'" value="'.$value["nombre"].'" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Descripción</label>
                            <textarea class="form-control" rows="5" name="descripcion-'.$indice.'" required>'.$value["descripcion"].'</textarea>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer">
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary col-md-5">
                          <i class="fas fa-check"></i> Guardar
                        </button>
                        <button type="button" class="btn btn-danger col-md-5 eliminarProducto" num="'.$value["num"].'" nombre="'.$value["nombre"].'" descripcion="'.$value["descripcion"].'">
                          <i class="fas fa-trash"></i> Eliminar
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                ';
              }else{
                echo '
                <div class="col-md-6">
                  <div class="card card-primary collapsed-card">
                    <div class="card-header">
                      <h3 class="card-title">'.$value["num"].' - '.$value["nombre"].'</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group">
                            <label for="exampleInputPassword1">Número</label>
                            <input type="text" class="form-control" name="numero-'.$indice.'" value="'.$value["num"].'" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Nombre</label>
                            <input type="text" class="form-control" name="nombre-'.$indice.'" value="'.$value["nombre"].'" required>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Descripción</label>
                            <textarea class="form-control" rows="5" name="descripcion-'.$indice.'" required>'.$value["descripcion"].'</textarea>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer justify-content-between">
                      <div class="col-md-12 text-justify">
                        <button type="submit" class="btn btn-primary col-md-5">
                          <i class="fas fa-check"></i> Guardar
                        </button>
                        <button type="button" class="btn btn-danger col-md-5 eliminarProducto">
                          <i class="fas fa-trash"></i> Eliminar
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                ';
              }
              $indice++;
            }
            echo '
                <div class="col-md-6">
                  <div class="card card-success collapsed-card">
                    <div class="card-header">
                      <h3 class="card-title">Agregar nuevo producto</h3>
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="form-group">
                            <input type="text" class="form-control" name="numero-'.$indice.'" value="" placeholder="Número">
                          </div>
                          <div class="form-group">
                            <input type="text" class="form-control" name="nombre-'.$indice.'" value="" placeholder="Nombre">
                          </div>
                          <div class="form-group">
                            <textarea class="form-control" rows="5" name="descripcion-'.$indice.'" placeholder="Descripción"></textarea>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer">
                      <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-success col-md-10">
                          <i class="fas fa-check"></i> Guardar
                        </button>
                      </div>

                    </div>
                  </div>
                </div>
                ';
            $indice--;
            echo '<input type="hidden" name="indice" value="'.$indice.'" id="indice">';
            /*==============================================
            =            Agregar nuevo producto            =
            ==============================================*/



            /*=====  End of Agregar nuevo producto  ======*/

          echo '</div>';
          @endphp
        </form>


        <!--====  End of Consultar productos y servicios  ====-->

      </div>
    </section>
    <!-- /.content -->
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
