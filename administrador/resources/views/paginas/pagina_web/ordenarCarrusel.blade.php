@extends('plantilla')

@section('content')
@auth
@if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos') || (Auth::user()->rol == 'Asistente de dirección'))
<div class="content-wrapper" style="min-height: 243px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Gestionar Carrusel</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
						<li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Página web</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('pagina_web/ingresarCarrusel') }}">Carrusel</a></li>
                        <li class="breadcrumb-item active">Ordenar carrusel</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @foreach ($paginaweb as $element) @endforeach
                    @php
                        $carrousel = json_decode($element->carrusel, true);
                        $servidor = $element->servidor;
                    @endphp
                    <form action="{{url('/')}}/pagina_web/ordenarCarrusel/{{$element->id}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Editar orden de los ítems del carrusel
                                </h3>
                            </div>
                            <div class="card-body">
                                @php
                                    $num_variable = 0;
                                    $num_item = 0;
                                    $total_item = count($carrousel);
                                @endphp
                                <input type="hidden" name="indice" id="indice" value="{{$total_item}}">
                                @foreach ($carrousel as $key => $item)
                                @php $num_item++; @endphp
                                <div class="espacio-item-{{$num_item}}">
                                    <div class="card card-primary card-outline">
                                        <div class="item-{{$num_item}}">
                                            <div class="limite-{{$num_item}}">
                                                <input type="hidden" name="categoria-{{$num_variable}}" id="categoria-{{$num_variable}}" value="{{$item["categoria"]}}">
                                                <input type="hidden" name="titulo-{{$num_variable}}" id="titulo-{{$num_variable}}" value="{{$item["titulo"]}}">
                                                <input type="hidden" name="texto-{{$num_variable}}" id="texto-{{$num_variable}}" value="{{$item["texto"]}}">
                                                <input type="hidden" name="boton-1-color-{{$num_variable}}" id="boton-1-color-{{$num_variable}}" value="{{$item["boton-1-color"]}}">
                                                <input type="hidden" name="boton-1-texto-{{$num_variable}}" id="boton-1-texto-{{$num_variable}}" value="{{$item["boton-1-texto"]}}">
                                                <input type="hidden" name="url-boton-1-{{$num_variable}}" id="url-boton-1-{{$num_variable}}" value="{{$item["url-boton-1"]}}">
                                                <input type="hidden" name="boton-2-color-{{$num_variable}}" id="boton-2-color-{{$num_variable}}" value="{{$item["boton-2-color"]}}">
                                                <input type="hidden" name="boton-2-texto-{{$num_variable}}" id="boton-2-texto-{{$num_variable}}" value="{{$item["boton-2-texto"]}}">
                                                <input type="hidden" name="url-boton-2-{{$num_variable}}" id="url-boton-2-{{$num_variable}}" value="{{$item["url-boton-2"]}}">
                                                <input type="hidden" name="foto-delante-actual-{{$num_variable}}" id="foto-delante-actual-{{$num_variable}}" value="{{$item["foto-delante"]}}">
                                                <input type="hidden" name="fondo-actual-{{$num_variable}}" id="fondo-actual-{{$num_variable}}" value="{{$item["fondo"]}}">
                                                <div class="card-header">
                                                    @if ($item["titulo"] == "undefined")
                                                        <h5 class="card-title">Ítem de imagen predeterminada</h5>
                                                    @else
                                                        <h5 class="card-title">{{$item["titulo"]}}</h5>
                                                    @endif
                                                    <div class="card-tools">
                                                        <a href="#" class="btn btn-tool btn-link">#{{ $num_item; }}</a>
                                                        @if ($num_item == 1)
                                                        <button class='btn btn-default btn-sm abajo-item' id="boton-abajo-{{$num_item}}" numero_item="{{$num_item}}" numero_variable="{{$num_variable}}" total-item="{{$total_item}}" categoria="{{$item["categoria"]}}" titulo="{{$item["titulo"]}}" texto="{{$item["texto"]}}" boton-1-color="{{$item["boton-1-color"]}}" boton-1-texto="{{$item["boton-1-texto"]}}" url-boton-1="{{$item["url-boton-1"]}}" boton-2-color="{{$item["boton-2-color"]}}" boton-2-texto="{{$item["boton-2-texto"]}}" url-boton-2="{{$item["url-boton-2"]}}" foto-delante="{{$item["foto-delante"]}}" fondo="{{$item["fondo"]}}">
                                                            <i class='fas fa-arrow-down'></i>
                                                        </button>
                                                        @elseif($num_item == $total_item)
                                                        <button class='btn btn-default btn-sm arriba-item' id="boton-arriba-{{$num_item}}" numero_item="{{$num_item}}" numero_variable="{{$num_variable}}" total-item="{{$total_item}}" categoria="{{$item["categoria"]}}" titulo="{{$item["titulo"]}}" texto="{{$item["texto"]}}" boton-1-color="{{$item["boton-1-color"]}}" boton-1-texto="{{$item["boton-1-texto"]}}" url-boton-1="{{$item["url-boton-1"]}}" boton-2-color="{{$item["boton-2-color"]}}" boton-2-texto="{{$item["boton-2-texto"]}}" url-boton-2="{{$item["url-boton-2"]}}" foto-delante="{{$item["foto-delante"]}}" fondo="{{$item["fondo"]}}">
                                                            <i class='fas fa-arrow-up'></i>
                                                        </button>
                                                        @else
                                                        <button class='btn btn-default btn-sm arriba-item' id="boton-arriba-{{$num_item}}" numero_item="{{$num_item}}" numero_variable="{{$num_variable}}" total-item="{{$total_item}}" categoria="{{$item["categoria"]}}" titulo="{{$item["titulo"]}}" texto="{{$item["texto"]}}" boton-1-color="{{$item["boton-1-color"]}}" boton-1-texto="{{$item["boton-1-texto"]}}" url-boton-1="{{$item["url-boton-1"]}}" boton-2-color="{{$item["boton-2-color"]}}" boton-2-texto="{{$item["boton-2-texto"]}}" url-boton-2="{{$item["url-boton-2"]}}" foto-delante="{{$item["foto-delante"]}}" fondo="{{$item["fondo"]}}">
                                                            <i class='fas fa-arrow-up'></i>
                                                        </button>
                                                        <button class='btn btn-default btn-sm abajo-item' id="boton-abajo-{{$num_item}}" numero_item="{{$num_item}}" numero_variable="{{$num_variable}}" total-item="{{$total_item}}" categoria="{{$item["categoria"]}}" titulo="{{$item["titulo"]}}" texto="{{$item["texto"]}}" boton-1-color="{{$item["boton-1-color"]}}" boton-1-texto="{{$item["boton-1-texto"]}}" url-boton-1="{{$item["url-boton-1"]}}" boton-2-color="{{$item["boton-2-color"]}}" boton-2-texto="{{$item["boton-2-texto"]}}" url-boton-2="{{$item["url-boton-2"]}}" foto-delante="{{$item["foto-delante"]}}" fondo="{{$item["fondo"]}}">
                                                            <i class='fas fa-arrow-down'></i>
                                                        </button>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            @if ($item["texto"] == "undefined")
                                                                <p>Sin descripción</p>
                                                            @else
                                                                {{$item["texto"]}}
                                                            @endif
                                                        </div>
                                                        <div class="col-md-6">
                                                            <img src="{{$servidor.''.$item["fondo"]}}" width="200px" height="133px">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $num_variable++;
                                @endphp
                                @endforeach
                            </div>
                            <div class="card-footer">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-warning col-md-6">
                                        <i class="fas fa-reload"></i> Guardar todo
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
            text: "Información actualizada.",
            type: "success"
        });
    </script>
@endif
@if (Session::has("error"))
    <script>
        swal({
            title: "¡Error!",
            text: "Error al intentar actualizar.",
            type: "error"
        });
    </script>
@endif
@endsection
