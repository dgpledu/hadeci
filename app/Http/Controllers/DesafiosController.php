<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desafio;
use App\Tutor;

class DesafiosController extends Controller
{
  public function consultaTipeandoCodigo(Request $req) {
    if (isset($req["busqueda_desafio"])) {
        $des = Desafio::where("codigo", "=", $req["busqueda_desafio"])->first();
    } else {
        $des = null;
    }
    return view("consultaPorDesafioTipeandoCodigo", compact("des"));
  }

  public function consulta(Request $req) {
    $todoslosdesafios = Desafio::where("codigo", "!=", "NE")->orderBy("codigo")->get();
    if (isset($req["busqueda_desafio"])) {
        $des = Desafio::where("codigo", "=", $req["busqueda_desafio"])->first();

    } else {
        $des = null;

    }
    return view("consultaPorDesafio", compact("des", "todoslosdesafios"));
  }

  public function consultaDeTutores(Request $req) {

    $todoslosdesafios = Desafio::where("codigo", "!=", "NE")->orderBy("codigo")->get();
    if (isset($req["busqueda_desafio"])) {
        $des = Desafio::where("ID", "=", $req["busqueda_desafio"])->first();

        $todoslostutoress = Tutor::all()->sortBy("Apellido");

    } else {
        $des = null;
        $todoslostutoress = Tutor::all()->sortBy("Apellido");
    }
    return view("asignarDesafioATutores", compact("des", "todoslosdesafios", "todoslostutoress"));
  }

  public function asignarDesafioATutor (Request $req)
  {
    $tutorAAsignar = Tutor::where("ID", "=", $req["ID_tutor"])->first();
    // dd($tutorAAsignar);
    $tutorAAsignar ["ID_desafio"] = $req["busqueda_desafio"];
    $tutorAAsignar->update();

    $eldesafio = Desafio::where("ID", "=", $req["busqueda_desafio"])->first();

    return redirect("/asignarDesafioATutores")
    ->with ([
      "eltutor" => $tutorAAsignar["Nombre"]." ".$tutorAAsignar["Apellido"],
      "eldesafio" => $eldesafio["nombre"],
      "elcodigo" => $eldesafio["codigo"],
    ])
    ;
  }


  public function cargar()
  {
return view("cargarDesafios");
}

  public function guardar(Request $req)
  {
$desafio = new Desafio();

$codigoAlf = $req["codigo_desafio_alf"];

$ultimoDesafioCat = Desafio::where('codigo', 'like', $codigoAlf."%")->get()->last();
$codigoUltimoDesafio = $ultimoDesafioCat["codigo"];
//dd($ultimoDesafioCat);

if ($ultimoDesafioCat == null) {

  if ($req["codigo_desafio_alf"] == "D-ESP-") {
  $desafio["codigo"] = $req["codigo_desafio_alf"]."101";
  //dd($desafio["codigo"]);
  }
  if (($req["codigo_desafio_alf"] == "D-GES-")) {
  $desafio["codigo"] = $req["codigo_desafio_alf"]."201";
  }
  if (($req["codigo_desafio_alf"] == "D-VID-")) {
  $desafio["codigo"] = $req["codigo_desafio_alf"]."301";
  }
  if (($req["codigo_desafio_alf"] == "D-ART-")) {
  $desafio["codigo"] = $req["codigo_desafio_alf"]."401";
  }

}
else {
  $numCodigoUltimoDesafio = intval(substr($codigoUltimoDesafio, -3));
  $numCodigoNuevoDesafio = $numCodigoUltimoDesafio + 1;
  $desafio["codigo"] = $req["codigo_desafio_alf"].$numCodigoNuevoDesafio;
}

$desafio["nombre"] = $req["nombre_desafio"];
$desafio["descripcion"] = $req["descripcion_desafio"];
//dd($desafio["codigo"]);
$desafio->save();

return redirect("/cargarDesafios");
  }
}
