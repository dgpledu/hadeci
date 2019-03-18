<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desafio;

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
    $todoslosdesafios = Desafio::where("codigo", "!=", "NE")->get();
    if (isset($req["busqueda_desafio"])) {
        $des = Desafio::where("codigo", "=", $req["busqueda_desafio"])->first();

    } else {
        $des = null;

    }
    return view("consultaPorDesafio", compact("des", "todoslosdesafios"));
  }

  public function consultaDeTutores(Request $req) {

    $todoslosdesafios = Desafio::where("codigo", "!=", "NE")->get();
    if (isset($req["busqueda_desafio"])) {
        $des = Desafio::where("codigo", "=", $req["busqueda_desafio"])->first();

    } else {
        $des = null;

    }
    return view("asignarDesafioATutores", compact("des", "todoslosdesafios"));
  }

  public function cargar()
  {
return view("cargarDesafios");
}

  public function guardar(Request $req)
  {
$desafio = new Desafio();

$desafio ["codigo"] = $req["codigo_desafio"];
$desafio["nombre"] = $req["nombre_desafio"];
$desafio["descripcion"] = $req["descripcion_desafio"];

$desafio->save();

return redirect("/cargarDesafios");
  }
}
