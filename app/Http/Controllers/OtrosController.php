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
      "nombre" => "required|string|max:255",
      "apellido" => "required|string|max:255",
      "cuilcuit" => "required|integer",
      "email" => "required|email",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "celular" => "required|string|max:22",
      "instit_rep" => "required|string|max:45",
      "breveCV" => "required|string|max:255",
      "area_expertise1" => "required|string|max:40",
      "area_expertise2" => "required|string|max:40|different:area_expertise1",
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
      "nombre" => "required|string|max:255",
      "apellido" => "required|string|max:255",
      "cuilcuit" => "required|integer",
      "email" => "required|email",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "celular" => "required|string|max:22"
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
      "nombre" => "required|string|max:255",
      "apellido" => "required|string|max:255",
      "cuilcuit" => "sometimes|nullable|integer",
      "email" => "sometimes|nullable||email",
      "fecha_nac" => "sometimes|nullable|date|after:01-01-1900|before:30-09-2001",
      "celular" => "sometimes|nullable|string|max:22",
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
      "nombre" => "required|string|max:255",
      "apellido" => "required|string|max:255",
      "cuilcuit" => "required|integer",
      "email" => "required|email",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "celular" => "sometimes|nullable|string|max:22",
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
      "nombre" => "required|string|max:255",
      "apellido" => "required|string|max:255",
      "cuilcuit" => "required|integer",
      "email" => "required|email",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "celular" => "sometimes|nullable|string|max:22",
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
      "nombre" => "required|string|max:255",
      "apellido" => "required|string|max:255",
      "cuilcuit" => "required|integer",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "email" => "required|email",
      "celular" => "required|string|max:22",
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
      "nombre" => "required|string|max:255",
      "apellido" => "required|string|max:255",
      "cuilcuit" => "required|integer",
      "email" => "required|email",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "celular" => "required|string|max:22",
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

  public function registrarDisertantes(Request $req) {
    $this->validate($req, [
      "nombre" => "required|string|max:255",
      "apellido" => "required|string|max:255",
      "cuilcuit" => "required|integer",
      "email" => "required|email",
      "fecha_nac" => "required|date|after:01-01-1900|before:30-09-2001",
      "celular" => "required|string|max:22",
      "titulo_charla" => "required|string|max:45",
      "descrip_charla" => "required|string|max:255",
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
$otros = Otro::orderBy('apellido')->where('rol', 'Mentor')->paginate(10);
$todoslosmentores = Otro::all();
    return view("listadoMentores", compact("todoslosmentores", "otros"));
  }

  public function listadoDisertantes(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Disertante')->paginate(10);
  $todoslosdisertantes = Otro::all();
    return view("listadoDisertantes", compact("todoslosdisertantes", "otros"));
  }

  public function listadoJurados(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Jurado')->paginate(10);
  $todoslosjurados = Otro::all();
    return view("listadoJurados", compact("todoslosjurados", "otros"));
  }

  public function listadoOrganizadores(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Organizador')->paginate(10);
  $todoslosorganizadores = Otro::all();
    return view("listadoOrganizadores", compact("todoslosorganizadores", "otros"));
  }

  public function listadoAutoridades(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Autoridad')->paginate(10);
  $todaslasautoridades = Otro::all();
    return view("listadoAutoridades", compact("todaslasautoridades", "otros"));
  }

  public function listadoColaboradores(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Colaborador')->paginate(10);
  $todosloscolaboradores = Otro::all();
    return view("listadoColaboradores", compact("todosloscolaboradores", "otros"));
  }

  public function listadoInvitados(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Invitado')->paginate(10);
  $todoslosinvitados = Otro::all();
    return view("listadoInvitados", compact("todoslosinvitados", "otros"));
  }

  public function listadoProveedores(Request $req) {
  $otros = Otro::orderBy('apellido')->where('rol', 'Proveedor')->paginate(10);
  $todoslosproveedores = Otro::all();
    return view("listadoProveedores", compact("todoslosproveedores", "otros"));
  }

}
