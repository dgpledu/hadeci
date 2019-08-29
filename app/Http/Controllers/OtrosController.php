<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Otro;
use App\Mail\Bienvenidomentor;
use App\Mail\Bienvenidodisertante;
use App\Mail\Bienvenidojurado;
use App\Mail\Bienvenidoorganizador;
use App\Mail\Bienvenidoautoridad;
use App\Mail\Bienvenidocolaborador;
use App\Mail\Bienvenidoinvitado;
use App\Mail\Bienvenidoproveedor;
use App\Rules\LetrasYEspacios;

class OtrosController extends Controller
{

  public function inscribirMentores() {
    return view("inscripcionMentores");
  }
  public function inscribirJurados() {
    return view("inscripcionJurados");
  }
  public function inscribirDisertantes() {
    return view("inscripcionDisertantes");
  }
  public function inscribirOrganizadores() {
    return view("inscripcionOrganizadores");
  }
  public function inscribirAutoridades() {
    return view("inscripcionAutoridades");
  }
  public function inscribirColaboradores() {
    return view("inscripcionColaboradores");
  }
  public function inscribirInvitados() {
    return view("inscripcionInvitados");
  }
  public function inscribirProveedores() {
    return view("inscripcionProveedores");
  }

  public function registrarMentores(Request $req) {
    $this->validate($req, [
      "nombre" => ['required',new LetrasYEspacios, 'max:20'],
      "apellido" => ['required',new LetrasYEspacios, 'max:20'],
      "cuilcuit" => "required|integer|max:999999999999|min:10000000",
      "email" => "required|email",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "celular" => "required|integer|max:99999999999",
      "instit_rep" => "required|string|max:45",
      "breveCV" => "required|string|max:255",
      "area_expertise1" => "required|string|max:40",
      "area_expertise2" => "required|string|max:40",
      "exp_robotica" => "required|string|max:2",
      "exp_program" => "required|string|max:2",
      "foto_mentor" => "required|image|max:5000",
      "disp_horariaD1" => "required|string|max:45",
      "disp_horariaD2" => "required|string|max:45"

    ]);

    $otro = new Otro();
    $otro["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $otro["apellido"] = $req["apellido"];
    $otro["cuilcuit"] = $req["cuilcuit"];
    $otro["fecha_nac"] = $req["fecha_nac"];
    $otro["email"] = $req["email"];
    $otro["celular"] = $req["celular"];
    $otro["contacto"] = $req["contacto"];
    $otro["instit_rep"] = $req["instit_rep"];
    $otro["CV"] = $req["breveCV"];
    $otro["area_expertise1"] = $req["area_expertise1"];
    $otro["area_expertise2"] = $req["area_expertise2"];
    $otro["exp_robotica"] = $req["exp_robotica"];
    $otro["exp_program"] = $req["exp_program"];
// esto lo agregué después de ver el video de validación de Darío y funciona perfecto!!
    $ruta = $req["foto_mentor"]->store("public");
    $nombreArchivo = basename($ruta);
$otro["nom_foto"] = $nombreArchivo;
$otro["dir_foto"] = $ruta;
// fin de lo agregado después de ver el video
$otro["disp_horariaD1"] = $req["disp_horariaD1"];
$otro["disp_horariaD2"] = $req["disp_horariaD2"];

    $otro["rol"] = "Mentor";

    $otro->save();

    try {
      \Mail::to($otro)->send(new Bienvenidomentor);
    } catch (\Exception $e) {
      $e = "No se pudo enviar el mail. Revise su conexión a Internet. Si aún así continúa el error, escríbanos a desafios.cientificos@bue.edu.ar";
      return $e;
    }

    return redirect("/inscripcionMentores")
    ->with([
    "estado" => $req["nombre"] ." ". $req["apellido"],
    "correo" => $req["email"],
    ])
    ;
  }
  //Seguidilla
  public function registrarOrganizadores(Request $req) {
    $this->validate($req, [
      "nombre" => ['required',new LetrasYEspacios, 'max:20'],
      "apellido" => ['required',new LetrasYEspacios, 'max:20'],
      "cuilcuit" => "required|integer|max:999999999999|min:10000000",
      "email" => "required|email",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "celular" => "required|integer|max:99999999999"
      // "foto_organizador" => "required|image|max:5000"

    ]);

    $otro = new Otro();
    $otro["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $otro["apellido"] = $req["apellido"];
    $otro["cuilcuit"] = $req["cuilcuit"];
    $otro["fecha_nac"] = $req["fecha_nac"];
    $otro["email"] = $req["email"];
    $otro["celular"] = $req["celular"];
// esto lo agregué después de ver el video de validación de Darío y funciona perfecto!!
//     $ruta = $req["foto_organizador"]->store("public");
//     $nombreArchivo = basename($ruta);
// $otro["nom_foto"] = $nombreArchivo;
// $otro["dir_foto"] = $ruta;
// fin de lo agregado después de ver el video

    $otro["rol"] = "Organizador";

    $otro->save();

    try {
      \Mail::to($otro)->send(new Bienvenidoorganizador);
    } catch (\Exception $e) {
      $e = "No se pudo enviar el mail. Revise su conexión a Internet. Si aún así continúa el error, escríbanos a desafios.cientificos@bue.edu.ar";
      return $e;
    }

    return redirect("/inscripcionOrganizadores")
    ->with([
    "estado" => $req["nombre"] ." ". $req["apellido"],
    "correo" => $req["email"],
    ])
    ;
  }

  public function registrarAutoridades(Request $req) {
    $this->validate($req, [
      "nombre" => ['required',new LetrasYEspacios, 'max:20'],
      "apellido" => ['required',new LetrasYEspacios, 'max:20'],
      "cuilcuit" => "sometimes|nullable|integer|max:999999999999|min:10000000",
      "email" => "sometimes|nullable||email",
      "fecha_nac" => "sometimes|nullable|date|after:01-01-1900|before:30-09-2001",
      "celular" => "sometimes|nullable|integer|max:99999999999",
      "instit_rep" => "sometimes|nullable|string|max:45",
      "breveCV" => "sometimes|nullable|string|max:255"
      // "foto_autoridad" => "required|image|max:5000"

    ]);

    $otro = new Otro();
    $otro["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $otro["apellido"] = $req["apellido"];
    $otro["cuilcuit"] = $req["cuilcuit"];
    $otro["email"] = $req["email"];
    $otro["fecha_nac"] = $req["fecha_nac"];
    $otro["celular"] = $req["celular"];
    $otro["instit_rep"] = $req["instit_rep"];
    $otro["CV"] = $req["breveCV"];
// esto lo agregué después de ver el video de validación de Darío y funciona perfecto!!
//     $ruta = $req["foto_autoridad"]->store("public");
//     $nombreArchivo = basename($ruta);
// $otro["nom_foto"] = $nombreArchivo;
// $otro["dir_foto"] = $ruta;
// fin de lo agregado después de ver el video

    $otro["rol"] = "Autoridad";

    $otro->save();

    // try {
    //   \Mail::to($otro)->send(new Bienvenidoautoridad);
    // } catch (\Exception $e) {
    //   $e = "No se pudo enviar el mail. Revise su conexión a Internet. Si aún así continúa el error, escríbanos a desafios.cientificos@bue.edu.ar";
    //   return $e;
    // }

    return redirect("/inscripcionAutoridades")
    ->with([
    "estado" => $req["nombre"] ." ". $req["apellido"],
    // "correo" => $req["email"],
    ])
    ;
  }

  public function registrarColaboradores(Request $req) {
    $this->validate($req, [
      "nombre" => ['required',new LetrasYEspacios, 'max:20'],
      "apellido" => ['required',new LetrasYEspacios, 'max:20'],
      "cuilcuit" => "required|integer|max:999999999999|min:10000000",
      "email" => "required|email",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "celular" => "sometimes|nullable|integer|max:99999999999",
      "contacto" => "required|string|max:45"

    ]);

    $otro = new Otro();
    $otro["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $otro["apellido"] = $req["apellido"];
    $otro["cuilcuit"] = $req["cuilcuit"];
    $otro["email"] = $req["email"];
    $otro["fecha_nac"] = $req["fecha_nac"];
    $otro["celular"] = $req["celular"];
    $otro["contacto"] = $req["contacto"];

    $otro["rol"] = "Colaborador";

    $otro->save();

    try {
      \Mail::to($otro)->send(new Bienvenidocolaborador);
    } catch (\Exception $e) {
      $e = "No se pudo enviar el mail. Revise su conexión a Internet. Si aún así continúa el error, escríbanos a desafios.cientificos@bue.edu.ar";
      return $e;
    }

    return redirect("/inscripcionColaboradores")
    ->with([
    "estado" => $req["nombre"] ." ". $req["apellido"],
    "correo" => $req["email"],
    ])
    ;
  }

  public function registrarInvitados(Request $req) {
    $this->validate($req, [
      "nombre" => ['required',new LetrasYEspacios, 'max:20'],
      "apellido" => ['required',new LetrasYEspacios, 'max:20'],
      "cuilcuit" => "required|integer|max:999999999999|min:10000000",
      "email" => "required|email",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "celular" => "sometimes|nullable|integer|max:99999999999",
      "instit_rep" => "required|string|max:45",
      "contacto" => "required|string|max:45"
    ]);

    $otro = new Otro();
    $otro["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $otro["apellido"] = $req["apellido"];
    $otro["cuilcuit"] = $req["cuilcuit"];
    $otro["fecha_nac"] = $req["fecha_nac"];
    $otro["email"] = $req["email"];
    $otro["celular"] = $req["celular"];
    $otro["instit_rep"] = $req["instit_rep"];
    $otro["contacto"] = $req["contacto"];

    $otro["rol"] = "Invitado";

    $otro->save();

    try {
      \Mail::to($otro)->send(new Bienvenidoinvitado);
    } catch (\Exception $e) {
      $e = "No se pudo enviar el mail. Revise su conexión a Internet. Si aún así continúa el error, escríbanos a desafios.cientificos@bue.edu.ar";
      return $e;
    }

    return redirect("/inscripcionInvitados")
    ->with([
    "estado" => $req["nombre"] ." ". $req["apellido"],
    "correo" => $req["email"],
    ])
    ;
  }

  public function registrarProveedores(Request $req) {
    $this->validate($req, [
      "nombre" => ['required',new LetrasYEspacios, 'max:20'],
      "apellido" => ['required',new LetrasYEspacios, 'max:20'],
      "cuilcuit" => "required|integer|max:999999999999|min:10000000",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "email" => "required|email",
      "celular" => "required|integer|max:99999999999",
      "instit_rep" => "required|string|max:45"
    ]);

    $otro = new Otro();
    $otro["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $otro["apellido"] = $req["apellido"];
    $otro["cuilcuit"] = $req["cuilcuit"];
    $otro["fecha_nac"] = $req["fecha_nac"];
    $otro["email"] = $req["email"];
    $otro["celular"] = $req["celular"];
    $otro["instit_rep"] = $req["instit_rep"];

    $otro["rol"] = "Proveedor";

    $otro->save();

    try {
      \Mail::to($otro)->send(new Bienvenidoproveedor);
    } catch (\Exception $e) {
      $e = "No se pudo enviar el mail. Revise su conexión a Internet. Si aún así continúa el error, escríbanos a desafios.cientificos@bue.edu.ar";
      return $e;
    }

    return redirect("/inscripcionProveedores")
    ->with([
    "estado" => $req["nombre"] ." ". $req["apellido"],
    "correo" => $req["email"],
    ])
    ;
  }
  // Termina seguidilla

  public function registrarJurados(Request $req) {
    $this->validate($req, [
      "nombre" => ['required',new LetrasYEspacios, 'max:20'],
      "apellido" => ['required',new LetrasYEspacios, 'max:20'],
      "cuilcuit" => "required|integer|max:999999999999|min:10000000",
      "email" => "required|email",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "celular" => "required|integer|max:99999999999",
      "breveCV" => "required|string|max:255",
      "foto_jurado" => "required|image|max:5000"

    ]);

    $otro = new Otro();
    $otro["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $otro["apellido"] = $req["apellido"];
    $otro["cuilcuit"] = $req["cuilcuit"];
    $otro["fecha_nac"] = $req["fecha_nac"];
    $otro["email"] = $req["email"];
    $otro["celular"] = $req["celular"];
    $otro["contacto"] = $req["contacto"];
    $otro["instit_rep"] = $req["instit_rep"];
    $otro["CV"] = $req["breveCV"];
// esto lo agregué después de ver el video de validación de Darío y funciona perfecto!!
    $ruta = $req["foto_jurado"]->store("public");
    $nombreArchivo = basename($ruta);
$otro["nom_foto"] = $nombreArchivo;
$otro["dir_foto"] = $ruta;
// fin de lo agregado después de ver el video

    $otro["rol"] = "Jurado";

    $otro->save();

    try {
      \Mail::to($otro)->send(new Bienvenidojurado);
    } catch (\Exception $e) {
      $e = "No se pudo enviar el mail. Revise su conexión a Internet. Si aún así continúa el error, escríbanos a desafios.cientificos@bue.edu.ar";
      return $e;
    }

    return redirect("/inscripcionJurados")
    ->with([
    "estado" => $req["nombre"] ." ". $req["apellido"],
    "correo" => $req["email"],
    ])
    ;
  }

  public function acreditarOtroDia1(Request $req) {
    if (isset($req["busqueda_cuilcuit_otro"])) {
        $resultados_o = Otro::where("cuilcuit", $req["busqueda_cuilcuit_otro"])
        ->where("pres_dia1", "=", 0)
        ->where("rol", "=", $req["rol"])->get();
        // dd($resultados_o);
    } else {
        $resultados_o = [];
    }
    return view("acreditacionOtrosDia1", compact("resultados_o"));
  }

  public function confirmarOtroDia1(Request $req) {
    if ($req["presente"] == "Acreditarse")
          $otrosPres = Otro::where("cuilcuit", "=", $req["busqueda_cuilcuit_otro"])
          ->where("rol", "=", $req["rol"])->first();
          $otrosPres->pres_dia1 = 1;
          $otrosPres->save();
          // dd($req["apellido"]);
    return redirect("/acreditacionOtrosDia1")
    ->with([
      "estado" => $otrosPres["nombre"]." ".$otrosPres["apellido"],
      "rol" => $otrosPres["rol"],
    ])
    ;

  }

  public function acreditarOtroDia2(Request $req) {
    if (isset($req["busqueda_cuilcuit_otro"])) {
        $resultados_o = Otro::where("cuilcuit", $req["busqueda_cuilcuit_otro"])
        ->where("pres_dia2", "=", 0)
        ->where("rol", "=", $req["rol"])->get();
        // dd($resultados_o);
    } else {
        $resultados_o = [];
    }
    return view("acreditacionOtrosDia2", compact("resultados_o"));
  }

  public function confirmarOtroDia2(Request $req) {
    if ($req["presente"] == "Acreditarse")
          $otrosPres = Otro::where("cuilcuit", "=", $req["busqueda_cuilcuit_otro"])
          ->where("rol", "=", $req["rol"])->first();
          $otrosPres->pres_dia2 = 1;
          $otrosPres->save();
          // dd($req["apellido"]);
    return redirect("/acreditacionOtrosDia2")
    ->with([
      "estado" => $otrosPres["nombre"]." ".$otrosPres["apellido"],
      "rol" => $otrosPres["rol"],
    ])
    ;

  }

  // Check-out mentores

  public function acreditarCheckOutDia1(Request $req) {
    if (isset($req["busqueda_cuilcuit_otro"])) {
        $resultados_o = Otro::where("cuilcuit", $req["busqueda_cuilcuit_otro"])
        ->where("pres_dia1", "=", 1)
        ->where("rol", "=", 'Mentor')->get();
        // dd($resultados_o);
    } else {
        $resultados_o = [];
    }
    return view("checkoutMentoresDia1", compact("resultados_o"));
  }

  public function confirmarCheckOutDia1(Request $req) {
    if ($req["presente"] == "checkout")
          $otrosPres = Otro::where("cuilcuit", "=", $req["busqueda_cuilcuit_otro"])
          ->where("rol", "=", 'Mentor')->first();
          $otrosPres->pres_dia1 = 0;
          $otrosPres->save();
          // dd($req["apellido"]);
    return redirect("/checkoutMentoresDia1")
    ->with([
      "estado" => $otrosPres["nombre"]." ".$otrosPres["apellido"],
      // "rol" => $otrosPres["rol"],
    ])
    ;

  }

  public function acreditarCheckOutDia2(Request $req) {
    if (isset($req["busqueda_cuilcuit_otro"])) {
        $resultados_o = Otro::where("cuilcuit", $req["busqueda_cuilcuit_otro"])
        ->where("pres_dia2", "=", 1)
        ->where("rol", "=", 'Mentor')->get();
        // dd($resultados_o);
    } else {
        $resultados_o = [];
    }
    return view("checkoutMentoresDia2", compact("resultados_o"));
  }

  public function confirmarCheckOutDia2(Request $req) {
    if ($req["presente"] == "checkout")
          $otrosPres = Otro::where("cuilcuit", "=", $req["busqueda_cuilcuit_otro"])
          ->where("rol", "=", 'Mentor')->first();
          $otrosPres->pres_dia2 = 0;
          $otrosPres->save();
          // dd($req["apellido"]);
    return redirect("/checkoutMentoresDia2")
    ->with([
      "estado" => $otrosPres["nombre"]." ".$otrosPres["apellido"],
      // "rol" => $otrosPres["rol"],
    ])
    ;

  }

  // fin de checkout

  public function registrarDisertantes(Request $req) {
    $this->validate($req, [
      "nombre" => ['required',new LetrasYEspacios, 'max:20'],
      "apellido" => ['required',new LetrasYEspacios, 'max:20'],
      "cuilcuit" => "required|integer|max:999999999999|min:10000000",
      "email" => "required|email",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "celular" => "required|integer|max:99999999999",
      "titulo_charla" => "required|string|max:45",
      "descrip_charla" => "required|string|max:255",
      "instit_rep" => "required|string|max:50",
      "breveCV" => "required|string|max:255",
      "foto_disertante" => "required|image|max:5000"

    ]);

    $otro = new Otro();
    $otro["nombre"] = $req["nombre"]; //Del lado izquierdo va el nombre de la columna de base de datos, del lado derecho el nombre del campo en el Formulario
    $otro["apellido"] = $req["apellido"];
    $otro["cuilcuit"] = $req["cuilcuit"];
    $otro["fecha_nac"] = $req["fecha_nac"];
    $otro["email"] = $req["email"];
    $otro["celular"] = $req["celular"];
    $otro["titulo_charla"] = $req["titulo_charla"];
    $otro["instit_rep"] = $req["instit_rep"];
    $otro["descrip_charla"] = $req["descrip_charla"];
    $otro["CV"] = $req["breveCV"];
// esto lo agregué después de ver el video de validación de Darío y funciona perfecto!!
    $ruta = $req["foto_disertante"]->store("public");
    $nombreArchivo = basename($ruta);
$otro["nom_foto"] = $nombreArchivo;
$otro["dir_foto"] = $ruta;
// fin de lo agregado después de ver el video

    $otro["rol"] = "Disertante";

    $otro->save();

    try {
      \Mail::to($otro)->send(new Bienvenidodisertante);
    } catch (\Exception $e) {
      $e = "No se pudo enviar el mail. Revise su conexión a Internet. Si aún así continúa el error, escríbanos a desafios.cientificos@bue.edu.ar";
      return $e;
    }

    return redirect("/inscripcionDisertantes")
    ->with([
    "estado" => $req["nombre"] ." ". $req["apellido"],
    "correo" => $req["email"],
    ])


    ;

  }

  public function listadoMentores(Request $req) {
$otros = Otro::orderBy('apellido')->where('rol', 'Mentor')->paginate(100);
$todoslosmentores = Otro::all();
    return view("listadoMentores", compact("todoslosmentores", "otros"));
  }

  public function listadoMentoresPresentesD1(Request $req) {
$todoslosmentorespresentesD1 = Otro::where('rol', 'Mentor')
->where('pres_dia1', 1)->get();
$otros = Otro::all();
$todoslosmentorespresentesD1json = json_encode($todoslosmentorespresentesD1);
    return view("mentoresPresentesD1", compact("todoslosmentorespresentesD1", "otros", "todoslosmentorespresentesD1json"));
  }

  public function listadoMentoresPresentesD2(Request $req) {
$todoslosmentorespresentesD2 = Otro::where('rol', 'Mentor')
->where('pres_dia2', 1)->get();
$otros = Otro::all();
    return view("mentoresPresentesD2", compact("todoslosmentorespresentesD2", "otros"));
  }

  public function listadoDisertantes(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Disertante')->paginate(100);
  $todoslosdisertantes = Otro::all();
    return view("listadoDisertantes", compact("todoslosdisertantes", "otros"));
  }

  public function listadoJurados(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Jurado')->paginate(100);
  $todoslosjurados = Otro::all();
    return view("listadoJurados", compact("todoslosjurados", "otros"));
  }

  public function listadoOrganizadores(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Organizador')->paginate(100);
  $todoslosorganizadores = Otro::all();
    return view("listadoOrganizadores", compact("todoslosorganizadores", "otros"));
  }

  public function listadoAutoridades(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Autoridad')->paginate(100);
  $todaslasautoridades = Otro::all();
    return view("listadoAutoridades", compact("todaslasautoridades", "otros"));
  }

  public function listadoColaboradores(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Colaborador')->paginate(100);
  $todosloscolaboradores = Otro::all();
    return view("listadoColaboradores", compact("todosloscolaboradores", "otros"));
  }

  public function listadoInvitados(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Invitado')->paginate(100);
  $todoslosinvitados = Otro::all();
    return view("listadoInvitados", compact("todoslosinvitados", "otros"));
  }

  public function listadoProveedores(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Proveedor')->paginate(100);
  $todoslosproveedores = Otro::all();
    return view("listadoProveedores", compact("todoslosproveedores", "otros"));
  }

}
