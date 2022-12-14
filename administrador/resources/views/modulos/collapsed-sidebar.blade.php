<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ url('/') }}/vistas/images/logo-acopi.png" alt="ACOPI Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">ACOPIsoft</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (Auth::user()->foto == '')
            <img src="{{ url('/') }}/vistas/images/usuarios/unknown.png" class="img-circle elevation-2" alt="User Image">
          @else
            <a href="{{url('usuarios/perfil')}}/{{Auth::user()->id}}">
              <img src="{{ url('/') }}/{{ Auth::user()->foto }}" class="img-circle elevation-2" alt="User Image">
            </a>
          @endif
        </div>
        <div class="info">
          <a href="{{ url('usuarios/perfil')}}/{{Auth::user()->id}}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <!--===================================================
          =            Sección de botones del menú            =
          ===================================================-->




            <!--======================================
            =            Menú Afiliados            =
            ======================================-->
            @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos') || (Auth::user()->rol == 'Asistente de dirección') || (Auth::user()->rol == 'Subdirector de desarrollo empresarial') || (Auth::user()->rol == 'Subdirector administrativo y financiero') || (Auth::user()->rol == 'Director ejecutivo') || (Auth::user()->rol == 'Subdirector juridico'))
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-address-card"></i>
                  <p>
                    Afiliados
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ url('afiliados/general') }}" class="nav-link">
                      <i class="nav-icon fas fa-id-card-alt"></i>
                      <p>Consultar afliados</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ url('afiliados/consultarEmpresas') }}" class="nav-link">
                      <i class="nav-icon fas fa-store-alt"></i>
                      <p>Consultar empresas</p>
                    </a>
                  </li>
                </ul>
              </li>
            @endif



            <!--=====  End of Menú Afiliados  ======-->

            <!--======================================
            =            Menú Usuarios            =
            ======================================-->
            @if (Auth::user()->rol == 'Administrador')
              <li class="nav-item">
                <a href="{{ url('usuarios/consultarUser') }}" class="nav-link">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                    Usuarios
                  </p>
                </a>
              </li>
            @endif


            <!--=====  End of Menú Usuarios  ======-->

            <!--=====================================
            =            Menú de pagos            =
            =====================================-->
            @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Director ejecutivo') || (Auth::user()->rol == 'Subdirector administrativo y financiero'))
              <li class="nav-item">
                <a href="{{ url('pagos/general') }}" class="nav-link">
                  <i class="nav-icon fas fa-money-bill-alt"></i>
                  <p>
                    Pagos
                  </p>
                </a>
              </li>
            @endif


            <!--=====  End of Menú de pagos  ======-->

            <!--=====================================
            =            Menú de Citas            =
            =====================================-->
            @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Director ejecutivo') || (Auth::user()->rol == 'Subdirector de desarrollo empresarial'))
              <li class="nav-item">
                <a href="{{ url('citas/general') }}" class="nav-link">
                  <i class="nav-icon fas fa-business-time"></i>
                  <p>
                    Citas
                  </p>
                </a>
              </li>
            @endif


            <!--=====  End of Menú de Citas  ======-->

            <!--=====================================
            =            Menú de Empleados y pasantes            =
            =====================================-->
            @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Director ejecutivo') || (Auth::user()->rol == 'Asistente de dirección'))
              <li class="nav-item">
                <a href="{{ url('empleados/general') }}" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>
                    Empleados y pasantes
                  </p>
                </a>
              </li>
            @endif


            <!--=====  End of Menú de Empleados y pasantes  ======-->

            <!--=====================================
            =            Menú de Eventos            =
            =====================================-->
            @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Director ejecutivo') || (Auth::user()->rol == 'Asistente de dirección') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos'))
              <li class="nav-item">
                <a href="{{ url('eventos/general') }}" class="nav-link">
                  <i class="nav-icon fas fa-glass-cheers"></i>
                  <p>
                    Eventos
                  </p>
                </a>
              </li>
            @endif


            <!--=====  End of Menú de Eventos  ======-->

            <!--=====================================
            =            Menú de Documentos            =
            =====================================-->
            @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Director ejecutivo') || (Auth::user()->rol == 'Asistente de dirección'))
              <li class="nav-item">
                <a href="{{ url('documentos/inicio') }}" class="nav-link">
                  <i class="nav-icon fas fa-file-pdf"></i>
                  <p>
                    Documentos
                  </p>
                </a>
              </li>
            @endif

            <!--=====  End of Menú de Documentos  ======-->

            <!--=============================================
          =            Menú página web            =
          =============================================-->

          @if ((Auth::user()->rol == 'Administrador') || (Auth::user()->rol == 'Subdirector de comunicaciones y eventos') || (Auth::user()->rol == 'Asistente de dirección') || (Auth::user()->rol == 'Subdirector de desarrollo empresarial') || (Auth::user()->rol == 'Director ejecutivo'))
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-globe"></i>
                <p>
                  Página Web
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ url('pagina_web/inicio') }}" class="nav-link">
                    <i class="fas fa-ellipsis-h nav-icon"></i>
                    <p>Menú</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/datosg?ver=datosg') }}" class="nav-link">
                    <i class="fas fa-laptop nav-icon"></i>
                    <p>Datos Generales</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/logos?ver=logos') }}" class="nav-link">
                    <i class="fas fa-bahai nav-icon"></i>
                    <p>Logos</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/footer?ver=footer') }}" class="nav-link">
                    <i class="fas fa-info-circle nav-icon"></i>
                    <p>Pie de Página</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/ingresarCarrusel') }}" class="nav-link">
                    <i class="fas fa-images nav-icon"></i>
                    <p>Carrusel</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/consultarNoticia') }}" class="nav-link">
                    <i class="fas fa-newspaper nav-icon"></i>
                    <p>Noticias</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/interesados') }}" class="nav-link">
                    <i class="fas fa-comments nav-icon"></i>
                    <p>Interesados</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/entrevistas') }}" class="nav-link">
                    <i class="fas fa-microphone-alt nav-icon"></i>
                    <p>Entrevistas</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ url('pagina_web/aliados') }}" class="nav-link">
                    <i class="fas fa-handshake nav-icon"></i>
                    <p>Aliados</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="fas fa-file-alt nav-icon"></i>
                    <p>Información General
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <!--=============================================
                  =            Submenú Información           =
                  =============================================-->

                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{ url('pagina_web/info/gremio') }}" class="nav-link">
                          <i class="fas fa-user-tie nav-icon"></i>
                          <p>Gremio y directivos</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('pagina_web/info/productos') }}" class="nav-link">
                          <i class="fab fa-product-hunt nav-icon"></i>
                          <p>Productos y servicios</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('pagina_web/footer?ver=footer') }}" class="nav-link">
                          <i class="far fa-thumbs-up nav-icon"></i>
                          <p>Redes sociales</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('pagina_web/info/estatutos') }}" class="nav-link">
                          <i class="fas fa-balance-scale nav-icon"></i>
                          <p>Estatutos y etica</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{ url('pagina_web/footer?ver=footer') }}" class="nav-link">
                          <i class="fas fa-phone-alt nav-icon"></i>
                          <p>Información de contacto</p>
                        </a>
                      </li>
                    </ul>

                  <!--=====  End of Submenú Información  ======-->

                </li>
                <li class="nav-item">
                  <a href="{{ substr(url(""),0,-21) }}" class="nav-link">
                    <i class="fas fa-eye nav-icon"></i>
                    <p>Ver página web</p>
                  </a>
                </li>
              </ul>
            </li>
          @endif

          <!--=====  End of Menú página web  ======-->


          </li>

          <!--=====  End of Sección de botones del menú  ======-->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      </div>
    <!-- /.sidebar -->
  </aside>
