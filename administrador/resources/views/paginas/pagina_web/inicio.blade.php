@extends('plantilla')

@section('content')
@auth
@if (Auth::user()->rol == 'Subdirector de desarrollo empresarial')
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
                            <li class="breadcrumb-item active">Página web</li>
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
                            <i class="fas fa-globe"></i>
                            Página web
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/consultarNoticia') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-newspaper"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Noticias</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/interesados') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-comments"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Interesados</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/entrevistas') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-microphone-alt"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Entrevistas</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <a class="verInfoGral">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Información general</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ substr(url(""),0,-21) }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-eye"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Ver página web</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <ul id="arbolInfoGral" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="visibility: hidden;">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                </a>
                                <ul id="opcionesInfoGral" class="nav nav-treeview">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/gremio') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-user-tie"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Gremio y directivos</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/productos') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fab fa-product-hunt"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Productos y servicios</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/estatutos') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-balance-scale"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Estatutos y ética</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">

                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endif
@if (Auth::user()->rol == 'Subdirector de comunicaciones y eventos')
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
                            <li class="breadcrumb-item active">Página web</li>
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
                            <i class="fas fa-globe"></i>
                            Página web
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/footer?ver=footer') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-info-circle"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Pie de página</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/ingresarCarrusel') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-images"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Carrusel</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/consultarNoticia') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-newspaper"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Noticias</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/entrevistas') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-microphone-alt"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Entrevistas</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/aliados') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-handshake"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Aliados</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a class="verInfoGral">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Información general</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ substr(url(""),0,-21) }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-eye"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Ver página web</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <ul id="arbolInfoGral" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="visibility: hidden;">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                </a>
                                <ul id="opcionesInfoGral" class="nav nav-treeview">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/gremio') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-user-tie"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Gremio y directivos</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/footer?ver=footer') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="far fa-thumbs-up"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Redes sociales</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/estatutos') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-balance-scale"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Estatutos y ética</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/footer?ver=footer') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-phone-alt"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Contacto</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endif
@if (Auth::user()->rol == 'Director ejecutivo')
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
                            <li class="breadcrumb-item active">Página web</li>
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
                            <i class="fas fa-globe"></i>
                            Página web
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/logos?ver=logos') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-bahai"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Logos</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/footer?ver=footer') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-info-circle"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Pie de página</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/consultarNoticia') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-newspaper"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Noticias</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a class="verInfoGral">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Información general</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ substr(url(""),0,-21) }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-eye"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Ver página web</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <ul id="arbolInfoGral" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="visibility: hidden;">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                </a>
                                <ul id="opcionesInfoGral" class="nav nav-treeview">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/gremio') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-user-tie"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Gremio y directivos</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/footer?ver=footer') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="far fa-thumbs-up"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Redes sociales</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/estatutos') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-balance-scale"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Estatutos y ética</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/footer?ver=footer') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-phone-alt"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Contacto</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/extra') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="far fa-clock"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Extra</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endif
@if (Auth::user()->rol == 'Asistente de dirección')
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
                            <li class="breadcrumb-item active">Página web</li>
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
                            <i class="fas fa-globe"></i>
                            Página web
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/ingresarCarrusel') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-images"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Carrusel</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/consultarNoticia') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-newspaper"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Noticias</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a class="verInfoGral">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Información general</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ substr(url(""),0,-21) }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-eye"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Ver página web</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <ul id="arbolInfoGral" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="visibility: hidden;">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                </a>
                                <ul id="opcionesInfoGral" class="nav nav-treeview">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/gremio') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-user-tie"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Gremio y directivos</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/estatutos') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-balance-scale"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Estatutos y ética</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/extra') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="far fa-clock"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Extra</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endif
@if (Auth::user()->rol == 'Administrador')
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
                            <li class="breadcrumb-item active">Página web</li>
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
                            <i class="fas fa-globe"></i>
                            Página web
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/datosg?ver=datosg') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-laptop"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Datos generales</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/logos?ver=logos') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-bahai"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Logos</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/footer?ver=footer') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-info-circle"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Pie de página</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/ingresarCarrusel') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-images"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Carrusel</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/consultarNoticia') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-newspaper"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Noticias</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/interesados') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-comments"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Interesados</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/entrevistas') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-microphone-alt"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Entrevistas</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ url('pagina_web/aliados') }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-handshake"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Aliados</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <a class="verInfoGral">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Información general</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <a href="{{ substr(url(""),0,-21) }}">
                                    <div class="info-box shadow">
                                        <span class="info-box-icon bg-primary"><i class="fas fa-eye"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-number">Ver página web</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <ul id="arbolInfoGral" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="visibility: hidden;">
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                </a>
                                <ul id="opcionesInfoGral" class="nav nav-treeview">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/gremio') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-user-tie"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Gremio y directivos</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/productos') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fab fa-product-hunt"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Productos y servicios</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/footer?ver=footer') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="far fa-thumbs-up"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Redes sociales</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/estatutos') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-balance-scale"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Estatutos y ética</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/footer?ver=footer') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="fas fa-phone-alt"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Contacto</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-12">
                                            <a href="{{ url('pagina_web/info/extra') }}">
                                                <div class="info-box shadow">
                                                    <span class="info-box-icon bg-primary"><i class="far fa-clock"></i></span>
                                                    <div class="info-box-content">
                                                        <span class="info-box-number">Extra</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endif
@endauth

@endsection
