<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propuesta; // El "Propuesta" en amarillo es el nombre del modelo en Propuesta.php
// use App\Grupo;
use App\Rules\LetrasYEspacios;

class PropuestasController extends Controller
{

  public function inscribirPropuestas() {
    return view("inscripcionPropuestas");
  }

  public function registrarPropuestas(Request $req) {
    $this->validate($req, [
      "nombre_coord" => ['required',new LetrasYEspacios, 'max:20'],
      "codigo" => "required|alpha_dash|max:20"
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

  public function votarPropuestas() {
    return view("votacionPeoplesChoice");
  }

  public function registrarVoto(Request $req) {
    $this->validate($req, [
      "Opcion1DePropuesta" => "required|string|max:20",
      "Opcion2DePropuesta" => "required|string|max:20",
      // "apellido" => ['required',new LetrasYEspacios, 'max:20'],
      "dni_estudiante" => "required|alpha_dash|max:20",
    ]);

    // $propuesta = new Propuesta();
    $propuesta["nom_propuesta"] = $req["Opcion1DePropuesta"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $propuesta["cant_votos"] = $propuesta["cant_votos"] + 1;

    $propuesta->save();

    return redirect("/votacionPeoplesChoice")
    ->with([
    "estado" => $req["dni_estudiante"],
    ])

    ;

  }


}
