<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosModel;
use App\RolesModel;
use App\PaginaWebModel;
use App\EmpleadosModel;
use App\TipoDocumentoModel;
use App\GeneroModel;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /*===============================================================
	=            Mostrar todos los registros en la tabla            =
	===============================================================*/

    public function index()
    {
        $paginaweb = PaginaWebModel::all();
        foreach ($paginaweb as $key => $web) {
        }

        if (url()->current() == ($web["servidor"] . "usuarios/consultarUser")) {
            if (request()->ajax()) {
                return datatables()->of(UsuariosModel::all())
                    ->addColumn('acciones', function ($data) {

                        $acciones = '
                            <div class="btn-group">
								<a href="' . url()->current() . '/' . $data->id . '" class="btn btn-warning btn-sm">
									<i class="fas fa-pencil-alt text-white"></i>
								</a>
								<button class="btn btn-danger btn-sm eliminarRegistro" foto="' . $data->foto . '" email="' . $data->email . '" action="' . url()->current() . '/' . $data->id . '" method="DELETE" pagina="usuarios/consultarUser" token="' . csrf_token() . '">
								<i class="fas fa-trash-alt"></i>
								</button>
                            </div>';

                        return $acciones;
                    })
                    ->rawColumns(['acciones'])
                    ->make(true);
            }

            return view("paginas.usuarios.consultarUser");
        }

        if (url()->current() == ($web["servidor"] . "usuarios/agregarUser")) {

            if (request()->ajax()) {
                return datatables()->of(EmpleadosModel::where("id_usuario", null)->get())

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
							<a title="Crear usuario" class="btn btn-primary btn-sm crearUsuario" num_documento="' . $data->num_documento . '" email="' . $data->email . '" nombre="' . $data->primer_nombre . ' ' . $data->segundo_nombre . ' ' . $data->primer_apellido . ' ' . $data->segundo_apellido . '" id_rol="' . $data->id_rol . '" action="' . url()->current() . '" method="POST" pagina="usuarios/agregarUser" token="' . csrf_token() . '">
								<i class="fas fa-user-plus"></i>
							</a>
		  				</div>';

                        return $procedimientos;
                    })

                    ->rawColumns(['type_document', 'nombre', 'rol', 'procedimientos'])
                    ->make(true);
            }

            return view("paginas.usuarios.agregarUser", array());
        }
    }

    /*=====  End of Mostrar todos los registros en la tabla  ======*/

    /*===========================================================
	=            Mostra un solo registro de la tabla            =
	===========================================================*/

    public function show($id)
    {

        $usuario = UsuariosModel::where("id", $id)->get();
        $roles = RolesModel::all();
        $usuarios = UsuariosModel::all();

        if (count($usuario) != 0) {

            return view("paginas.usuarios.consultarUser", array("status" => 200, "usuario" => $usuario, "roles" => $roles, "usuarios" => $usuarios));
        } else {

            return view("paginas.usuarios.consultarUser", array("status" => 404, "usuarios" => $usuarios));
        }
    }

    /*=====  End of Mostra un solo registro de la tabla  ======*/

    /*=======================================
	=            Agregar usuario            =
	=======================================*/

    public function store(Request $request)
    {
        if (!empty($request)) {
            $datos = array(
                'num_documento' => $request->input("num_documento"),
                'email' => $request->input("email"),
                'nombre' => $request->input("nombre"),
                'id_rol' => $request->input("id_rol")
            );
        } else {
            $datos = array(
                'num_documento' => $_POST["num_documento"],
                'email' => $_POST["email"],
                'nombre' => $_POST["nombre"],
                'id_rol' => $_POST["id_rol"]
            );
        }


        /*echo '<pre>'; print_r($datos); echo '</pre>';
		return;*/

        if (!empty($datos)) {

            $validar = \Validator::make($datos, [
                "num_documento" => 'required|regex:/^[-\\.\\0-9a-zA-Z]+$/i',
                "nombre" => 'required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                'email' => 'required|regex:/^[-\\_\\:\\.\\@\\0-9a-zA-Z]+$/i'
            ]);

            if ($validar->fails()) {

                return redirect("/empleados/general")->with("no-validacion", "");
            } else {

                $rol = RolesModel::where("id", $datos["id_rol"])->get();

                $usuario = new UsuariosModel();

                $usuario->name = $datos["nombre"];
                $usuario->email = $datos["email"];
                $usuario->password = Hash::make($datos["num_documento"]);
                $usuario->foto = "vistas/images/usuarios/unknown.png";
                $usuario->rol = $rol[0]["rol"];

                $usuario->save();

                $usuario_guardado = UsuariosModel::where("email", $datos["email"])->get();

                $actualizar = array('id_usuario' => $usuario_guardado[0]["id"]);

                $empleado = EmpleadosModel::where('num_documento', $datos["num_documento"])->update($actualizar);
                return "ok";
            }
        }
    }

    /*=====  End of Agregar usuario  ======*/


    /*======================================
	=            Editar usuario            =
	======================================*/

    public function update($id, Request $request)
    {

        /*----------  Se recogen los datos  ----------*/

        $datos = array(
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "password_actual" => $request->input("password_actual"),
            "rol" => $request->input("rol"),
            "imagen_actual" => $request->input("imagen_actual")
        );

        $password = array("password" => $request->input("password"));
        $foto = array("foto" => $request->file("foto"));

        /*=============================================================
		=            Si el formulario o modal tienen datos            =
		=============================================================*/

        if (!empty($datos)) {

            $validar = \Validator::make($datos, [
                'name' => "required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
                'email' => 'required|regex:/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/i'
            ]);

            if ($password["password"] != "") {
                $validarPassword = \Validator::make($password, [
                    "password" => "required|regex:/^[-\\_\\0-9a-zA-Z]+$/i"
                ]);

                if ($validarPassword->fails()) {
                    return redirect("/usuarios/consultarUser")->with("no-validacion", "");
                } else {
                    $nuevaPassword = Hash::make($password['password']);
                }
            } else {
                $nuevaPassword = $datos["password_actual"];
            }

            if ($foto["foto"] != "") {
                $validarFoto = \Validator::make($foto, [
                    "foto" => "required|image|mimes:jpg,jpeg,png|max:2000000"
                ]);

                if ($validarFoto->fails()) {
                    return redirect("/usuarios/consultarUser")->with("no-validacion", "");
                }
            }

            if ($validar->fails()) {
                return redirect("/usuarios/consultarUser")->with("no-validacion", "");
            } else {

                if ($foto["foto"] != "") {
                    if (!empty($datos["imagen_actual"])) {
                        if ($datos["imagen_actual"] != "vistas/images/usuarios/admin.png") {
                            unlink($datos["imagen_actual"]);
                        }
                    }

                    $aleatorio = mt_rand(10000, 99999);

                    $ruta = "vistas/images/usuarios/" . $aleatorio . "." . $foto["foto"]->guessExtension();

                    //move_uploaded_file($foto["foto"], $ruta);
                    /*----------  Redimensionar foto de perfil  ----------*/
                    list($ancho, $alto) = getimagesize($foto["foto"]);
                    $nuevoAncho = 200;
                    $nuevoAlto = 200;

                    if (($foto["foto"]->guessExtension() == "jpeg") || ($foto["foto"]->guessExtension() == "jpg")) {

                        $origen = imagecreatefromjpeg($foto["foto"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagejpeg($destino, $ruta);
                    }

                    if ($foto["foto"]->guessExtension() == "png") {

                        $origen = imagecreatefrompng($foto["foto"]);
                        $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                        imagealphablending($destino, FALSE);
                        imagesavealpha($destino, TRUE);
                        imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                        imagepng($destino, $ruta);
                    }
                } else {
                    $ruta =  $datos["imagen_actual"];
                }


                $datos = array(
                    "name" => $datos["name"],
                    "email" => $datos["email"],
                    "password" => $nuevaPassword,
                    "rol" => $datos["rol"],
                    "foto" => $ruta
                );

                $administrador = UsuariosModel::where('id', $id)->update($datos);
                return redirect("/usuarios/consultarUser")->with("ok-editar", "");
            }
        } else {
            return redirect("/usuarios/consultarUser")->with("data-empty", "");
        }

        /*=====  End of Si el formulario o modal tienen datos  ======*/
    }

    /*=====  End of Editar usuario  ======*/

    /*========================================
	=            Eliminar usuario            =
	========================================*/

    public function destroy($id, Request $request)
    {
        if(isset($_POST['email'])){
            EmpleadosModel::where('email', $_POST['email'])->update(['id_usuario' => null]);
        }
        $validar = UsuariosModel::where("id", $id)->get();
        if (!empty($validar) && $id != 1) {
            if (!empty($validar[0]["foto"]) && isset($_POST['email'])) {
                unlink($validar[0]["foto"]);
            }
            $administrador = UsuariosModel::where("id", $validar[0]["id"])->delete();
            //return redirect("/usuarios/consultarUser")->with("ok-eliminar", "");
            return "ok";
        } else {
            return redirect("/usuarios/consultarUser")->with("no-borrar", "");
        }
    }

    /*=====  End of Eliminar usuario  ======*/
}
