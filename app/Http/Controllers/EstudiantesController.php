<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Docente; // El "Docente" en amarillo es el nombre del modelo en Docente.php
use App\Escuela;
use App\Grupo;
use App\Estudiante;
use App\Categoria;
use App\Rules\CategoriasTematicas;
use App\Rules\LetrasYEspacios;



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
  // Prueba de consulta de estudiantes por Apellido
  // public function PorApellido(Request $req) {
  //   if (isset($req["busqueda_apellido_estudiante"])) {
  //       $resultados_e = Estudiante::where("apellido", "=", $req["busqueda_apellido_estudiante"])->first();
  //   } else {
  //       $resultados_e = null;
  //   }
  //   return view("estudiantesPorApellido", compact("resultados_e"));
  // }


  public function PorApellido(Request $req) {
    if (isset($req["busqueda_apellido_estudiante"])) {
        $resultados_e = Estudiante::where("apellido", "like", "%" . $req["busqueda_apellido_estudiante"] . "%")->get();
    } else {
        $resultados_e = [];
    }
    return view("estudiantesPorApellido", compact("resultados_e"));
  }


  // fin de prueba de estudiantes por apellido

  // Prueba para consulta de docentes sin loguearse
  public function PorDocenteNL(Request $req) {
    if (isset($req["busqueda_DNI_docente"])) {
        $resultados_d = Docente::where("DNI", "=", $req["busqueda_DNI_docente"])->first();
    } else {
        $resultados_d = null;
    }
    return view("estudiantesPorDocenteNL", compact("resultados_d"));
  }

  // fin de prueba para consulta de docentes sin loguearse

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
  "dnidocente" => "required|alpha_dash|exists:docentes,DNI",
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
  // esto lo agregué como regla para categorías temáticas

// fin de lo agregado

  public function registrar(Request $req) {

// session(["dnidocente" => $req["dnidocente"]]); Me lo hizo borrar Daro pero andaba bien en lugar de la línea que está abajo
$req->session()->flash('dnidocente', $req["dnidocente"]);
    $this->validate($req, [

    "nombre" => ['required',new LetrasYEspacios, 'max:20'],
    "apellido" => ['required',new LetrasYEspacios, 'max:20'],
    "DNIestudiante" => "required|string|min:7|max:20|unique:estudiantes,DNI",
    "EmailEstudiante" => "required|email|max:60",
    "celular" => "sometimes|nullable|integer|max:99999999999",
    "FechaNacimientoEstudiante" => "required|date|after:01-01-1989|before:30-09-2009",
    "AnioQueCursa" => "required|string:4to. año,5to. año,6to. año",
    //"RestriccionAlimentaria" => "required|string:No,Celiaquía,Veganismo,Vegetarianismo,Fenilcetonuria,Otra",
"RestriccionAlimentaria" => "required",
    "Opcion1DeCategoriaTematica" => "required|integer",
  "Opcion2DeCategoriaTematica" => ['required','integer', new CategoriasTematicas],
//   "NombrePadreMadre" => "required|string|max:50",
//   "ApellidoPadreMadre" => "required|string|max:50",
// "EmailPadreMadre" => "required|string|max:30",
//   "TelefonoPadreMadre" => "required|string|max:50",
  "escuela" => "required|integer"

  ]

)

;
//si no pasa la validación, no pasa por acá
    $estudiante = new Estudiante();
    $estudiante["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $estudiante["apellido"] = $req["apellido"];
    $estudiante["DNI"] = $req["DNIestudiante"];
    $estudiante["email"] = $req["EmailEstudiante"];
    $estudiante["celular"] = $req["celular"];
    $estudiante["fecha_nac"] = $req["FechaNacimientoEstudiante"];
    $estudiante["ID_escuela"] = $req["escuela"];
    $estudiante["ID_cat_tem1"] = $req["Opcion1DeCategoriaTematica"];
    $estudiante["ID_cat_tem2"] = $req["Opcion2DeCategoriaTematica"];
    $estudiante["anio_cursa"] = $req["AnioQueCursa"];
    $estudiante["restric_alim"] = $req["RestriccionAlimentaria"];
    // $estudiante["nom_padre"] = $req["NombrePadreMadre"];
    // $estudiante["ape_padre"] = $req["ApellidoPadreMadre"];
    // $estudiante["mail_padre"] = $req["EmailPadreMadre"];
    // $estudiante["telefono_padre"] = $req["TelefonoPadreMadre"];

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
  $estudiantes = Estudiante::orderBy('apellido')->paginate(1000);
  $totaldeestudiantes = Estudiante::all()->count();

    return view("listadoEstudiantes", compact("estudiantes", "totaldeestudiantes"));
  }

  public function armarGrupos(Request $req) {

$estudiantesPorTematica1raOpcion = Estudiante::where('ID_cat_tem1', '=', $req["ID_categoria_tematica1"])->take(11)->get();
$estudiantesPorTematica2daOpcion = Estudiante::where('ID_cat_tem2', '=', $req["ID_categoria_tematica2"])->take(11)->get();

    return view ("armadoDeGrupos", compact("estudiantesPorTematica1raOpcion", "estudiantesPorTematica2daOpcion"));
  }

  public function formarGrupos(Request $req) {

$escuelasParticipantes = Escuela::where("activa", "=", 1)->get();
$IDescuelas = $escuelasParticipantes->pluck('ID');
$IDestudiantes = Estudiante::all()->pluck('ID');
$todoslosestudiantes = Estudiante::all();

$tleC1 = Estudiante::where('ID_cat_tem1', '=', $req["ID_categoria_tematica"])->get();
$estudiantesPorTematica = $tleC1->shuffle();

    return view ("formadoDeGrupos", compact("estudiantesPorTematica"));
  }


  public function listadoCT1() {
  $estudiantes = Estudiante::orderBy('ID_cat_tem1')->paginate(1000);
  $totaldeestudiantes = Estudiante::all()->count();

    return view("listadoEstudiantesCT1", compact("estudiantes", "totaldeestudiantes"));
  }

  public function listadoCT2() {
  $estudiantes = Estudiante::orderBy('ID_cat_tem2')->paginate(1000);
  $totaldeestudiantes = Estudiante::all()->count();

    return view("listadoEstudiantesCT2", compact("estudiantes", "totaldeestudiantes"));
  }

  public function listadoEstudiantesPresentesDia1(Request $req) {
  $estudiantesPresentesDia1 = Estudiante::where("pres_dia1", "=", 1)
  ->orderBy('apellido')
  ->paginate(1000);
  $totaldeestudiantesPresentesDia1 = Estudiante::where("pres_dia1", "=", 1)
  ->count();
    return view("listadoEstudiantesPresentesDia1", compact("totaldeestudiantesPresentesDia1", "estudiantesPresentesDia1"));
  }

  public function listadoEstudiantesPresentesDia2(Request $req) {
  $estudiantesPresentesDia2 = Estudiante::where("pres_dia2", "=", 1)
  ->orderBy('apellido')
  ->paginate(1000);
  $totaldeestudiantesPresentesDia2 = Estudiante::where("pres_dia2", "=", 1)
  ->count();
    return view("listadoEstudiantesPresentesDia2", compact("totaldeestudiantesPresentesDia2", "estudiantesPresentesDia2"));
  }

  public function listadoEstudiantesPresentesD1D2(Request $req) {
  $estudiantesPresentesD1D2 = Estudiante::where("pres_dia1", "=", 1)
  ->where("pres_dia2", "=", 1)
  ->orderBy('apellido')
  ->paginate(1000);
    return view("listadoEstudiantesPresentesD1D2", compact("estudiantesPresentesD1D2"));
  }

  // Prueba de edición y actualización de estudiantes
  public function editarEstudiante(Request $req)
      {
          $estudiante=Estudiante::find($req["ID_estudiante_a_editar"]);
          return view('editarEstudiantes',compact('estudiante'));
      }

  public function actualizarEstudiante(Request $req)
          {

      if (isset($req["ID"])) {

              $this->validate($req,['Nombre'=>'required', 'Apellido'=>'required']);

              Estudiante::find($req["ID"])->update($req->all());

              return redirect("/indiceEstudiantes")
              ->with([
                "exitoso" => "Registro actualizado satisfactoriamente",
              ]);

      }
            if (isset($req["ID_estudiante_a_borrar"])) {
              $estudianteABorrar = Estudiante::find($req["ID_estudiante_a_borrar"]);

              $estudianteABorrar->delete();

                return redirect("/indiceEstudiantes")
                ->with([
                  "exitoso" => "Registro borrado satisfactoriamente",
                ]);
            }

          }

  public function listadoParaEditarEstudiantes(Request $req) {
  $estudiantes = Estudiante::orderBy('apellido')->paginate(1000);
  $todoslosestudiantes = Estudiante::all();
    return view("indiceEstudiantes", compact("todoslosestudiantes", "estudiantes"));
  }

  // fin de prueba

}
;
