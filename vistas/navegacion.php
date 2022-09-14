<?php if(isset($_GET["pagina"])){
    ?> <header id="topnav" class="defaultscroll fixed-top navbar-sticky darkheader" style="background-color: #152452 !important";> <?php
}else{
    ?> <header id="topnav" class="defaultscroll fixed-top navbar-sticky darkheader"> <?php
} ?>

    <div class="container">
        <!-- Logo container-->
        <div>
            <a href="./" class="logo">
                    <img src="<?php echo 'administrador/public/'.$pagina_web["logo_navegacion"]; ?>" width="162px" height="60px">
                    <?php //echo $pagina_web["titulo_navegacion"]; ?>
            </a>
        </div>
        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu">
                <li class="has-submenu ">
                    <a href="/acopi">Inicio</a>
                </li>
                <li class="has-submenu">
                    <a href="#features">Acerca de nosotros</a>
                    <span class="menu-arrow"></span>
                    <ul class="submenu">
<!--                        <li>-->
<!--                            <a href="vistas/paginas/info-directivos.php">Información directivos</a>-->
<!--                        </li>-->
                        <li>
                            <a href="index.php?pagina=info-directivos">Información directivos </a>
                        </li>
                        <li>
                            <a href="index.php?pagina=mision">Misión y Visión</a>
                        </li>
                        <li>
                            <a href="blog-standard.html">Estatutos y codigo de ética</a>
                        </li>
                        <li>
                            <a href="index.php?pagina=organigrama">Organigrama</a>
                        </li>
                        <li>
                            <a href="blog-post.html">Alianzas estrategicas</a>
                        </li>
                    </ul>
                </li>
                <li class="has-submenu">
                    <a href="index.php?pagina=noticias&pestana=1">Noticias</a>
                </li>
                <li class="has-submenu">
                    <a href="index.php?pagina=productos">Productos y servicios</a>
                </li>
                <li class="has-submenu">
                    <a href="index.php?pagina=entrevistas">Entrevistas</a>
                </li>
                <li class="has-submenu">
                    <a href="#team">Cliente</a>
                </li>
                <li class="has-submenu">
                    <a href="#blog">Blog</a>
                </li>
                <li class="has-submenu">
                    <a href="#pages">Cuenta</a>
                    <span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li>
                            <a href="<?php echo $pagina_web['servidor'];?>">Iniciar sesión</a>
                        </li>
                        <li>
                            <a href="blog-standard.html">Solicitar cuenta.</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- End navigation menu-->
        </div>
    </div>
</header>


    <?php
if(isset($_GET["pagina"])){?>
    <br>
    <br>
<?php }
