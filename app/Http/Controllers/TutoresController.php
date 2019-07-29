<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\Grupo;
use App\Mail\Bienvenidotutor;

class TutoresController extends Controller
{

  public function consulta(Request $req) {
$todoslostutores = Tutor::all();
    if (isset($req["busqueda_tutor"])) {
        $resultados_tutor = Tutor::where("ID", "=", $req["busqueda_tutor"])->first();
    } else {
        $resultados_tutor = null;
    }
    return view("consultaTutores", compact("resultados_tutor", "todoslostutores"));
  }

  public function listado(Request $req) {
$tutores = Tutor::orderBy('apellido')->paginate(10);
$todoslostutores = Tutor::all();
    return view("listadoTutores", compact("todoslostutores", "tutores"));
  }

  public function inscribir() {
    // $escuelas = Escuela::orderBy("nombre")->get();
    // $categorias = Categoria::orderBy("ID")->get();
    // $categorias = Categoria::where("ID_cat_tem2", "=", $req["cat_tem2"])->first();
    return view("inscripcionTutores");
  }

  public function registrar(Request $req) {
    $this->validate($req, [
      "nombre" => "required|string|max:255",
      "apellido" => "required|string|max:255",
      "dni_tutor" => "required|integer",
      "fecha_nac_tutor" => "required|string",
      "email_tutor" => "required|email",
      "celular" => "required|string|max:40"
    ]);

    $tutor = new Tutor();
    $tutor["Nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $tutor["Apellido"] = $req["apellido"];
    $tutor["DNI"] = $req["dni_tutor"];
    $tutor["fecha_nac"] = $req["fecha_nac_tutor"];
    $tutor["email"] = $req["email_tutor"];
    $tutor["restric_alim"] = $req["restric_alim"];
    $tutor["Celular"] = $req["celular"];

    $tutor->save();

\Mail::to($tutor)->send(new Bienvenidotutor);
    // $escuelaAnterior = $req["escuela"];

    // return redirect("/inscripcionEstudiantes", compact("escuelaAnterior"));
    return redirect("/inscripcionTutores")
    ->with([
    "estado" => $req["nombre"]." ".$req["apellido"],
    "correo" => $req["email_tutor"],
    ])

    ;

  }

}
