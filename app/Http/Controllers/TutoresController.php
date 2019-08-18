<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\Grupo;
use App\Mail\Bienvenidotutor;
use App\Rules\LetrasYEspacios;

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

  public function listadoD1(Request $req) {
  $todoslostutoresD1 = Tutor::where("pres_dia1", "=", 1)->orderBy('Apellido')->paginate(50);
    return view("listadoTutoresD1", compact("todoslostutoresD1"));
  }

  public function listadoD2(Request $req) {
  $todoslostutoresD2 = Tutor::where("pres_dia2", "=", 1)->orderBy('Apellido')->paginate(50);
    return view("listadoTutoresD2", compact("todoslostutoresD2"));
  }

  public function inscribir() {
    // $escuelas = Escuela::orderBy("nombre")->get();
    // $categorias = Categoria::orderBy("ID")->get();
    // $categorias = Categoria::where("ID_cat_tem2", "=", $req["cat_tem2"])->first();
    return view("inscripcionTutores");
  }

  public function registrar(Request $req) {
    $this->validate($req, [
      "nombre" => ['required',new LetrasYEspacios, 'max:20'],
      "apellido" => ['required',new LetrasYEspacios, 'max:20'],
      "dni_tutor" => "required|alpha_dash|max:20",
      "fecha_nac_tutor" => "required|date|after:01-01-1900|before:30-09-2001",
      "email_tutor" => "required|email",
      "celular" => "required|integer|max:99999999999",
      "instit_rep"=> "required|string|max:45",
      "restric_alim" => "required"
    ]);

    $tutor = new Tutor();
    $tutor["Nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $tutor["Apellido"] = $req["apellido"];
    $tutor["DNI"] = $req["dni_tutor"];
    $tutor["fecha_nac"] = $req["fecha_nac_tutor"];
    $tutor["email"] = $req["email_tutor"];
    $tutor["restric_alim"] = $req["restric_alim"];
    $tutor["Celular"] = $req["celular"];
    $tutor["instit_rep"] = $req["instit_rep"];

    $tutor->save();

// Prueba para atrapar el error cuando el usuario no tiene conexión a Internet
try {
  \Mail::to($tutor)->send(new Bienvenidotutor);
} catch (\Exception $e) {
  $e = "No se pudo enviar el mail. Revise su conexión a Internet. Si aún así continúa el error, escríbanos a desafios.cientificos@gmail.com";
  return $e;
}
// fin de prueba para atrapar el error de no conexión a Internet

// Esto era cuando no atrapaba el error
// \Mail::to($tutor)->send(new Bienvenidotutor);
// fin de cuando no atrapaba el error

    return redirect("/inscripcionTutores")
    ->with([
    "estado" => $req["nombre"]." ".$req["apellido"],
    "correo" => $req["email_tutor"],
    ])

    ;

  }

  public function acreditarDia1(Request $req) {
    if (isset($req["busqueda_DNI_tutor"])) {
        $resultados_t = Tutor::where("DNI", $req["busqueda_DNI_tutor"])->get();
        // dd($resultados_t);
    } else {
        $resultados_t = [];
    }
    return view("acreditacionTutoresDia1", compact("resultados_t"));
  }

  public function confirmarDia1(Request $req) {
    if ($req["presente"] == "Acreditarse")
          $tutoresPres = Tutor::where("DNI", "=", $req["busqueda_DNI_tutor"])->first();
          $tutoresPres->pres_dia1 = 1;
          $tutoresPres->save();
          // dd($req["apellido"]);
    return redirect("/acreditacionTutoresDia1")
    ->with([
      "estado" => $tutoresPres["Nombre"]." ".$tutoresPres["Apellido"],
    ])
    ;

  }

  public function acreditarDia2(Request $req) {
    if (isset($req["busqueda_DNI_tutor"])) {
        $resultados_t = Tutor::where("DNI", $req["busqueda_DNI_tutor"])->get();
        // dd($resultados_t);
    } else {
        $resultados_t = [];
    }
    return view("acreditacionTutoresDia2", compact("resultados_t"));
  }

  public function confirmarDia2(Request $req) {
    if ($req["presente"] == "Acreditarse")
          $tutoresPres = Tutor::where("DNI", "=", $req["busqueda_DNI_tutor"])->first();
          $tutoresPres->pres_dia2 = 1;
          $tutoresPres->save();
          // dd($req["apellido"]);
    return redirect("/acreditacionTutoresDia2")
    ->with([
      "estado" => $tutoresPres["Nombre"]." ".$tutoresPres["Apellido"],
    ])
    ;

  }

}
