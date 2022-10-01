@extends('plantilla')

@section('content')
    @auth
        @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Director ejecutivo' || (Auth::user()->rol == 'Asistente de dirección')))
            <div class="content-wrapper" style="min-height: 243px;">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        <h1>Gestión de categorías</h1>
                        </div>
                        <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('pagina_web/inicio') }}">Pagina web</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('pagina_web/consultarNoticia') }}">Noticias</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('categorias.index') }}">Categorias</a></li>
                            <li class="breadcrumb-item active">Agregar</li>
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
                        <div class="card card-warning">
                        <!--==============================================
                        =            Card header - cabecera            =
                        ==============================================-->

                            <div class="card-header">
                                <h3 class="card-title">Editar categoría</h3>
                                <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                </div>
                            </div>

                            <!--=====  End of Card header - cabecera  ======-->
                            <form action="{{ route('categorias.update', $categoria->id_categoria) }}" method="post" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <!--==============================
                                =            Cuerpo            =
                                ==============================-->

                                <div class="card-body">
                                    @include('paginas.pagina_web.categorias._errors-form')
                                    @include('paginas.pagina_web.categorias._form')
                                </div>

                                <!--=====  End of Cuerpo  ======-->

                                <!--=====================================
                                =            Pie de pagina            =
                                =====================================-->

                                <div class="card-footer">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-warning col-md-6">
                                            <i class="fas fa-check"></i> Actualizar categoría
                                        </button>
                                    </div>
                                </div>

                                <!--====  End of Pie de pagina  ======-->
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        @endif
    @endauth
@endsection
