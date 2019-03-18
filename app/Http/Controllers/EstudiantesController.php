<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente; // El "Docente" en amarillo es el nombre del modelo en Docente.php
use App\Escuela;
use App\Grupo;
use App\Estudiante;
use App\Categoria;

class EstudiantesController extends Controller
{
  public function PorDocente(Request $req) {
    if (isset($req["busqueda_DNI_docente"])) {
        $resultados_d = Docente::where("DNI", "=", $req["busqueda_DNI_docente"])->first();
    } else {
        $resultados_d = null;
    }
    return view("estudiantesPorDocente", compact("resultados_d"));
  }

// Esto funcionaba perfecto el 19/12 //
  public function PorEscuela(Request $req) {
      $todaslasescuelas = Escuela::all();
    if (isset($req["busqueda_escuela"])) {
        $resultados_esc = Escuela::where("nombre", "=", $req["busqueda_escuela"])->first();
    } else {
        $resultados_esc = null;
    }
    return view("estudiantesPorEscuela", compact("resultados_esc", "todaslasescuelas"));
  }

  public function PorEscuelaActiva(Request $req) {
$todaslasescuelas = Escuela::all();
      $escuelasactivas = Escuela::where("activa", "=", 1)->get();
    if (isset($req["busqueda_escuela"])) {
        $resultados_esc = Escuela::where("nombre", "=", $req["busqueda_escuela"])->first();
    } else {
        $resultados_esc = null;
    }
    return view("estudiantesPorEscuela", compact("resultados_esc", "escuelasactivas", "todaslasescuelas"));
  }

  public function preinscribir(Request $req) {
    $dnidocente = $req["dnidocente"];

    if (session("dnidocente")) {
      $dnidocente = session("dnidocente");
    }
    return view("preinscripcionEstudiantes", compact("dnidocente"));
  }

  public function preregistrar (Request $req) {
  $this->validate($req, [
  "dnidocente" => "required|integer|exists:docentes,DNI",
  ]);

  return redirect("/inscripcionEstudiantes")
    ->with([
      "dnidocente" => $req["dnidocente"]
]);

}

  public function inscribir(Request $req) {
    $dnidocente = $req["dnidocente"];

    if (session("dnidocente")) {
      $dnidocente = session("dnidocente");
      // pasa por acá SÓLO cuando pasa la validación
    }
    // pasa por acá tanto si pasa como si NO pasa la validación
    // cuando no pasa la validación, $dnidocente es null

    $escuelas = Escuela::orderBy("nombre")->get();
    $categorias = Categoria::orderBy("ID")->get();
    $docentereg = Docente::where("DNI", "=", $dnidocente)->first();

    return view("inscripcionEstudiantes", compact("escuelas", "docentereg", "categorias", "dnidocente"));
  }

  public function registrar(Request $req) {

// session(["dnidocente" => $req["dnidocente"]]); Me lo hizo borrar Daro pero andaba bien en lugar de la línea que está abajo
$req->session()->flash('dnidocente', $req["dnidocente"]);
    $this->validate($req, [

    "nombre" => "required|string|max:50",
    "apellido" => "required|string|max:50",
    "DNIestudiante" => "required|string|min:8|max:12|unique:estudiantes,DNI",
    // "EmailEstudiante" => "required|email|max:60",
    // "FechaNacimientoEstudiante" => "required|date|before_or_equal:31-12-2003",
    // "AnioQueCursa" => "required|string:4to. año,5to. año,6to. año",
    // "RestriccionAlimentaria" => "required|string:No,Celiaquía,Veganismo,Vegetarianismo,Fenilcetonuria,Otra",
    "Opcion1DeCategoriaTematica" => "required|integer",
    "Opcion2DeCategoriaTematica" => "required|integer|different:Opcion1DeCategoriaTematica",
// hasta acá llegan perfecto $dnidocente y $docentereg, se pierden en otro lado
    // dd($dnidocente),
    // dd($docentereg),
// $req->session()->forget('dnidocente')
  ]


// hasta acá también llega perfecto $docentereg aunque no pase la validación

)


;

    // "NombrePadreMadre" => "required|string|max:50",
    // "ApellidoPadreMadre" => "required|string|max:50",
    // "EmailPadreMadre" => "required|email|max:50",
    // "TelefonoPadreMadre" => "required|string|max:50",

//si no pasa la validación, no pasa por acá
    $estudiante = new Estudiante();
    $estudiante["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $estudiante["apellido"] = $req["apellido"];
    $estudiante["DNI"] = $req["DNIestudiante"];
    $estudiante["email"] = $req["EmailEstudiante"];
    $estudiante["fecha_nac"] = $req["FechaNacimientoEstudiante"];
    $estudiante["ID_escuela"] = $req["escuela"];
    $estudiante["ID_cat_tem1"] = $req["Opcion1DeCategoriaTematica"];
    $estudiante["ID_cat_tem2"] = $req["Opcion2DeCategoriaTematica"];
    $estudiante["anio_cursa"] = $req["AnioQueCursa"];
    $estudiante["restric_alim"] = $req["RestriccionAlimentaria"];
    $estudiante["nom_padre"] = $req["NombrePadreMadre"];
    $estudiante["ape_padre"] = $req["ApellidoPadreMadre"];
    $estudiante["mail_padre"] = $req["EmailPadreMadre"];
    $estudiante["telefono_padre"] = $req["TelefonoPadreMadre"];

    $estudiante["ID_docente_reg"] = Docente::where("DNI", "=", $req["dnidocente"])->first()["ID"];
    $estudiante->save();
//lo de acá abajo lo leer solamente si graba un estudiante
    return redirect("/inscripcionEstudiantes")
      ->with([
        "dnidocente" => $req["dnidocente"],
        "estado" => $estudiante["nombre"] ." ". $estudiante["apellido"],
]);

  }


  public function PorGrupo(Request $req) {
    $todoslosgrupos = Grupo::all();
    if (isset($req["busqueda_grupo"])) {
        $resultados_grupo = Grupo::where("nombre", "=", $req["busqueda_grupo"])->first();
    } else {
        $resultados_grupo = null;
    }
    return view("estudiantesPorGrupo", compact("resultados_grupo", "todoslosgrupos"));
  }

  public function acreditacion(Request $req) {
    if (isset($req["busqueda_DNI_docente"])) {
        $resultados_d = Docente::where("DNI", "=", $req["busqueda_DNI_docente"])->first();
    } else {
        $resultados_d = null;
    }
    return view("acreditarEstudiantes", compact("resultados_d"));
  }

  public function acreditacionDia1(Request $req) {
    if (isset($req["busqueda_DNI_docente"])) {
        $resultados_d = Docente::where("DNI", "=", $req["busqueda_DNI_docente"])->first();
    } else {
        $resultados_d = null;
    }
    return view("acreditarEstudiantesDia1", compact("resultados_d"));
  }

  public function acreditacionDia2(Request $req) {
    if (isset($req["busqueda_DNI_docente"])) {
        $resultados_d = Docente::where("DNI", "=", $req["busqueda_DNI_docente"])->first();
    } else {
        $resultados_d = null;
    }
    return view("acreditarEstudiantesDia2", compact("resultados_d"));
  }

  public function acreditados(Request $req) {

if (isset($req->presente))
    foreach ($req->presente as $estudiante) {
      $estudiantesPres = Estudiante::where("DNI", "=", $estudiante)->first();
      $estudiantesPres->pres_dia1 = 1;
      $estudiantesPres->save();
  }
  $docente = Docente::where("DNI", "=","$req->dnidocente")->first();
  $estudiantesPresentes = Estudiante::where([
    ["pres_dia1", "=", 1],
    ["ID_docente_reg","=","$docente->ID"]
  ])->get();


return view("estudiantesAcreditados", compact("estudiantesPresentes"));
  }

  public function acreditadosDia1(Request $req) {

if (isset($req->presente))
    foreach ($req->presente as $estudiante) {
      $estudiantesPres = Estudiante::where("DNI", "=", $estudiante)->first();
      $estudiantesPres->pres_dia1 = 1;
      $estudiantesPres->save();
  }
  $docente = Docente::where("DNI", "=","$req->dnidocente")->first();
  $estudiantesPresentes = Estudiante::where([
    ["pres_dia1", "=", 1],
    ["ID_docente_reg","=","$docente->ID"]
  ])->get();


return view("estudiantesAcreditadosDia1", compact("estudiantesPresentes"));
  }

  public function acreditadosDia2(Request $req) {

  if (isset($req->presente))
    foreach ($req->presente as $estudiante) {
      $estudiantesPres = Estudiante::where("DNI", "=", $estudiante)->first();
      $estudiantesPres->pres_dia2 = 1;
      $estudiantesPres->save();
  }
  $docente = Docente::where("DNI", "=","$req->dnidocente")->first();
  $estudiantesPresentes = Estudiante::where([
    ["pres_dia2", "=", 1],
    ["ID_docente_reg","=","$docente->ID"]
  ])->get();


  return view("estudiantesAcreditadosDia2", compact("estudiantesPresentes"));
  }

  public function listado() {
  $estudiantes = Estudiante::orderBy('apellido')->paginate(10);
  $totaldeestudiantes = Estudiante::all()->count();
  // $escuelaPorID = Escuela::where("ID_escuela", "=", $req["iddelaescuela"])->first();
    return view("listadoEstudiantes", compact("estudiantes", "totaldeestudiantes", "escuelaPorID"));
  }

  public function listadoEstudiantesPresentesDia1(Request $req) {
  // $estudiantes = Estudiante::orderBy('apellido')->paginate(15);
  $estudiantesPresentesDia1 = Estudiante::where("pres_dia1", "=", 1)->orderBy('apellido')->paginate(10);
  $totaldeestudiantesPresentesDia1 = Estudiante::where("pres_dia1", "=", 1)->count();
  // $escuelaPorID = Escuela::where("ID_escuela", "=", $req["iddelaescuela"])->first();
    return view("listadoEstudiantesPresentesDia1", compact("totaldeestudiantesPresentesDia1", "estudiantesPresentesDia1"));
  }

  public function listadoEstudiantesPresentesDia2(Request $req) {
  // $estudiantes = Estudiante::orderBy('apellido')->paginate(15);
  $estudiantesPresentesDia2 = Estudiante::where("pres_dia2", "=", 1)->orderBy('apellido')->paginate(10);
  $totaldeestudiantesPresentesDia2 = Estudiante::where("pres_dia2", "=", 1)->count();
  // $escuelaPorID = Escuela::where("ID_escuela", "=", $req["iddelaescuela"])->first();
    return view("listadoEstudiantesPresentesDia2", compact("totaldeestudiantesPresentesDia2", "estudiantesPresentesDia2"));
  }


}
;