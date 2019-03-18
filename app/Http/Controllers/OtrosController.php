<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Otro;

class OtrosController extends Controller
{

//   public function consulta(Request $req) {
// $todoslosmentores = Mentor::all();
//     if (isset($req["busqueda_mentor"])) {
//         $resultados_mentor = Mentor::where("ID", "=", $req["busqueda_mentor"])->first();
//     } else {
//         $resultados_mentor = null;
//     }
//     return view("consultaMentores", compact("resultados_mentor", "todoslosmentores"));
//   }

//   public function listado(Request $req) {
// $tutores = Tutor::orderBy('apellido')->paginate(10);
// $todoslostutores = Tutor::all();
//     return view("listadoTutores", compact("todoslostutores", "tutores"));
//   }

  public function inscribirMentores() {
    return view("inscripcionMentores");
  }

  public function registrarMentores(Request $req) {
    $this->validate($req, [
      "nombre" => "required|string|max:255",
      "apellido" => "required|string|max:255",
      "cuilcuit" => "required|integer",
      "fecha_nac" => "required|date",
      "email" => "required|email",
      "foto_mentor" => "image|max:7000"

    ]);

    $otro = new Otro();
    $otro["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $otro["apellido"] = $req["apellido"];
    $otro["cuilcuit"] = $req["cuilcuit"];
    $otro["fecha_nac"] = $req["fecha_nac"];
    $otro["email"] = $req["email"];
    $otro["celular"] = $req["celular"];
    $otro["nom_foto"] = $req["foto_mentor[0]"];
    $otro["dir_foto"] = $req["foto_mentor[1]"];

    $otro["rol"] = "Mentor";

    $otro->save();

    // $escuelaAnterior = $req["escuela"];

    // return redirect("/inscripcionEstudiantes", compact("escuelaAnterior"));
    return redirect("/inscripcionMentores");

  }

}
