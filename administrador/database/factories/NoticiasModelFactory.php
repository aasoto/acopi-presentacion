<?php

namespace Database\Factories;

use App\NoticiasModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\NoticiasModel>
 */
class NoticiasModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = NoticiasModel::class;

    public function definition()
    {
        return [
            'categoria' => '2',
            'portada_noticia' => 'vistas/images/noticias/1.jpeg',
            'titulo' => '¿Que es ACOPI?',
            'descripcion_noticia' => 'Información de ACOPI',
            'p_claves_noticia' => '["acopi","colombia","historia","significado"]',
            'ruta_noticia' => 'quienes-somos',
            'contenido_noticia' => '<div>Este jueves 2 y el viernes 3 de diciembre la empresa de energía eléctrica Afinia adelantará el plan de mejoras y adecuaciones eléctricas para optimizar progresivamente su servicio en Valledupar y en municipios del Cesar.</div><div><br></div><div style="text-align: justify; "><img src="http://localhost/acopi/administrador/public/vistas/images/noticias/contenido/a0f3601dc682036423013a5d965db9aa.jpg" style="width: 25%; float: right;" class="note-float-right">En ese sentido, en el municipio de San Diego, el personal capacitado de Afinia instalará estructuras, redes y elementos de protección, los cuales harán parte del nuevo circuito San Diego 2. La actividad se llevará a cabo desde las 7:30 a.m. hasta las 4:30 p.m., y durante su desarrollo será suspendido el servicio de energía en el municipio y sectores aledaños.</div><div style="text-align: justify; "><br></div><div style="text-align: justify;">Del mismo modo, en Valledupar la empresa realizará trabajos en el circuito Valledupar 4 desde las 5:30 a.m. hasta las 7:30 a.m., durante la jornada habrá suspensión en el fluido eléctrico en los barrios: 9 de Abril, Las Acacias, Altos de La Nevada, Bello Horizonte, Campo Romero, El Limonar, Futuro de Los Niños, Urbanización Ciudad Tayrona, Villa Algenia, Villa Andrés, Villa Consuelo, Los Guasimales, Brisas de La Popa, Francisco Javier, Altos de Pimienta, Urbanización Bella Vista, Urbanización Ana María y el Conjunto Cerrado Alta Vista.</div><div style="text-align: justify;"><br></div><div style="text-align: justify; ">Asimismo, el viernes 3 de diciembre no habrá servicio de energía desde las 7:45 a.m. hasta las 4:30 de la tarde para los habitantes del barrio San Fernando de Valledupar, en el sector comprendido entre las carreras 6 y 6B, desde la calle 45 hasta la calle 47, ya que en el marco de la construcción del nuevo circuito Salguero 5 en Valledupar instalarán nuevos postes y redes.</div>'
        ];
    }
}
