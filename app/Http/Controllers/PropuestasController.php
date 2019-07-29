<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propuesta; // El "Propuesta" en amarillo es el nombre del modelo en Propuesta.php
// use App\Grupo;

class PropuestasController extends Controller
{

  public function inscribirPropuestas() {
    return view("inscripcionPropuestas");
  }

  // public function PorGrupo(Request $req) {
  //   $todoslosgrupos = Grupo::all();
  //   if (isset($req["ID_grupo"])) {
  //       $resultados_grupo = Grupo::where("nombre", "=", $req["ID_grupo"])->first();
  //   } else {
  //       $resultados_grupo = null;
  //   }
  //   return view("inscripcionPropuestas", compact("resultados_grupo", "todoslosgrupos"));
  // }

  public function registrarPropuestas(Request $req) {
    $this->validate($req, [
      "nombre_coord" => "required|string|max:60",
      "nom_propuesta" => "required|string|max:45",
      "descrip_propuesta" => "required|string|max:255",
      "codigo" => "required|string|max:10",
      "ID_grupo" => "required|string|max:40"

    ]);

    $propuesta = new Propuesta();
    $propuesta["nombre_coord"] = $req["nombre_coord"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $propuesta["nom_propuesta"] = $req["nom_propuesta"];
    $propuesta["descrip_propuesta"] = $req["descrip_propuesta"];
    $propuesta["codigo"] = $req["codigo"];
    $propuesta["ID_grupo"] = $req["ID_grupo"];

    $propuesta->save();

    return redirect("/inscripcionPropuestas")
    ->with([
    "estado" => $req["nom_propuesta"],
    ])

    ;
  }


}
