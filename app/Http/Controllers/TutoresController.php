<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tutor;
use App\Grupo;
use App\Mail\Bienvenidotutor;
use App\Rules\LetrasYEspacios;

class TutoresController extends Controller
{

  public function consulta(Request $req) {
$todoslostutores = Tutor::all();
    if (isset($req["busqueda_tutor"])) {
        $resultados_tutor = Tutor::where("ID", "=", $req["busqueda_tutor"])->first();
    } else {
        $resultados_tutor = null;
    }
    return view("consultaTutores", compact("resultados_tutor", "todoslostutores"));
  }

  public function seleccionarTutor() {
  $todoslostutores = Tutor::all()->sortBy("Apellido");
  $todoslosgrupos = Grupo::all()->sortBy("nombre");
    return view("asignacionTutorAGrupos", compact("todoslosgrupos", "todoslostutores"));
  }

  public function crearGrupo_y_AsignarleTutor(Request $req) {

$tutorAsignado = Tutor::where("ID", "=", $req["ID_del_tutor_seleccionado"])->first();

$nuevoGrupo_Tutor = new Grupo();
$nuevoGrupo_Tutor["nombre"] = $req["cat_tematica_selec"].$req["nro_de_equipo"];
$nuevoGrupo_Tutor["ID_tutor"] = $tutorAsignado["ID"];

// Validación
$this->validate($req, [
  "nombre_del_equipo" => "required|unique:grupos,nombre",
  "nro_de_equipo" => "required|max:19"

]);
// fin de validación

$nuevoGrupo_Tutor->save();

    return redirect("/asignacionTutorAGrupos")
    ->with ([
    "grupo_asignado" => $nuevoGrupo_Tutor["nombre"],
    "tutor_asignado" => $tutorAsignado["Nombre"]." ".$tutorAsignado["Apellido"],
    ])
    ;
  }

  public function seleccionarTutorAReasignar() {
$todoslostutores = Tutor::all()->sortBy("Apellido");
$todoslosgrupos = Grupo::all()->sortBy("nombre");
    return view("reasignacionTutorAGrupos", compact("todoslosgrupos", "todoslostutores"));
  }

  public function reasignarTutorAGrupo(Request $req) {

if (isset($req["ID_grupo_seleccionado"])) {
  $grupoAAsignar = Grupo::where("ID", "=", $req["ID_grupo_seleccionado"])->first();
} else {
  $grupoAAsignar = null;
}

$tutorReasignado = Tutor::where("ID", "=", $req["ID_tutor_seleccionado"])->first();

$grupoAAsignar["ID_tutor"] = $req["ID_tutor_seleccionado"];

$grupoAAsignar->update();

    return redirect("/reasignacionTutorAGrupos")
    ->with ([
    "grupo_actualizado" => $grupoAAsignar["nombre"],
    "tutor_reasignado" => $tutorReasignado["Nombre"]." ".$tutorReasignado["Apellido"],
    ])
    ;
  }

  public function listado(Request $req) {
$tutores = Tutor::orderBy('apellido')->paginate(100);
$todoslostutores = Tutor::all();
    return view("listadoTutores", compact("todoslostutores", "tutores"));
  }

  public function listadoParaEditarTutores(Request $req) {
$tutores = Tutor::orderBy('Apellido')->paginate(100);
$todoslostutores = Tutor::all();
    return view("indiceTutores", compact("todoslostutores", "tutores"));
  }

  public function listadoParaBorrar(Request $req) {
$tutores = Tutor::orderBy('Apellido')->paginate(100);
$todoslostutores = Tutor::all();
    return view("listadoParaBorrarTutores", compact("todoslostutores", "tutores"));
  }

public function borrarTutor(Request $req) {
  if (isset($req["ID_tutor"])) {
      $tutorABorrar = Tutor::find($req["ID_tutor"]);
  } else {
      $tutorABorrar = null;
  }
  $nombreTutorABorrar = $tutorABorrar["Nombre"];
  $apellidoTutorABorrar = $tutorABorrar["Apellido"];
  $tutores = Tutor::orderBy('apellido')->paginate(100);
  $todoslostutores = Tutor::all();

  $tutorABorrar->delete();

  return redirect("/listadoParaBorrarTutores")
  ->with ([
    "estado" => $nombreTutorABorrar." ".$apellidoTutorABorrar,
  ]);
}

public function borrarTutorEditado(Request $req) {
  if (isset($req["ID_tutor"])) {
      $tutorABorrar = Tutor::find($req["ID_tutor"]);
  } else {
      $tutorABorrar = null;
  }

  $tutorABorrar->delete();

  return redirect('/indiceTutores')->with('exitoso', 'El tutor fue borrado existosamente');
  ;
}

public function editarTutor(Request $req)
    {
        // $tutor=Tutor::find($req["ID_tutor_a_editar"]);
        $tutor=Tutor::where('ID', "=", $req["ID_tutor_a_editar"])->first();
        return view('editarTutores',compact('tutor'));
    }

public function actualizarTutor(Request $req)
    {

if (isset($req["ID"])) {

        $this->validate($req,['Nombre'=>'required', 'Apellido'=>'required']);

        Tutor::find($req["ID"])->update($req->all());

        return redirect("/indiceTutores")
        ->with([
          "exitoso" => "Registro actualizado satisfactoriamente",
        ]);

}
      if (isset($req["ID_tutor_a_borrar"])) {
        $tutorABorrar = Tutor::find($req["ID_tutor_a_borrar"]);

        $tutorABorrar->delete();

          return redirect("/indiceTutores")
          ->with([
            "exitoso" => "Registro borrado satisfactoriamente",
          ]);
      }

    }

    public function actualizarTutorANDA(Request $req)
        {

      $this->validate($req,['Nombre'=>'required', 'Apellido'=>'required']);

      Tutor::find($req["ID"])->update($req->all());

      return redirect("/indiceTutores")
      ->with([
        "exitoso" => "Registro actualizado satisfactoriamente",
      ]);

        }

    public function borrarElTutor(Request $req)
        {
          $tutorABorrar = Tutor::find($req["ID_tutor"]);

          $tutorABorrar->delete();

            return redirect("/indiceTutores")
            ->with([
              "exitoso" => "Registro borrado satisfactoriamente",
            ]);

        }

  public function listadoD1(Request $req) {
  $todoslostutoresD1 = Tutor::where("pres_dia1", "=", 1)->orderBy('Apellido')->paginate(100);
    return view("listadoTutoresD1", compact("todoslostutoresD1"));
  }

  public function listadoD2(Request $req) {
  $todoslostutoresD2 = Tutor::where("pres_dia2", "=", 1)->orderBy('Apellido')->paginate(100);
    return view("listadoTutoresD2", compact("todoslostutoresD2"));
  }

  public function inscribir() {
    // $escuelas = Escuela::orderBy("nombre")->get();
    // $categorias = Categoria::orderBy("ID")->get();
    // $categorias = Categoria::where("ID_cat_tem2", "=", $req["cat_tem2"])->first();
    return view("inscripcionTutores");
  }

  public function registrar(Request $req) {
    $this->validate($req, [
      "nombre" => ['required',new LetrasYEspacios, 'max:20'],
      "apellido" => ['required',new LetrasYEspacios, 'max:20'],
      "dni_tutor" => "required|alpha_dash|max:20|unique:tutores,DNI",
      "fecha_nac_tutor" => "required|date|after:01-01-1900|before:30-09-2001",
      "email_tutor" => "required|email",
      "celular" => "required|integer|max:99999999999",
      "instit_rep"=> "required|string|max:45",
      "restric_alim" => "required"
    ]);

    $tutor = new Tutor();
    $tutor["Nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $tutor["Apellido"] = $req["apellido"];
    $tutor["DNI"] = $req["dni_tutor"];
    $tutor["fecha_nac"] = $req["fecha_nac_tutor"];
    $tutor["email"] = $req["email_tutor"];
    $tutor["restric_alim"] = $req["restric_alim"];
    $tutor["Celular"] = $req["celular"];
    $tutor["instit_rep"] = $req["instit_rep"];

    $tutor->save();

// Prueba para atrapar el error cuando el usuario no tiene conexión a Internet
try {
  \Mail::to($tutor)->send(new Bienvenidotutor);
} catch (\Exception $e) {
  $e = "No se pudo enviar el mail. Revise su conexión a Internet. Si aún así continúa el error, escríbanos a desafios.cientificos@gmail.com";
  return $e;
}
// fin de prueba para atrapar el error de no conexión a Internet

// Esto era cuando no atrapaba el error
// \Mail::to($tutor)->send(new Bienvenidotutor);
// fin de cuando no atrapaba el error

    return redirect("/inscripcionTutores")
    ->with([
    "estado" => $req["nombre"]." ".$req["apellido"],
    "correo" => $req["email_tutor"],
    ])

    ;

  }

  public function acreditarDia1(Request $req) {
    if (isset($req["busqueda_DNI_tutor"])) {
        $resultados_t = Tutor::where("DNI", $req["busqueda_DNI_tutor"])->get();
        // dd($resultados_t);
    } else {
        $resultados_t = [];
    }
    return view("acreditacionTutoresDia1", compact("resultados_t"));
  }

  public function confirmarDia1(Request $req) {
    if ($req["presente"] == "Acreditarse")
          $tutoresPres = Tutor::where("DNI", "=", $req["busqueda_DNI_tutor"])->first();
          $tutoresPres->pres_dia1 = 1;
          $tutoresPres->save();
          // dd($req["apellido"]);
    return redirect("/acreditacionTutoresDia1")
    ->with([
      "estado" => $tutoresPres["Nombre"]." ".$tutoresPres["Apellido"],
    ])
    ;

  }

  public function acreditarDia2(Request $req) {
    if (isset($req["busqueda_DNI_tutor"])) {
        $resultados_t = Tutor::where("DNI", $req["busqueda_DNI_tutor"])->get();
        // dd($resultados_t);
    } else {
        $resultados_t = [];
    }
    return view("acreditacionTutoresDia2", compact("resultados_t"));
  }

  public function confirmarDia2(Request $req) {
    if ($req["presente"] == "Acreditarse")
          $tutoresPres = Tutor::where("DNI", "=", $req["busqueda_DNI_tutor"])->first();
          $tutoresPres->pres_dia2 = 1;
          $tutoresPres->save();
          // dd($req["apellido"]);
    return redirect("/acreditacionTutoresDia2")
    ->with([
      "estado" => $tutoresPres["Nombre"]." ".$tutoresPres["Apellido"],
    ])
    ;

  }

}
