<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escuela;
use App\Docente;
use App\Mail\Bienvenidodocente;
use App\Estudiante;

class DocentesController extends Controller
{
  // public function consulta(Request $req) {
  // $todoslosdocentes = Docente::all();
  //   if (isset($req["busqueda_docente"])) {
  //       $resultados_docente = Docente::where("ID", "=", $req["busqueda_docente"])->first();
  //   } else {
  //       $resultados_docente = null;
  //   }
  //   return view("consultaDocentes", compact("resultados_docente", "todoslosdocentes"));
  // }
  //
  // public function listado(Request $req) {
  // $docentes = Docente::orderBy('apellido')->paginate(15);
  // $todoslosdocentes = Tutor::all();
  //   return view("listadoDocentes", compact("todoslosdocentes", "docentes"));
  // }

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
            "nombre" => "required|string|max:30",
            "apellido" => "required|string|max:40",
            "dni_docente" => "required|numeric|min:1000000|max:99999999|unique:docentes,DNI",
            "email_docente" => "required|email",
            "fecha_nac_docente" => "required|date",
            "id_escuela" => "required|integer|exists:escuelas,ID"
          ], ["dni_docente.unique" => "Usted ya se encuentra registrado/a en el sistema asociado a esa misma escuela. Si desea proceder con la inscripción de estudiantes, haga clic en la opción Inscripción arriba a la derecha."]);
        }
      else // Si también coincide el apellido con ese DNI, entonces graba en la tabla intermedia la nueva relación
        {

          if ($req["apellido"] == $docentex["apellido"]) {
            $this->validate($req, [
              "nombre" => "required|string|max:30",
              "apellido" => "required|string|max:40",
              "dni_docente" => "required|numeric|min:1000000|max:99999999",
              "email_docente" => "required|email",
              "fecha_nac_docente" => "required|date",
              "id_escuela" => "required|integer|exists:escuelas,ID"
            ], ["dni_docente.unique" => "Ese DNI ya existe y no concuerda con su apellido."]);
            $docentex->escuelas()->attach($req["id_escuela"]);

// Graba una nueva escuela para un docente que ya existía
            $escuela = Escuela::find($req["id_escuela"]);
            $escuela["activa"] = 1; //también puede ser $escuela->activa=1
            $escuela->save();

          }
else { // si el apellido no coincide con ese DNI, le dice que ese DNI ya existe
  $this->validate($req, [
    "nombre" => "required|string|max:30",
    "apellido" => "required|string|max:40",
    "dni_docente" => "required|unique:docentes,DNI|numeric|min:1000000|max:99999999",
    "email_docente" => "required|email",
    "fecha_nac_docente" => "required|date",
    "id_escuela" => "required|integer|exists:escuelas,ID"
  ]);

}
        }

    } // acá termina el IF principal...

  else // CASO: Docente nuevo NO existe el docente en la tabla docentes... (porque no existe su DNI)
    {
        $this->validate($req, [
          "nombre" => "required|string|max:30",
          "apellido" => "required|string|max:40",
          "dni_docente" => "required|numeric|min:1000000|max:99999999|",
          "email_docente" => "required|email",
          "fecha_nac_docente" => "required|date",
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


          \Mail::to($docente)->send(new Bienvenidodocente);

    } // cierre del else

return redirect("/inscripcionDocentes")
->with([
"estado" => $req["nombre"] ." ". $req["apellido"],
"correo" => $req["email_docente"],
"escuela" => Escuela::find($req["id_escuela"])->nombre
])
;

} // cierre de la función


}
