<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Otro;
use App\Mail\Bienvenidomentor;
use App\Mail\Bienvenidodisertante;

class OtrosController extends Controller
{

  public function inscribirMentores() {
    return view("inscripcionMentores");
  }
  public function inscribirDisertantes() {
    return view("inscripcionDisertantes");
  }

  public function registrarMentores(Request $req) {
    $this->validate($req, [
      "nombre" => "required|string|max:255",
      "apellido" => "required|string|max:255",
      "cuilcuit" => "required|integer",
      "email" => "required|email",
      "fecha_nac" => "required|date",
      "celular" => "required|string|max:22",
      "breveCV" => "required|string|max:255",
        "foto_mentor" => "required|image|max:5000"
    //"foto_mentor" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:7000"

    ]);

    $otro = new Otro();
    $otro["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $otro["apellido"] = $req["apellido"];
    $otro["cuilcuit"] = $req["cuilcuit"];
    $otro["fecha_nac"] = $req["fecha_nac"];
    $otro["email"] = $req["email"];
    $otro["celular"] = $req["celular"];
    $otro["contacto"] = $req["contacto"];
    $otro["instit_rep"] = $req["instit_rep"];
    $otro["CV"] = $req["breveCV"];
// esto lo agregué después de ver el video de validación de Darío y funciona perfecto!!
    $ruta = $req["foto_mentor"]->store("public");
    $nombreArchivo = basename($ruta);
$otro["nom_foto"] = $nombreArchivo;
$otro["dir_foto"] = $ruta;
// fin de lo agregado después de ver el video

    $otro["rol"] = "Mentor";

    $otro->save();

  \Mail::to($otro)->send(new Bienvenidomentor);

    return redirect("/inscripcionMentores")
    ->with([
    "estado" => $req["nombre"] ." ". $req["apellido"],
    "correo" => $req["email"],
    ])


    ;

  }

  public function registrarDisertantes(Request $req) {
    $this->validate($req, [
      "nombre" => "required|string|max:255",
      "apellido" => "required|string|max:255",
      "cuilcuit" => "required|integer",
      "email" => "required|email",
      "fecha_nac" => "required|date",
      "celular" => "required|string|max:22",
      "titulo_charla" => "required|string|max:45",
      "descrip_charla" => "required|string|max:255",
      "breveCV" => "required|string|max:255",
      "foto_disertante" => "required|image|max:5000"

    ]);

    $otro = new Otro();
    $otro["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $otro["apellido"] = $req["apellido"];
    $otro["cuilcuit"] = $req["cuilcuit"];
    $otro["fecha_nac"] = $req["fecha_nac"];
    $otro["email"] = $req["email"];
    $otro["celular"] = $req["celular"];
    $otro["titulo_charla"] = $req["titulo_charla"];
    $otro["descrip_charla"] = $req["descrip_charla"];
    $otro["CV"] = $req["breveCV"];
// esto lo agregué después de ver el video de validación de Darío y funciona perfecto!!
    $ruta = $req["foto_disertante"]->store("public");
    $nombreArchivo = basename($ruta);
$otro["nom_foto"] = $nombreArchivo;
$otro["dir_foto"] = $ruta;
// fin de lo agregado después de ver el video

    $otro["rol"] = "Disertante";

    $otro->save();

  \Mail::to($otro)->send(new Bienvenidodisertante);

    return redirect("/inscripcionDisertantes")
    ->with([
    "estado" => $req["nombre"] ." ". $req["apellido"],
    "correo" => $req["email"],
    ])


    ;

  }

  public function listadoMentores(Request $req) {
$otros = Otro::orderBy('apellido')->where('rol', 'Mentor')->paginate(10);
$todoslosmentores = Otro::all();
    return view("listadoMentores", compact("todoslosmentores", "otros"));
  }

  public function listadoDisertantes(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Disertante')->paginate(10);
  $todoslosdisertantes = Otro::all();
    return view("listadoDisertantes", compact("todoslosdisertantes", "otros"));
  }

}
