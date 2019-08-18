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

$escuelasordenadas = Escuela::where("activa", "=", 1)->orderBy("nombre")->paginate(30);

// $escuelasordenadas = Escuela::orderBy('nombre')->paginate(10);
 $numerototaldeescuelas = $escuelasordenadas->count();

  return view("listadoEscuelasParticipantes", compact("numerototaldeescuelas", "escuelasordenadas"));
}

public function listadoInscriptas() {

$escuelasordenadas = Escuela::where("activa", "=", 1)->orderBy("nombre")->paginate(30);

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

};
