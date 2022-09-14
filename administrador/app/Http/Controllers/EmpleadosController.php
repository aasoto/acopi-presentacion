<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmpleadosModel;
use App\TipoDocumentoModel;
use App\GeneroModel;
use App\RolesModel;
use App\PaginaWebModel;

class EmpleadosController extends Controller
{
    public function index()
    {
        $generos = GeneroModel::all();
        $tipos_documentos = TipoDocumentoModel::all();
        $roles = RolesModel::all();

        if (request()->ajax()) {
            return datatables()->of(EmpleadosModel::all())

                ->addColumn('type_document', function ($data) {

                    $validar_type_document = TipoDocumentoModel::where("codigo_doc", $data->tipo_documento)->get();

                    if (!empty($validar_type_document)) {
                        $type_document = $validar_type_document[0]["nombre_doc"];
                    } else {
                        $type_document = "Sin verficar";
                    }

                    return $type_document;
                })

                ->addColumn('nombre', function ($data) {

                    $nombre = $data->primer_apellido . ' ' . $data->segundo_apellido . ' ' . $data->primer_nombre . ' ' . $data->segundo_nombre;

                    return $nombre;
                })

                ->addColumn('sexo', function ($data) {

                    $validar_sexo = GeneroModel::where("codigo_genero", $data->sexo)->get();

                    if (!empty($validar_sexo)) {
                        $sexo = $validar_sexo[0]["nombre_genero"];
                    } else {
                        $sexo = "Sin verficar";
                    }

                    return $sexo;
                })

                ->addColumn('rol', function ($data) {

                    $validar_rol = RolesModel::where("id", $data->id_rol)->get();

                    if (!empty($validar_rol)) {
                        $rol = $validar_rol[0]["rol"] . " - " . $data->estado;
                    } else {
                        $rol = "Sin verficar - " . $data->estado;
                    }

                    return $rol;
                })

                ->addColumn('procedimientos', function ($data) {
                    $procedimientos = '
    				<div class="btn-group">
						<a title="Ver más" class="btn btn-primary btn-sm verMasEmpleado">
							<i class="fas fa-eye"></i>
						</a>
						<a href="' . url()->current() . '/' . $data->id . '" title="Editar" class="btn btn-warning btn-sm editarAfiliado">
							<i class="fas fa-pencil-alt text-white"></i>
						<a>
						<button class="btn btn-danger btn-sm eliminarEmpleado" title="Eliminar" action="' . url()->current() . '/' . $data->id . '" method="DELETE" foto="' . $data->foto . '" hoja_de_vida="' . $data->hoja_de_vida . '" cedula="' . $data->cedula . '" pagina="empleados/general" token="' . csrf_token() . '">
						<i class="fas fa-trash-alt"></i>
						</button>
	  				</div>';

                    return $procedimientos;
                })

                ->rawColumns(['type_document', 'nombre', 'sexo', 'rol', 'procedimientos'])
                ->make(true);
        }

        return view("paginas.empleados.general", array("generos" => $generos, "tipos_documentos" => $tipos_documentos, "roles" => $roles));
    }

    public function store(Request $request)
    {
        $datos = array(
            'escenario' => $request->input("escenario"),
            'tipo_documento' => $request->input("tipo_documento"),
            'num_documento' => $request->input("num_documento"),
            'primer_nombre' => $request->input("primer_nombre"),
            'segundo_nombre' => $request->input("segundo_nombre"),
            'primer_apellido' => $request->input("primer_apellido"),
            'segundo_apellido' => $request->input("segundo_apellido"),
            'genero' => $request->input("genero"),
            'fecha_nacimiento' => $request->input("fecha_nacimiento"),
            'email' => $request->input("email"),
            'id_rol' => $request->input("id_rol"),
            'estado' => $request->input("estado"),
            'foto' => $request->file("foto"),
            'hoja_de_vida' => $request->file("hoja_de_vida"),
            'cedula' => $request->file("cedula")
        );

        /*echo '<pre>'; print_r($datos); echo '</pre>';
		return;*/

        if (!empty($datos)) {

            $validar = \Validator::make($datos, [
                "tipo_documento" => "required|regex:/^[0-9a-zA-Z]+$/i",
                "num_documento" => 'required|regex:/^[-\\.\\0-9a-zA-Z]+$/i',
                "primer_nombre" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "primer_apellido" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "segundo_apellido" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "genero" => 'required|regex:/^[a-zA-Z]+$/i',
                "fecha_nacimiento" => 'required|date',
                'email' => 'required|regex:/^[-\\_\\:\\.\\@\\0-9a-zA-Z]+$/i',
                "id_rol" => 'required|regex:/^[0-9]+$/i',
                "estado" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'
            ]);

            if ($validar->fails()) {
                return redirect("/empleados/general")->with("no-validacion", "");
            } else {
                if (!empty($datos["segundo_nombre"])) {
                    $validarSegundoNombre = \Validator::make($datos, [
                        "segundo_nombre" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'
                    ]);
                    if ($validarSegundoNombre->fails()) {
                        return redirect("/empleados/general")->with("no-validacion", "");
                    }
                }

                if (!empty($datos["foto"])) {
                    $validar_Foto = \Validator::make($datos, ['foto' => 'required|image|mimes:jpg,jpeg,png|max:2000000']);
                    if ($validar_Foto->fails()) {
                        return redirect("/empleados/general")->with("no-foto", "");
                    } else {
                        $aleatorio_Foto = mt_rand(1000000, 9999999);

                        $rutaFoto = "vistas/documentos/empleados/fotos/" . $aleatorio_Foto . "." . $datos["foto"]->guessExtension();

                        if ($datos["escenario"] == "prueba") {
                            move_uploaded_file($datos["foto"], $rutaFoto);
                        }
                        if ($datos["escenario"] == "sistema") {
                            /*----------  Redimensionar foto de perfil  ----------*/
                            list($ancho, $alto) = getimagesize($datos["foto"]);
                            $nuevoAncho = 400;
                            $nuevoAlto = 500;

                            if (($datos["foto"]->guessExtension() == "jpeg") || ($datos["foto"]->guessExtension() == "jpg")) {

                                $origen = imagecreatefromjpeg($datos["foto"]);
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                                imagejpeg($destino, $rutaFoto);
                            }

                            if ($datos["foto"]->guessExtension() == "png") {

                                $origen = imagecreatefrompng($datos["foto"]);
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                                imagealphablending($destino, FALSE);
                                imagesavealpha($destino, TRUE);
                                imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                                imagepng($destino, $rutaFoto);
                            }
                        }
                    }
                } else {
                    $rutaFoto =  "";
                }

                if (!empty($datos["hoja_de_vida"])) {
                    if ($datos["hoja_de_vida"]->guessExtension() == "pdf") {
                        $aleatorio_hoja_de_vida = mt_rand(1000000, 9999999);
                        $ruta_hoja_de_vida = "vistas/documentos/empleados/hojas-de-vida/" . $aleatorio_hoja_de_vida . "." . $datos["hoja_de_vida"]->guessExtension();
                        move_uploaded_file($datos["hoja_de_vida"], $ruta_hoja_de_vida);
                    } else {
                        return redirect("/empleados/general")->with("no-pdf", "");
                    }
                } else {
                    $ruta_hoja_de_vida = "";
                }

                if (!empty($datos["cedula"])) {
                    if ($datos["cedula"]->guessExtension() == "pdf") {
                        $aleatorio_cedula = mt_rand(1000000, 9999999);
                        $ruta_cedula = "vistas/documentos/empleados/cedulas/" . $aleatorio_cedula . "." . $datos["cedula"]->guessExtension();
                        move_uploaded_file($datos["cedula"], $ruta_cedula);
                    } else {
                        $validar_cedula = \Validator::make($datos, ['cedula' => 'required|image|mimes:jpg,jpeg,png|max:7000000']);
                        if ($validar_cedula->fails()) {
                            return redirect("/empleados/general")->with("no-cedula", "");
                        } else {
                            $aleatorio_cedula = mt_rand(1000000, 9999999);
                            $ruta_cedula = "vistas/documentos/empleados/cedulas/" . $aleatorio_cedula . "." . $datos["cedula"]->guessExtension();
                            move_uploaded_file($datos["cedula"], $ruta_cedula);
                        }
                    }
                } else {
                    $ruta_cedula = "";
                }

                $empleado = new EmpleadosModel();

                $empleado->tipo_documento = $datos["tipo_documento"];
                $empleado->num_documento = $datos["num_documento"];
                $empleado->primer_nombre = $datos["primer_nombre"];
                $empleado->segundo_nombre = $datos["segundo_nombre"];
                $empleado->primer_apellido = $datos["primer_apellido"];
                $empleado->segundo_apellido = $datos["segundo_apellido"];
                $empleado->sexo = $datos["genero"];
                $empleado->fecha_nacimiento = $datos["fecha_nacimiento"];
                $empleado->email = $datos["email"];
                $empleado->id_rol = $datos["id_rol"];
                $empleado->estado = $datos["estado"];
                $empleado->foto = $rutaFoto;
                $empleado->hoja_de_vida = $ruta_hoja_de_vida;
                $empleado->cedula = $ruta_cedula;

                $empleado->save();

                return redirect("/empleados/general")->with("ok-crear", "");
            }
        } else {

            return redirect("/empleados/general")->with("error", "");
        }
    }

    public function show($id)
    {
        $empleado = EmpleadosModel::where("id", $id)->get();
        $empleados = EmpleadosModel::all();

        $generos = GeneroModel::all();
        $tipos_documentos = TipoDocumentoModel::all();
        $roles = RolesModel::all();

        if (count($empleado) != 0) {
            $pdf = strpos($empleado[0]["cedula"], "pdf");
            if ($pdf !== false) {
                $tipo_cedula = "pdf";
            } else {
                $tipo_cedula = "imagen";
            }
            return view("paginas.empleados.general", array("status" => 200, "empleado" => $empleado, "empleados" => $empleados, "generos" => $generos, "tipos_documentos" => $tipos_documentos, "roles" => $roles, "tipo_cedula" => $tipo_cedula));
        } else {

            return view("paginas.empleados.general", array("status" => 404, "empleados" => $empleados, "generos" => $generos, "tipos_documentos" => $tipos_documentos, "roles" => $roles));
        }
    }

    public function update($id, Request $request)
    {
        $datos = array(
            'escenario' => $request->input("escenario"),
            'tipo_documento' => $request->input("tipo_documento"),
            'num_documento' => $request->input("num_documento"),
            'primer_nombre' => $request->input("primer_nombre"),
            'segundo_nombre' => $request->input("segundo_nombre"),
            'primer_apellido' => $request->input("primer_apellido"),
            'segundo_apellido' => $request->input("segundo_apellido"),
            'genero' => $request->input("genero"),
            'fecha_nacimiento' => $request->input("fecha_nacimiento"),
            'email' => $request->input("email"),
            'id_rol' => $request->input("id_rol"),
            'estado' => $request->input("estado"),
            'foto_actual' => $request->input("foto_actual"),
            'foto_nueva' => $request->file("foto"),
            'hoja_de_vida_actual' => $request->input("hoja_de_vida_actual"),
            'hoja_de_vida_nueva' => $request->file("hoja_de_vida"),
            'cedula_actual' => $request->input("cedula_actual"),
            'cedula_nueva' => $request->file("cedula")
        );

        /*echo '<pre>'; print_r($datos); echo '</pre>';
		return;*/

        if (!empty($datos)) {

            $validar = \Validator::make($datos, [
                "tipo_documento" => "required|regex:/^[0-9a-zA-Z]+$/i",
                "num_documento" => 'required|regex:/^[-\\.\\0-9a-zA-Z]+$/i',
                "primer_nombre" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "primer_apellido" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "segundo_apellido" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "genero" => 'required|regex:/^[a-zA-Z]+$/i',
                "fecha_nacimiento" => 'required|date',
                'email' => 'required|regex:/^[-\\_\\:\\.\\@\\0-9a-zA-Z]+$/i',
                "id_rol" => 'required|regex:/^[0-9]+$/i',
                "estado" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'
            ]);

            if ($validar->fails()) {
                return redirect("/empleados/general")->with("no-validacion", "");
            } else {
                if (!empty($datos["segundo_nombre"])) {
                    $validarSegundoNombre = \Validator::make($datos, [
                        "segundo_nombre" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i'
                    ]);
                    if ($validarSegundoNombre->fails()) {
                        return redirect("/empleados/general")->with("no-validacion", "");
                    }
                }

                if (!empty($datos["foto_nueva"])) {
                    $validar_Foto_Nueva = \Validator::make($datos, ['foto_nueva' => 'required|image|mimes:jpg,jpeg,png|max:2000000']);
                    if ($validar_Foto_Nueva->fails()) {
                        return redirect("/empleados/general")->with("no-foto", "");
                    } else {

                        $aleatorio_Foto_Nueva = mt_rand(1000000, 9999999);

                        $rutaFoto_Nueva = "vistas/documentos/empleados/fotos/" . $aleatorio_Foto_Nueva . "." . $datos["foto_nueva"]->guessExtension();

                        if ($datos["escenario"] == "sistema") {
                            if (!empty($datos["foto_actual"])) {
                                unlink($datos["foto_actual"]);
                            }
                            /*----------  Redimensionar foto de perfil  ----------*/
                            list($ancho, $alto) = getimagesize($datos["foto_nueva"]);
                            $nuevoAncho = 400;
                            $nuevoAlto = 500;

                            if (($datos["foto_nueva"]->guessExtension() == "jpeg") || ($datos["foto_nueva"]->guessExtension() == "jpg")) {

                                $origen = imagecreatefromjpeg($datos["foto_nueva"]);
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                                imagejpeg($destino, $rutaFoto_Nueva);
                            }

                            if ($datos["foto_nueva"]->guessExtension() == "png") {

                                $origen = imagecreatefrompng($datos["foto_nueva"]);
                                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                                imagealphablending($destino, FALSE);
                                imagesavealpha($destino, TRUE);
                                imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                                imagepng($destino, $rutaFoto_Nueva);
                            }
                        }

                        if ($datos["escenario"] == "prueba") {
                            move_uploaded_file($datos["foto_nueva"], $rutaFoto_Nueva);
                        }
                    }
                } else {
                    $rutaFoto_Nueva = $datos["foto_actual"];
                }

                if (!empty($datos["hoja_de_vida_nueva"])) {
                    if (!empty($datos["hoja_de_vida_actual"]) && ($datos["escenario"] == "sistema")) {
                        unlink($datos["hoja_de_vida_actual"]);
                    }
                    if ($datos["hoja_de_vida_nueva"]->guessExtension() == "pdf") {
                        $aleatorio = mt_rand(1000000, 9999999);
                        $ruta_hoja_de_vida = "vistas/documentos/empleados/hojas-de-vida/" . $aleatorio . "." . $datos["hoja_de_vida_nueva"]->guessExtension();
                        move_uploaded_file($datos["hoja_de_vida_nueva"], $ruta_hoja_de_vida);
                    } else {
                        return redirect("/empleados/general")->with("no-pdf", "");
                    }
                } else {
                    $ruta_hoja_de_vida = $datos["hoja_de_vida_actual"];
                }

                if (!empty($datos["cedula_nueva"])) {
                    if ($datos["cedula_nueva"]->guessExtension() == "pdf") {
                        $aleatorio_cedula = mt_rand(1000000, 9999999);
                        $ruta_cedula = "vistas/documentos/empleados/cedulas/" . $aleatorio_cedula . "." . $datos["cedula_nueva"]->guessExtension();
                        move_uploaded_file($datos["cedula_nueva"], $ruta_cedula);
                    } else {
                        $validar_cedula = \Validator::make($datos, ['cedula_nueva' => 'required|image|mimes:jpg,jpeg,png|max:7000000']);
                        if ($validar_cedula->fails()) {
                            return redirect("/empleados/general")->with("no-cedula", "");
                        } else {
                            $aleatorio_cedula = mt_rand(1000000, 9999999);
                            $ruta_cedula = "vistas/documentos/empleados/cedulas/" . $aleatorio_cedula . "." . $datos["cedula_nueva"]->guessExtension();
                            move_uploaded_file($datos["cedula_nueva"], $ruta_cedula);
                        }
                    }
                    if (!empty($datos["cedula_actual"]) && ($datos["escenario"] == "sistema")) {
                        unlink($datos["cedula_actual"]);
                    }
                } else {
                    $ruta_cedula = $datos["cedula_actual"];
                }

                $actualizar = array(
                    'tipo_documento' => $datos["tipo_documento"],
                    'num_documento' => $datos["num_documento"],
                    'primer_nombre' => $datos["primer_nombre"],
                    'segundo_nombre' => $datos["segundo_nombre"],
                    'primer_apellido' => $datos["primer_apellido"],
                    'segundo_apellido' => $datos["segundo_apellido"],
                    'sexo' => $datos["genero"],
                    'fecha_nacimiento' => $datos["fecha_nacimiento"],
                    'email' => $datos["email"],
                    'id_rol' => $datos["id_rol"],
                    'estado' => $datos["estado"],
                    'foto' => $rutaFoto_Nueva,
                    'hoja_de_vida' => $ruta_hoja_de_vida,
                    'cedula' => $ruta_cedula
                );

                $empleado = EmpleadosModel::where("id", $id)->update($actualizar);
                return redirect("/empleados/general")->with("ok-editar", "");
            }
        } else {

            return redirect("/empleados/general")->with("error", "");
        }
    }

    public function destroy($id, Request $request)
    {

        $validar = EmpleadosModel::where("id", $id)->get();
        if (!empty($validar)) {
            $empleados = EmpleadosModel::where("id", $validar[0]["id"])->delete();
            return "ok";
        } else {
            return redirect("/empleados/general")->with("no-borrar", "");
        }
    }
}
