<?php

namespace Database\Factories;

use App\PaginaWebModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\PaginaWebModel>
 */
class PaginaWebModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = PaginaWebModel::class;

    public function definition()
    {
        return [
            'dominio' => 'https://www.acopicesar.org',
        'servidor' => 'http://localhost/',
        'titulo_pestana' => 'ACOPI - Cesar',
        'titulo_pagina' => 'ACOPI - Cesar',
        'logo_navegacion' => 'vistas/images/pagina_web/8804.png',
        'logo_pestana' => 'vistas/images/pagina_web/7536.png',
        'titulo_navegacion' => 'ACOPI - CESAR',
        'descripcion' => 'Página oficial de la asociación de las medianas y pequeñas industrias del Cesar, aquí encontrarás toda la información de nuestra agremiación.',
        'palabras_claves' => '["acopi","cesar","acopicesar","valledupar","agremiacion","agremiados","microempresarios","pymes","colombia","citas"]',
        'carrusel' => '[{
            "categoria": "Noticias",
            "titulo": "¡LLEGA EL 2022 Y ES MOMENTO DE PONERTE AL DÍA!",
            "texto": "Comienza la transformación de los microempresarios en el departamento del Cesar.<b>¡Reactivate de inmediato!</b>",
            "boton-1-color": "bg-navy",
            "boton-1-texto": "Ver más",
            "url-boton-1": "https://www.google.com/",
            "boton-2-color": "",
            "boton-2-texto": "",
            "url-boton-2": "https://www.google.com.co/",
            "foto-delante": "",
            "fondo": "vistas/images/pagina_web/carrusel/quinta.jpg"
        },{
            "categoria": "Capacitación",
            "titulo": "¡Ya comienza el festival! y es hora de planear.",
            "texto": "Capacitación sobre como aprovechar la afluencia masiva de turistas (sector hotelero) y como incrementar las ventas (sector comercial). Dictado por la Doctora Alexandra Márquez.",
            "boton-1-color": "bg-primary",
            "boton-1-texto": "Inscripción",
            "url-boton-1": "https://www.google.com/",
            "boton-2-color": "",
            "boton-2-texto": "",
            "url-boton-2": "",
            "foto-delante": "vistas/images/pagina_web/carrusel/2423.jpg",
            "fondo": "vistas/images/pagina_web/carrusel/9693.jpg"
        },{
            "categoria": "Noticias",
            "titulo": "Descarga la App de la DIAN en Android o iPhone",
            "texto": "Invitamos a todos nuestro agremiados a descargar la aplicación de la DIAN en todos sus dispositivos moviles y así matenerse actualizados de todas las novedades tributarias del momento.",
            "boton-1-color": "",
            "boton-1-texto": "",
            "url-boton-1": "https://www.google.com/",
            "boton-2-color": "",
            "boton-2-texto": "",
            "url-boton-2": "https://www.google.com/",
            "foto-delante": "vistas/images/pagina_web/carrusel/2703.png",
            "fondo": "vistas/images/pagina_web/carrusel/7085.jpg"
        },{
            "categoria": "Noticias",
            "titulo": "¡EMPIEZA EL AÑO 2022!",
            "texto": "Este año tus ingresos crecerán.",
            "boton-1-color": "",
            "boton-1-texto": "",
            "url-boton-1": "https://www.google.com/",
            "boton-2-color": "",
            "boton-2-texto": "",
            "url-boton-2": "",
            "foto-delante": "",
            "fondo": "vistas/images/pagina_web/carrusel/31551.jpg"
        },{
            "categoria": "Capacitación",
            "titulo": "¿CÓMO TENER UN PÁGINA WEB?",
            "texto": "Capacitación sobre como poner acceder a la sistematización de procesos empresariales.",
            "boton-1-color": "",
            "boton-1-texto": "",
            "url-boton-1": "",
            "boton-2-color": "",
            "boton-2-texto": "",
            "url-boton-2": "",
            "foto-delante": "vistas/images/pagina_web/carrusel/89315.png",
            "fondo": "vistas/images/pagina_web/carrusel/31967.jpg"
        },{
            "categoria": "Noticias",
            "titulo": "AUMENTO EN EL PIB NACIONAL",
            "texto": "Al final del 2021 se registró un alza del 10% en el PIB del país.",
            "boton-1-color": "",
            "boton-1-texto": "",
            "url-boton-1": "",
            "boton-2-color": "",
            "boton-2-texto": "",
            "url-boton-2": "",
            "foto-delante": "",
            "fondo": "vistas/images/pagina_web/carrusel/64137.png"
        },{
            "categoria": "Otros",
            "titulo": "PRUEBA VENDER EN LINEA",
            "texto": "A través de las ventas en línea y promoción de productos por medio de las redes sociales puedes atraer nuevos clientes.",
            "boton-1-color": "",
            "boton-1-texto": "",
            "url-boton-1": "",
            "boton-2-color": "",
            "boton-2-texto": "",
            "url-boton-2": "",
            "foto-delante": "",
            "fondo": "vistas/images/pagina_web/carrusel/97296.jpg"
        },{
            "categoria": "undefined",
            "titulo": "undefined",
            "texto": "undefined",
            "boton-1-color": "",
            "boton-1-texto": "",
            "url-boton-1": "",
            "boton-2-color": "",
            "boton-2-texto": "",
            "url-boton-2": "",
            "foto-delante": "",
            "fondo": "vistas/images/pagina_web/carrusel/77108.jpg"
        },{
            "categoria": "undefined",
            "titulo": "undefined",
            "texto": "undefined",
            "boton-1-color": "",
            "boton-1-texto": "",
            "url-boton-1": "",
            "boton-2-color": "",
            "boton-2-texto": "",
            "url-boton-2": "",
            "foto-delante": "",
            "fondo": "vistas/images/pagina_web/carrusel/19974.jpg"
        },{
            "categoria": "Capacitación",
            "titulo": "Capacitación en herramientas de excel",
            "texto": "Capacitación en base de datos con excel",
            "boton-1-color": "",
            "boton-1-texto": "",
            "url-boton-1": "https://www.google.com/?gws_rd=ssl",
            "boton-2-color": "",
            "boton-2-texto": "",
            "url-boton-2": "",
            "foto-delante": "",
            "fondo": "vistas/images/pagina_web/carrusel/17587.jpg"
        },{
            "categoria": "Otros",
            "titulo": "El tiempo de descanso es necesario",
            "texto": "viajar",
            "boton-1-color": "bg-teal",
            "boton-1-texto": "Leer mas",
            "url-boton-1": "https://www.google.com/?gws_rd=ssl",
            "boton-2-color": "bg-maroon",
            "boton-2-texto": "Inscripcion",
            "url-boton-2": "https://www.google.com/?gws_rd=ssl",
            "foto-delante": "",
            "fondo": "vistas/images/pagina_web/carrusel/46000.jpg"
        },{
            "categoria": "Otros",
            "titulo": "Concéntrate en aspectos positivos de vida",
            "texto": "Es momento de pensar en la salud mental",
            "boton-1-color": "bg-indigo",
            "boton-1-texto": "Buscar ayuda",
            "url-boton-1": "https://www.google.com/?gws_rd=ssl",
            "boton-2-color": "bg-lime",
            "boton-2-texto": "Leer articulo",
            "url-boton-2": "https://www.google.com/?gws_rd=ssl",
            "foto-delante": "",
            "fondo": "vistas/images/pagina_web/carrusel/95279.jpg"
        },{
            "categoria": "undefined",
            "titulo": "undefined",
            "texto": "undefined",
            "boton-1-color": "",
            "boton-1-texto": "",
            "url-boton-1": "",
            "boton-2-color": "",
            "boton-2-texto": "",
            "url-boton-2": "",
            "foto-delante": "",
            "fondo": "vistas/images/pagina_web/carrusel/41082.jpg"
        }]',
        'proyectos' => '[{"imagen": "images/proyectos/agromercado.png", "fecha_dia": "14", "fecha_mes": "Abril", "categoria": "Sector Agroindustríal", "nombre": "AgroMercado", "info": "Este proyecto busca mejorar las condiciones de los campesinos mediante el mejoramiento o adecuación de vias, para que estos puedan sacar sus productos facilmente al mercado. Proyecto realizado en conjunto con la Gobernación del Cesar."
        },{"imagen": "images/proyectos/textiles.png", "fecha_dia": "15", "fecha_mes": "Abril", "categoria": "Sector Comercial", "nombre": "La Tercera Transformación", "info": "Proyecto que consiste en la evaluación para la aprobación de creditos, dandole la oportunidad a los microempresarios de crecer y superar la reciente crisis economica. En colaboración con Bancoldex."},{"imagen": "images/proyectos/taxes.png", "fecha_dia": "16", "fecha_mes": "Abril", "categoria": "Comunidad en general", "nombre": "Taxes al día", "info": "Consiste en asegurarse que todos los microempresarios estén al tanto de cuales son sus compromisos tributarios." }]',
        'noticias_intro' => 'En esta sesión encontraras las  noticias más recientes de nuestra agremiación, solo cliquea sobre el recuadro para ver más.',
        'aliados' => '[{
            "nombre": "Universidad Popular del Cesar",
            "logo": "vistas/images/pagina_web/aliados/4547.png",
            "link": "http://www.unicesar.edu.co"
        },{
            "nombre": "Universidad de Santander UDES",
            "logo": "vistas/images/pagina_web/aliados/aliados-udes.png",
            "link": "http://www.unicesar.edu.co"
        },{
            "nombre": "Fundación Universitaria del Área Andina",
            "logo": "vistas/images/pagina_web/aliados/8706.png",
            "link": "http://www.unicesar.edu.co"
        },{
            "nombre": "Servicio Nacional de Aprendizaje",
            "logo": "vistas/images/pagina_web/aliados/aliados-sena.png",
            "link": "http://www.unicesar.edu.co"
        },{
            "nombre": "Gobernación del Cesar",
            "logo": "vistas/images/pagina_web/aliados/2788.png",
            "link": "http://www.unicesar.edu.co"
        }]',
        'videos' => '["https://www.youtube.com/embed/qJ7Kpfm6DXM", "https://www.youtube.com/embed/TYvtmPZ6YS8", "https://www.youtube.com/embed/jEVKFNZU4EI"]',
        'productos' => '[{
            "num": "01.",
            "nombre": "Representación y liderazgo gremial.",
            "descripcion": "Defendemos los intereses del sector ante las entidades gubernamentales y no gubernamentales, nacionales y/o extranjeras."
        },{
            "num": "02.",
            "nombre": "Convenios de cooperación interinstitucional.",
            "descripcion": "Suscritos con diversas entidades para desarrollar programas que contribuyan al fomentos de la pequeña y mediana empresa."
        },{
            "num": "03.",
            "nombre": "Alianzas estrategicas.",
            "descripcion": "Promovemos la asociación entre empresas afines para propocionar la transferencia de bienes y servicios buscando la ampliacion de sus mercados y la disminución de sus costos."
        },{
            "num": "04.",
            "nombre": "Capacitación.",
            "descripcion": "Programamos conferencias, talleres, cursos y seminarios especializados en diversas áreas administrativas y técnicas, orientadas a resolver las necesidades de capacitación del sector industrial, con tarifas especiales para afiliados."
        },{
            "num": "05.",
            "nombre": "Asesorías.",
            "descripcion": "Nuestros afiliados pueden obtener asesorías en las siguientes áreas:"
        },{
            "num": "06.",
            "nombre": "Información y divulgación.",
            "descripcion": "Es nuestro interes mantener una cordial y permanente comunicación con nuestro gremio que nos permite hacerle llegar información especializada del sector y conocer sus inquietudes y necesidades."
        },{
            "num": "07.",
            "nombre": "Eventos especiales.",
            "descripcion": "Con el propósito de promocionar e integrar a nuestro afiliados, buscando ampliar sus horizontes, organizamos y apoyamos la realización de encuentros empresariales, muestras y ferias como Expocesar, Con la participación de entidades como PROEXPORT organizamos misiones a otros países con la intención de establecer contactos para importación y Exportación."
        },{
            "num": "08.",
            "nombre": "Eventos institucionales.",
            "descripcion": "Asamblea General de Afiliados, Convención Nacional, Congreso Nacional."
        },{
            "num": "09.",
            "nombre": "Practicas empresariales.",
            "descripcion": "Mediante Convenios con las universidades, estamos en la posibilidad de facilitar a nuestros afiliados practicantes calificados que les apoyen en la implantación de procesos hacia una mayor productividad, para lo cual se ha conformado un COMITÉ INTERDISCIPLINARIO."
        },{
            "num": "10.",
            "nombre": "Fortalecimiento y desarrollo Sectorial.",
            "descripcion": "A traves de los programas de desarrollo sectorial PRODES, se implementan actividades asociativas, orientadas al mejoramiento de la gestión y competividad con el objetivo final incorporar a las PYMES de la región en la corriente de los negocios internacionales."
        },{
            "num": "11.",
            "nombre": "Centros de conciliación y arbitraje.",
            "descripcion": "Al servicio de nuestros afiliados para disminuir conflictos por la via de la conciliación."
        }]',
        'redes_sociales' => '[{"nombre":"facebook","logo":"fab fa-facebook-f","link":"https://www.facebook.com"},{"nombre":"linkeln","logo":"fab fa-linkedin-in","link":"https://www.linkeln.com"},{"nombre":"twitter","logo":"fab fa-twitter","link":"https://www.twitter.com"},{"nombre":" tiktok","logo":"fab fa-tiktok","link":"https://www.tiktok.com"},{"nombre":" youtube","logo":"fab fa-youtube","link":"https://www.youtube.com"},{"nombre":" pinterest","logo":"fab fa-pinterest-p","link":"https://www.pinterest.com"}]',
        'contacto' => '["Calle 15 # 4-33, oficina 401.","574 9216","+57 315 651 6647","acopicesar07@hotmail.com"]'

        ];
    }
}
