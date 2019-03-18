<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Estudiante;

class CategoriasController extends Controller
{
  public function consulta(Request $req) {
    $categorias = Categoria::where("ID_cat_tem2", "=", "$req["cat_tem2"]")->first();

    return view("inscripcionEstudiantes", compact("categorias"));
  }
}
