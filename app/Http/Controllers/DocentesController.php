<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escuela;
use App\Docente;
use App\Mail\Bienvenidodocente;
use App\Estudiante;
use App\Rules\LetrasYEspacios;

class DocentesController extends Controller
{

public function inscribir() {

return view("inscripcionDocentes");
  }

public function registrar(Request $req) {
  $docentex = Docente::where("DNI", "=", $req["dni_docente"])->first();

  if($docentex) // CASO: Docente existente con ese DNI en la tabla docentes
    {
      if (
        $docentex->escuelas->pluck('ID')->contains($req["id_escuela"]) // si concuerdan DNI y escuela
        )
        {
          $this->validate($req, [
            "nombre" => ['required',new LetrasYEspacios, 'max:20'],
            "apellido" => ['required',new LetrasYEspacios, 'max:20'],
            // "dni_docente" => "required|numeric|min:1000000|max:99999999|unique:docentes,DNI",
            "dni_docente" => "required|alpha_dash|max:20|unique:docentes,DNI",
            "email_docente" => "required|email",
            "fecha_nac_docente" => "required|date|after:01-01-1900|before:30-09-2001",
            "celular" => "required|integer|max:99999999999",
            "restric_alim" => "required",
            "id_escuela" => "required|integer|exists:escuelas,ID"
          ], ["dni_docente.unique" => "Usted ya se encuentra registrado/a en el sistema asociado a esa misma escuela. Si desea proceder con la inscripción de estudiantes, haga clic en la opción Inscripción arriba a la derecha."]);
        }
      else // Si también coincide el apellido con ese DNI, entonces graba en la tabla intermedia la nueva relación
        {

          if ($req["apellido"] == $docentex["apellido"]) {
            $this->validate($req, [
              "nombre" => ['required',new LetrasYEspacios, 'max:20'],
              "apellido" => ['required',new LetrasYEspacios, 'max:20'],
              "dni_docente" => "required|alpha_dash|max:20",
              // "email_docente" => "required|email",
              // "fecha_nac_docente" => "required|date|before:2012",
              // "celular" => "required|string|max:30",
              // "restric_alim" => "required",
              "id_escuela" => "required|integer|exists:escuelas,ID"
            ],
            ["dni_docente.unique" => "Ese DNI ya existe y no concuerda con su apellido."]);
            $docentex->escuelas()->attach($req["id_escuela"]);

// Graba una nueva escuela para un docente que ya existía
            $escuela = Escuela::find($req["id_escuela"]);
            $escuela["activa"] = 1; //también puede ser $escuela->activa=1
            $escuela->save();

//lo agregué para mandar un mail también cuando se inscribe por segunda vez
            try {
              \Mail::to($docentex)->send(new Bienvenidodocente);
            } catch (\Exception $e) {
              $e = "No se pudo enviar el mail. Revise su conexión a Internet. Si aún así continúa el error, escríbanos a desafios.cientificos@bue.edu.ar";
              return $e;
            }
// fin del agregado

          }
else { // si el apellido no coincide con ese DNI, le dice que ese DNI ya existe
  $this->validate($req, [
    "nombre" => ['required',new LetrasYEspacios, 'max:20'],
    "apellido" => ['required',new LetrasYEspacios, 'max:20'],
    "dni_docente" => "required|unique:docentes,DNI|alpha_dash|max:20",
    "email_docente" => "required|email",
    "fecha_nac_docente" => "required|date|after:01-01-1900|before:30-09-2001",
    "celular" => "required|integer|max:99999999999",
    "restric_alim" => "required",
    "id_escuela" => "required|integer|exists:escuelas,ID"
  ]);

}
        }

    } // acá termina el IF principal...

  else // CASO: Docente nuevo NO existe el docente en la tabla docentes... (porque no existe su DNI)
    {
        $this->validate($req, [
          "nombre" => ['required',new LetrasYEspacios, 'max:20'],
          "apellido" => ['required',new LetrasYEspacios, 'max:20'],
          "dni_docente" => "required|alpha_dash|max:20|",
          "email_docente" => "required|email",
          "fecha_nac_docente" => "required|date|after:01-01-1900|before:30-09-2001",
          "celular" => "required|integer|max:99999999999",
          "restric_alim" => "required",
          "id_escuela" => "required|integer|exists:escuelas,ID"
                              ]);
          //Pone a la escuela como "activa"
          $escuela = Escuela::find($req["id_escuela"]);
          $escuela["activa"] = 1; //también puede ser $escuela->activa=1
          $escuela->save();

          $docente = new Docente();

          $docente["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
          $docente["apellido"] = $req["apellido"];
          $docente["DNI"] = $req["dni_docente"];
          $docente["fecha_nac"] = $req["fecha_nac_docente"];
          $docente["email"] = $req["email_docente"];
          $docente["restric_alim"] = $req["restric_alim"];
          $docente["celular"] = $req["celular"];
          $docente->save();

          $docente->escuelas()->attach($req["id_escuela"]);

          try {
            \Mail::to($docente)->send(new Bienvenidodocente);
          } catch (\Exception $e) {
            $e = "No se pudo enviar el mail. Revise su conexión a Internet. Si aún así continúa el error, escríbanos a desafios.cientificos@bue.edu.ar";
            return $e;
          }

          // \Mail::to($docente)->send(new Bienvenidodocente);

    } // cierre del else

return redirect("/inscripcionDocentes")
->with([
"estado" => $req["nombre"] ." ". $req["apellido"],
"correo" => $req["email_docente"],
"escuela" => Escuela::find($req["id_escuela"])->nombre
])
;

} // cierre de la función

public function editarDocente(Request $req)
    {
        $docente=Docente::find($req["ID_docente_a_editar"]);
        return view('editarDocentes',compact('docente'));
    }

public function actualizarDocente(Request $req) // editar y borrar docentes
    {
if (isset($req["ID"])) {

        $this->validate($req,['nombre'=>'required', 'apellido'=>'required']);

        Docente::find($req["ID"])->update($req->all());

        return redirect("/indiceDocentes")
        ->with([
          "exitoso" => "Registro actualizado satisfactoriamente",
        ]);

}
      if (isset($req["ID_docente_a_borrar"])) {
        $docenteABorrar = Docente::find($req["ID_docente_a_borrar"]);
        //
        $docenteABorrar->escuelas()->detach();

        Estudiante::where('ID_docente_reg', $req["ID_docente_a_borrar"])->delete();

        $docenteABorrar->delete();

          return redirect("/indiceDocentes")
          ->with([
            "exitoso" => "Registro borrado satisfactoriamente",
          ]);
      }

    }

public function acreditarDia1(Request $req) {
  if (isset($req["busqueda_DNI_docente"])) {
      $resultados_d = Docente::where("DNI", $req["busqueda_DNI_docente"])->get();
  } else {
      $resultados_d = [];
  }
  return view("acreditacionDocentesDia1", compact("resultados_d"));
}

public function confirmarDia1(Request $req) {
  if ($req["presente"] == "Acreditarse")
        $docentesPres = Docente::where("DNI", "=", $req["busqueda_DNI_docente"])->first();
        $docentesPres->pres_dia1 = 1;
        $docentesPres->save();
        // dd($req["apellido"]);
  return redirect("/acreditacionDocentesDia1")
  ->with([
  // "estado" => $req["nombre"]." ".$req["apellido"],
    "estado" => $docentesPres["nombre"]." ".$docentesPres["apellido"],
  ])
  ;

}

public function acreditarDia2(Request $req) {
  if (isset($req["busqueda_DNI_docente"])) {
      $resultados_d = Docente::where("DNI", $req["busqueda_DNI_docente"])->get();
  } else {
      $resultados_d = [];
  }
  return view("acreditacionDocentesDia2", compact("resultados_d"));
}

public function confirmarDia2(Request $req) {
  if ($req["presente"] == "Acreditarse")
        $docentesPres = Docente::where("DNI", "=", $req["busqueda_DNI_docente"])->first();
        $docentesPres->pres_dia2 = 1;
        $docentesPres->save();
        // dd($req["apellido"]);
  return redirect("/acreditacionDocentesDia2")
  ->with([
  // "estado" => $req["nombre"]." ".$req["apellido"],
    "estado" => $docentesPres["nombre"]." ".$docentesPres["apellido"],
  ])
  ;

}

public function listado(Request $req) {
$docentes = Docente::orderBy('apellido')->paginate(200);
$todoslosdocentes = Docente::all();
  return view("listadoDocentes", compact("todoslosdocentes", "docentes"));
}

// public function listadoPorEscuela(Request $req) {
//
// $docentes = Docente::with('escuelas')->orderBy('ID_escuela')->paginate(200);
// //$docentes = Docente::orderBy('ID')->paginate(200);
// $todoslosdocentes = Docente::all();
//   return view("listadoDocentesPorEscuela", compact("todoslosdocentes", "docentes"));
// }

public function listadoParaEditarDocentesANTIGUO(Request $req) {
$docentes = Docente::orderBy('apellido')->paginate(200);
$todoslosdocentes = Docente::all();
  return view("listadoDocentes", compact("todoslosdocentes", "docentes"));
}

public function listadoParaEditarDocentes(Request $req) {
$docentes = Docente::orderBy('apellido')->paginate(200);
$todoslosdocentes = Docente::all();
  return view("indiceDocentes", compact("todoslosdocentes", "docentes"));
}


public function listadoD1(Request $req) {
$todoslosdocentesD1 = Docente::where("pres_dia1", "=", 1)
->orderBy('apellido')
->paginate(200);
  return view("listadoDocentesD1", compact("todoslosdocentesD1"));
}

public function listadoD2(Request $req) {
$todoslosdocentesD2 = Docente::where("pres_dia2", "=", 1)
->orderBy('apellido')
->paginate(200);
  return view("listadoDocentesD2", compact("todoslosdocentesD2"));
}

public function listadoD1D2(Request $req) {
$todoslosdocentesD1D2 = Docente::where("pres_dia1", "=", 1)
->where("pres_dia2", "=", 1)
->orderBy('apellido')
->paginate(200);
  return view("listadoDocentesD1D2", compact("todoslosdocentesD1D2"));
}

public function listadoDocentesTotales(Request $req) {
$docentestotales = Docente::where("pres_dia1", "=", 1, 'OR', "pres_dia2", "=", 1 )
->orderBy('apellido')
->paginate(300);
  return view("listadoDocentesTotales", compact("docentestotales"));
}

public function PorDNI(Request $req) {
  if (isset($req["busqueda_DNI_docente"])) {
      // $resultados_d = Docente::where("DNI", "like", "%" . $req["busqueda_DNI_docente"] . "%")->get();
      $resultados_d = Docente::where("DNI", $req["busqueda_DNI_docente"])->get();
  } else {
      $resultados_d = [];
  }
  return view("acreditarDocentesDia1", compact("resultados_d"));
}

}
