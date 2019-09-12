<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escuela;

class EscuelasParticipantesController extends Controller
{
    public function consulta(Request $req) {
      if (isset($req["busqueda_escuela"])) {
          $resultados_esc = Escuela::where("nombre", "like", "%" . $req["busqueda_escuela"] . "%")->get();
      } else {
          $resultados_esc = [];
      }
      return view("consultaEscuelasParticipantes", compact("resultados_esc"));
    }

    public function listadoPorEscuela() {
      $escuelasordenadas = Escuela::with('docentes')->where("activa", "=", 1)->orderBy("nombre")->paginate(200);

      $numerototaldeescuelas = $escuelasordenadas->count();

      return view("listadoDocentesPorEscuela", compact("escuelasordenadas"));
    }

    public function consultaEscuelasPorID(Request $req) {
      if (isset($req["busqueda_establecimientoPorID"])) {
          $resultados_e = Escuela::where("ID", "=", $req["busqueda_establecimientoPorID"])->get();
      } else {
          $resultados_e = [];
      }
      return view("consultaEscuelasPorID", compact("resultados_e"));
    }

    public function consultaactivas(Request $req) {

      if (isset($req["busqueda_escuela"])) {
$resultados_esc = Escuela::where("activa", "=", 1)
->where("nombre", "like", "%" . $req["busqueda_escuela"] . "%")
->get();
      } else {
          $resultados_esc = [];
      }
      return view("consultaEscuelasParticipantes", compact("resultados_esc"));
    }

    public function todaslasactivas() {

          $escuelasactivas = Escuela::where("activa", "=", 1);

      return view("estudiantesPorEscuela", compact("escuelasactivas"));
    }

    public function todas(Request $req) {

          $resultados_esc = Escuela::all();

      return view("estudiantesPorEscuela", compact("resultados_esc"));
    }
//     public function listado(Request $req) {
// $escuelasordenadas = Escuela::orderBy('nombre')->paginate(10);
//       $numerototaldeescuelas = Escuela::all()->count();
//
//       return view("listadoEscuelas", compact("numerototaldeescuelas", "escuelasordenadas"));
//     }

public function listadoParticipantes() {

$escuelasordenadas = Escuela::where("activa", "=", 1)->orderBy("nombre")->paginate(100);

// $escuelasordenadas = Escuela::orderBy('nombre')->paginate(10);
 $numerototaldeescuelas = $escuelasordenadas->count();

  return view("listadoEscuelasParticipantes", compact("numerototaldeescuelas", "escuelasordenadas"));
}

public function listadoInscriptas() {

$escuelasordenadas = Escuela::where("activa", "=", 1)->orderBy("nombre")->paginate(100);

// $escuelasordenadas = Escuela::orderBy('nombre')->paginate(10);
 $numerototaldeescuelas = $escuelasordenadas->count();

  return view("listadoEscuelasInscriptas", compact("numerototaldeescuelas", "escuelasordenadas"));
}

public function listadotodas(Request $req) {
      if (isset($req["busqueda_establecimiento"])) {
          $resultados_e = Escuela::where("nombre", "like", "%" . $req["busqueda_establecimiento"] . "%")->get();
      } else {
          $resultados_e = [];
      }
      return view("consultaEstablecimientos", compact("resultados_e"));
    }

    public function cargarEscuela() {

      return view("agregarescuelas");
    }

    public function agregarEscuela(Request $req)
    {
      $escuelaagregada = new Escuela();
      $escuelaagregada["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
      $escuelaagregada["nombre_abrev"] = $req["nombre_abrev"];
      $escuelaagregada["dom_edific"] = $req["dom_edific"];
      $escuelaagregada["dom_establ"] = $req["dom_establ"];
      $escuelaagregada["cui"] = $req["cui"];
      $escuelaagregada["cueanexo"] = $req["cueanexo"];
      $escuelaagregada["cue"] = $req["cue"];
      $escuelaagregada["telefono"] = $req["telefono"];
      $escuelaagregada["nivelmodal"] = $req["nivelmodal"];
      $escuelaagregada["de"] = $req["de"];
      $escuelaagregada["comunas"] = $req["comunas"];
      $escuelaagregada["barrio"] = $req["barrio"];
      $escuelaagregada["codigo_postal"] = $req["codigo_postal"];

      $escuelaagregada->save();

      return redirect("/agregarescuelas")
      ->with([
      "estado" => $req["nombre"],

      ])

      ;
    }

};
