<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Establecimiento;

class EstablecimientosController extends Controller
{
    public function listado(Request $req) {
      if (isset($req["busqueda_establecimiento"])) {
          $resultados_e = Escuela::where("nombre", "like", "%" . $req["busqueda_establecimiento"] . "%")->get();
      } else {
          $resultados_e = [];
      }
      return view("consultaEstablecimientos", compact("resultados_e"));
    }

    
}
