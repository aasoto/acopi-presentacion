

<!-- AQUI SE LLAMA A LA BARRA DE NAVEGACIÓN -->
<?php
    include "head.html";
    include "navegacion.php";
    include "paginas/carrusel-slider.php";
?>



<?php

if(isset($_GET["pagina"])){
    if($_GET["pagina"] == "noticias"){
        include "paginas/".$_GET["pagina"].".php";
    }
   /* if($_GET["pagina"] == "info-directivos"){
        include "paginas/".$_GET["pagina"].".php";
    }*/
}else{
    include "paginas/noticias.php";
}

include "paginas/productos.php";
    
?>


<!-- END FEATURES -->



<!-- START COUNTER -->
<section class="section bg-counter">
    <div class="bg-overlay-color"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading text-white">What Make Us Special?</h4>
                    <p class="title-desc text-white mt-4">Temporibus autem quibusdam officiis debitis necessitatibus eveniet voluptates repudiandae molestiae non recusandae taque earum rerum hic asperiores repellat.</p>
                    <div class="title-border-white mt-5">
                        <span class="title-icon-white">
                            <i class="pe-7s-angle-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4" id="counter">
            <div class="col-lg-3">
                <div class="counter-box text-center text-white mt-4">
                    <div class="counter-icon">
                        <i class="mdi mdi-account"></i>
                    </div>
                    <h2 class="mt-4 text-white"> <span class="counter-value" data-count="26550">2650</span><i class="mdi mdi-plus"></i></h2>
                    <p class="mt-4">Happy Users</p>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="counter-box text-center text-white mt-4">
                    <div class="counter-icon">
                        <i class="mdi mdi-apple"></i>
                    </div>
                    <h2 class="mt-4 text-white"> <span class="counter-value" data-count="34770">3470</span><i class="mdi mdi-plus"></i></h2>
                    <p class="mt-4">IOS Users</p>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="counter-box text-center text-white mt-4">
                    <div class="counter-icon">
                        <i class="mdi mdi-android"></i>
                    </div>
                    <h2 class="mt-4 text-white"> <span class="counter-value" data-count="12330">1230</span><i class="mdi mdi-plus"></i></h2>
                    <p class="mt-4">Android Users</p>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="counter-box text-center text-white mt-4">
                    <div class="counter-icon">
                        <i class="mdi mdi-arrow-down-bold"></i>
                    </div>
                    <h2 class="mt-4 text-white"> <span class="counter-value" data-count="54220">5420</span><i class="mdi mdi-plus"></i></h2>
                    <p class="mt-4">Downlode Users</p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- END COUNTER -->

<?php
include "paginas/aliados.php";
?>

    <!-- START CLIENT -->
<section class="section bg-light" id="client">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading">Client Testimonial</h4>
                    <p class="title-desc text-muted mt-4">Temporibus autem quibusdam officiis debitis necessitatibus eveniet voluptates repudiandae molestiae non recusandae taque earum rerum hic asperiores repellat.</p>
                    <div class="title-border mt-5">
                        <span class="title-icon">
                            <i class="pe-7s-angle-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4">
            <div class="col-lg-4">
                <div class="client-box mt-4 text-center p-4">
                    <div class="client-icon">
                        <i class="mdi mdi-format-quote-close"></i>
                    </div>
                    <p class="text-muted mt-4">Suspendisse faucibus fermentum elifend donec rucus tellus gravida morbi libero ullamcorpe iaculis amet tha a purus commodo starn feugiat.</p>

                    <div class="client-border mt-4"></div>

                    <h4 class="f-19 mt-4">Russell Wagner</h4>
                    <p class="text-muted mt-3">- Designer</p>

                    <div class="client-img mt-4">
                        <img src="images/users/img-1.jpg" class="img-fluid rounded-circle" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="client-box mt-4 text-center bg-white p-4">
                    <div class="client-icon">
                        <i class="mdi mdi-format-quote-close text-custom"></i>
                    </div>
                    <p class="text-muted mt-4">Viamus sodales tha consequat tellu proin felis ante dignissim elementum maxims metus augue erat condimentum lacin euismod fusce vulputate.</p>

                    <div class="client-border mt-4"></div>

                    <h4 class="f-19 mt-4 text-custom">William Harris</h4>

                    <p class="text-muted mt-3">- Maneger</p>

                    <div class="client-img mt-4">
                        <img src="images/users/img-2.jpg" class="img-fluid rounded-circle" alt="">
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="client-box mt-4 text-center p-4">
                    <div class="client-icon">
                        <i class="mdi mdi-format-quote-close"></i>
                    </div>
                    <p class="text-muted mt-4">Morbi posuere tortor scelerisque ultrices pellentesque condimentum ligula they tincidunt faucibus tellus vitae turpis consequa dolor blandit.</p>

                    <div class="client-border mt-4"></div>

                    <h4 class="f-19 mt-4">Jesus Garrison</h4>
                    <p class="text-muted mt-3">- Developer</p>

                    <div class="client-img mt-4">
                        <img src="images/users/img-3.jpg" class="img-fluid rounded-circle" alt="">
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- END CLIENT -->


<?php
include "paginas/videos.php";
?>

<!-- START PRICING -->
<section class="section" id="pricing">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading">Pricing Plan</h4>
                    <p class="title-desc text-muted mt-4">Temporibus autem quibusdam officiis debitis necessitatibus eveniet voluptates repudiandae molestiae non recusandae taque earum rerum hic asperiores repellat.</p>
                    <div class="title-border mt-5">
                        <span class="title-icon">
                            <i class="pe-7s-angle-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4">
            <div class="col-lg-4">
                <div class="pricing-box text-center p-5 mt-4">
                    <h4>Basic</h4>
                    <h6 class="mt-4">Perfact For Freelancer</h6>
                    <div class="pricing-plan mt-5">
                        <h1 class="text-custom"><sup class="f-20">$ </sup>29</h1>
                    </div>

                    <div class="mt-4">
                        <p class="text-muted">100 MB Disk Space</p>
                        <p class="text-muted">2 Subdomains</p>
                        <p class="text-muted">5 Email Accounts</p>
                        <p class="text-muted">Webmail Support</p>
                        <p class="text-muted">Customre Support 24/7</p>
                    </div>

                    <div class="mt-5">
                        <a href="" class="btn btn-custom btn-rounded">Bey Now</a>
                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="pricing-box text-center p-5 mt-4">

                    <div class="pricing-lable ">
                        <p>Most Popular</p>
                    </div>
                    <h4>Standard</h4>
                    <h6 class="mt-4">Perfact For Freelancer</h6>
                    <div class="pricing-plan mt-5">
                        <h1 class="text-custom"><sup class="f-20">$ </sup>39</h1>
                    </div>

                    <div class="mt-4">
                        <p class="text-muted">100 MB Disk Space</p>
                        <p class="text-muted">2 Subdomains</p>
                        <p class="text-muted">5 Email Accounts</p>
                        <p class="text-muted">Webmail Support</p>
                        <p class="text-muted">Customre Support 24/7</p>
                    </div>

                    <div class="mt-5">
                        <a href="" class="btn btn-custom btn-rounded">Bey Now</a>
                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="pricing-box text-center p-5 mt-4">
                    <h4>Professional</h4>
                    <h6 class="mt-4">Perfact For Freelancer</h6>
                    <div class="pricing-plan mt-5">
                        <h1 class="text-custom"><sup class="f-20">$ </sup>59</h1>
                    </div>

                    <div class="mt-4">
                        <p class="text-muted">100 MB Disk Space</p>
                        <p class="text-muted">2 Subdomains</p>
                        <p class="text-muted">5 Email Accounts</p>
                        <p class="text-muted">Webmail Support</p>
                        <p class="text-muted">Customre Support 24/7</p>
                    </div>

                    <div class="mt-5">
                        <a href="" class="btn btn-custom btn-rounded">Bey Now</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PRICING -->

<!-- START TEAM -->
<section class="section bg-light" id="team">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading">Made By Professionals</h4>
                    <p class="title-desc text-muted mt-4">Temporibus autem quibusdam officiis debitis necessitatibus eveniet voluptates repudiandae molestiae non recusandae taque earum rerum hic asperiores repellat.</p>
                    <div class="title-border mt-5">
                        <span class="title-icon">
                            <i class="pe-7s-angle-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4">
            <div class="col-lg-3">
                <div class="team-box text-center mt-4">
                    <div class="team-image">
                        <img src="images/users/img-1.jpg" class="img-fluid rounded" alt="">
                    </div>
                    <div class="team-contect p-4">
                        <h4 class="f-18">Michael J. Mullins</h4>
                        <p class="text-muted">-Devaloper</p>
                        <div>
                            <ul class="list-inline team-social mb-0">

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-facebook"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-linkedin"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-pinterest"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-twitter"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="team-box text-center mt-4">
                    <div class="team-image">
                        <img src="images/users/img-2.jpg" class="img-fluid rounded" alt="">
                    </div>
                    <div class="team-contect p-4">
                        <h4 class="f-18">James M. Angelo</h4>
                        <p class="text-muted">-Photoshop</p>
                        <div>
                            <ul class="list-inline team-social mb-0">

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-facebook"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-linkedin"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-pinterest"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-twitter"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="team-box text-center mt-4">
                    <div class="team-image">
                        <img src="images/users/img-3.jpg" class="img-fluid rounded" alt="">
                    </div>
                    <div class="team-contect p-4">
                        <h4 class="f-18">Cortez C. Meyer</h4>
                        <p class="text-muted">-Designer</p>
                        <div>
                            <ul class="list-inline team-social mb-0">

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-facebook"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-linkedin"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-pinterest"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-twitter"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="team-box text-center mt-4">
                    <div class="team-image">
                        <img src="images/users/img-4.jpg" class="img-fluid rounded" alt="">
                    </div>
                    <div class="team-contect p-4">
                        <h4 class="f-18">Andrew F. Cody</h4>
                        <p class="text-muted">-Meneger</p>
                        <div>
                            <ul class="list-inline team-social mb-0">

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-facebook"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-linkedin"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-pinterest"></i>
                                    </a>
                                </li>

                                <li class="list-inline-item">
                                    <a href="#" class="rounded">
                                        <i class="mdi mdi-twitter"></i>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- END TEAM -->

<!-- START DOWNLOAD -->
<section class="section bg-download">
    <div class="bg-overlay-color"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="download-content text-center">
                    <h3 class="text-white">Aparax App FREE Download</h3>
                    <p class="title-desc text-white mt-4">Temporibus autem quibusdam officiis debitis necessitatibus eveniet voluptates repudiandae molestiae non recusandae taque earum rerum hic asperiores repellat.</p>
                    <div class="mt-5">
                        <a href="" class="btn btn-outline-white mt-3 mr-3"><i class="mdi mdi-apple mr-2"></i> Ios</a>
                        <a href="" class="btn btn-outline-white mt-3 mr-3"><i class="mdi mdi-android mr-2"></i> Android</a>
                        <a href="" class="btn btn-outline-white mt-3 mr-3"><i class="mdi mdi-windows mr-2"></i>  Windows</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END DONWNLOAD -->

<!-- START FAQ -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading">Productos y servicios</h4>
                    <p class="title-desc text-muted mt-4">Acopi Cesar en busqueda de cumplir con su proposito y potenciar el desarrollo de los microempresarios en el departamento, les ofrece los siguiente productos y servicios.</p>
                    <div class="title-border mt-5">
                        <span class="title-icon">
                            <i class="pe-7s-angle-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4 vertical-content">
            <div class="col-lg-5">
                <div class="faq-image mt-4">
                    <img src="images/faq-img.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-lg-7">
                <div class="faq-content mt-4">
                    <div id="accordion">
                        <div class="card mt-3">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                     <span class="text-custom pr-3">01.</span>Vestibum purus nonummy.
                                    </button>
                              </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Interdum malesuada fames ante ipsum primis in faucibus Interdum malesuada fames ante ipsum primis in faucibus Maecenas gravida tempor nulla laoreet duis velit non odi eleifend auctor donec aliquam ligula in vulputate nullam ullamcorper dolor sed arcu ullamcorper a iaculis ligula convallis. 
                                </p>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                       <span class="text-custom pr-3">02.</span>Quisque rutrum ultricies.
                                    </button>
                              </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Volutpat luctus malesuada posuere accumsan risus mollis non risus suscipit dapibus nibh luctus sit amet augue eget nunc ullamcorper convalli fusce felis fermentum they gravida dolor eget pharetra ante mauris eleifend auctor ullamcorper facilisist Aliquam ullamcorper suspendisse mollis aliquam.
                                </p>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed p-3" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                       <span class="pr-3 text-custom">03.</span>Curabitur posue imperdiet.
                                    </button>
                                  </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Praesent blandit gravida fringilla quam loborti egestas vitae auctor quis sance congue orci Praesent dignissim aliquam dignissim Integer euismod tha fermentum consequat Interdum malesuada fames ante ipsum primis faucibus phasellus at porta thay strong quam facilisis a commodo tellus convallis. 
                                </p>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header" id="headingFour">
                                <h5 class="mb-0">
                                    <button class="btn btn-link p-3" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                     <span class="text-custom pr-3">04.</span>Donec hendrerit facilisis.
                                 </button>
                             </h5>
                            </div>
                            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion" style="">
                                <p class="card-body text-muted">
                                    Maecenas viverra felis bibendum placerat euismod thay sapien curabitur pellentesque volutpat rhoncus lacinia dui  leo in tempus blandit iverra ultrices placerat quis on donec scelerisque laoreet convallis Fusce magna dui placerat imperdiet eget posuere palankg kauris nulla lacus varius lacinia.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END FAQ -->

<?php 
    include "paginas/productos_completo.php";
?>

<!-- START BLOG -->
<section class="section bg-light" id="blog">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title-box text-center">
                    <h4 class="title-heading">Latest Blogs</h4>
                    <p class="title-desc text-muted mt-4">Temporibus autem quibusdam officiis debitis necessitatibus eveniet voluptates repudiandae molestiae non recusandae taque earum rerum hic asperiores repellat.</p>
                    <div class="title-border mt-5">
                        <span class="title-icon">
                            <i class="pe-7s-angle-down"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 pt-4">
            <div class="col-lg-4">
                <div class="blog-content mt-4">
                    <div class="blog-image">
                        <img src="images/blog/img-6.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="blog-lable">
                        <p class="date mb-0">14</p>
                        <p class="month mb-0">April</p>
                    </div>

                    <div class="blog-content bg-white p-4">
                        <p class="text-muted f-13 mb-0">Creative Process</p>
                        <h3 class="mt-2"><a href="" class="blog-link f-17">Printer took galley specimen book.</a></h3>
                        <p class="text-muted mt-3">Pellensque pharetra diamt ultricies pharetra tortor in tha starc amet volutpat ante staing semper smart in maximus.</p>
                        <div class="mt-4">
                            <a href="" class="read-more">Read More <i class="mdi mdi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog-content mt-4">
                    <div class="blog-image">
                        <img src="images/blog/img-7.jpg" class="img-fluid" alt="">
                    </div>

                    <div class="blog-lable">
                        <p class="date mb-0">15</p>
                        <p class="month mb-0">April</p>
                    </div>

                    <div class="blog-content bg-white p-4">
                        <p class="text-muted f-13 mb-0">Creative Process</p>
                        <h3 class="mt-2"><a href="" class="blog-link f-17">Enjoy pleasure annoying conseqes.</a></h3>
                        <p class="text-muted mt-3">Semper felis pharetr ultricies in justo ornare eget consectetur venenatis they at pharetra metus eleifend rutrum pulvinar</p>
                        <div class="mt-4">
                            <a href="" class="read-more">Read More <i class="mdi mdi-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="blog-content mt-4">
                    <div class="blog-image">
                        <img src="images/blog/img-8.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="blog-lable">
                        <p class="date mb-0">16</p>
                        <p class="month mb-0">April</p>
                    </div>
                    <div class="blog-content bg-white p-4">
                        <p class="text-muted f-13 mb-0">Creative Process</p>
                        <h3 class="mt-2"><a href="" class="blog-link f-17">Welcomed and every pain avoided. </a></h3>
                        <p class="text-muted mt-3">Curabitur pharetra quis lacia dolor convallis honcus nulla in porta stiyo vitae a eros felis iaculis sodales augue imperdiet.</p>
                        <div class="mt-4">
                            <a href="" class="read-more">Read More <i class="mdi mdi-arrow-right"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BLOG -->



<?php
include "paginas/footer.php";
include "end-head.html";