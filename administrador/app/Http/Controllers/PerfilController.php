<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsuariosModel;
use App\PaginaWebModel;
use App\EmpleadosModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function index(){
        $paginaweb = PaginaWebModel::all();
        foreach ($paginaweb as $key => $web) {}

        if (url()->current()."/" == $web["servidor"]) {
            if (Auth::user()) {
                $empleado = EmpleadosModel::where("email", Auth::user()->email)->get();
                if (count($empleado) != 0) {
                    return view("paginas.inicio", array("empleado"=> $empleado));
                } else {
                    return view("paginas.inicio", array());
                }

            } else {
                return view("paginas.inicio", array());
            }
        } elseif (url()->current() == $web["servidor"]."/usuarios/perfil") {
           return view("paginas.usuarios.perfil", array());
        } else {
            return view("paginas.usuarios.perfil", array());
        }


    }

    public function show($id){
    	$usuario = UsuariosModel::where("id", $id)->get();
        if (count($usuario) != 0) {
            return view("paginas.usuarios.perfil", array("status"=>200, "usuario"=>$usuario));
        } else {
            return view("paginas.usuarios.perfil", array("status"=>404));
        }
    }

    public function update($id, Request $request){

        $accion = $request->input("accion");

        if ($accion == "inicio") {
            $datos = array(
                'password_1' => $request->input('password_1'),
                'password_2' => $request->input('password_2')
            );

            if(!empty($datos)){
                $validarPassword = \Validator::make($datos,[
                    "password_1" => "required|regex:/^[-\\_\\!\\%\\?\\*\\.\\0-9a-zA-Z]+$/i",
                    "password_2" => "required|regex:/^[-\\_\\!\\%\\?\\*\\.\\0-9a-zA-Z]+$/i"
                ]);

                if($validarPassword->fails()){
                    return redirect("/")->with("no-validacion-password", "");
                }else{
                    if ($datos["password_1"] == $datos["password_2"]) {
                        $nuevaPassword = Hash::make($datos['password_1']);
                    } else {
                        return redirect("/")->with("no-match-new-password", "");
                    }

                    $actualizar = array('password' => $nuevaPassword);

                    $administrador = UsuariosModel::where('id', $id)->update($actualizar);

                    return redirect("/")->with("ok-editar", "");
                }
            } else {
                return redirect("/")->with("no-datos", "");
            }


        }
        if ($accion == "perfil") {

            $usuario = UsuariosModel::where("id", $id)->get();

            $datos = array(
                "name"=>$request->input("name"),
                "foto_actual"=>$request->input("foto_actual"),
                "foto_nueva"=>$request->file("foto_nueva"),
                "password_actual"=>$request->input("password_actual"),
                "password_nueva_1"=>$request->input("password_nueva_1"),
                "password_nueva_2"=>$request->input("password_nueva_2")
            );

            if(!empty($datos)){

                $validar = \Validator::make($datos,[
                    'name' => "required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i"
                ]);

                if (!empty($datos["foto_nueva"])) {
                    $validarFoto = \Validator::make($datos,[
                        "foto_nueva" => "required|image|mimes:jpg,jpeg,png|max:2000000"
                    ]);

                    if($validarFoto->fails()){
                        return redirect("/usuarios/perfil/".$id)->with("no-validacion", "");
                    } else {

                        if(!empty($datos["foto_actual"])){
                            if($datos["foto_actual"] != "vistas/images/usuarios/unknown.png"){
                                unlink($datos["foto_actual"]);
                            }
                        }

                        $aleatorio = mt_rand(10000,99999);

                        $ruta_Foto = "vistas/images/usuarios/".$aleatorio.".".$datos["foto_nueva"]->guessExtension();

                        //move_uploaded_file($foto["foto"], $ruta);
                        /*----------  Redimensionar foto de perfil  ----------*/
                        list($ancho, $alto) = getimagesize($datos["foto_nueva"]);
                        $nuevoAncho = 200;
                        $nuevoAlto = 200;

                        if(($datos["foto_nueva"]->guessExtension() == "jpeg") || ($datos["foto_nueva"]->guessExtension() == "jpg")){

                            $origen = imagecreatefromjpeg($datos["foto_nueva"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagejpeg($destino, $ruta_Foto);

                        }

                        if($datos["foto_nueva"]->guessExtension() == "png"){

                            $origen = imagecreatefrompng($datos["foto_nueva"]);
                            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                            imagealphablending($destino, FALSE);
                            imagesavealpha($destino, TRUE);
                            imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                            imagepng($destino, $ruta_Foto);

                        }
                    }
                } else {
                    $ruta_Foto = $datos["foto_actual"];
                }

                if (!empty($datos["password_actual"]) || !empty($datos["password_nueva_1"]) || !empty($datos["password_nueva_2"])) {

                    if (empty($datos["password_actual"]) || empty($datos["password_nueva_1"]) || empty($datos["password_nueva_2"])) {
                        return redirect("/usuarios/perfil/".$id)->with("password-field-empty", "");
                    } else {
                        $validarPassword = \Validator::make($datos,[
                            "password_nueva_1" => "required|regex:/^[-\\_\\!\\%\\?\\*\\.\\0-9a-zA-Z]+$/i",
                            "password_nueva_2" => "required|regex:/^[-\\_\\!\\%\\?\\*\\.\\0-9a-zA-Z]+$/i"
                        ]);

                        if($validarPassword->fails()){
                            return redirect("/usuarios/perfil/".$id)->with("no-validacion-password", "");
                        }else{

                            if (Hash::check($datos["password_actual"], $usuario[0]["password"])) {
                                if ($datos["password_nueva_1"] == $datos["password_nueva_2"]) {
                                    $nuevaPassword = Hash::make($datos['password_nueva_1']);
                                } else {
                                    return redirect("/usuarios/perfil/".$id)->with("no-match-new-password", "");
                                }
                            } else {
                                return redirect("/usuarios/perfil/".$id)->with("no-match-current-password", "");
                            }

                        }
                    }
                } else {
                    $nuevaPassword = $usuario[0]["password"];
                }

                $actualizar = array(
                    'name' => $datos["name"],
                    'password' => $nuevaPassword,
                    'foto' => $ruta_Foto
                );

                $administrador = UsuariosModel::where('id', $id)->update($actualizar);

                return redirect("/usuarios/perfil/".$id)->with("ok-editar", "");
            } else {
                return redirect("/usuarios/perfil/".$id)->with("no-datos", "");
            }
        }

    }
}
