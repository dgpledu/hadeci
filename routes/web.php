<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get("cambiarAbaseActual", function() {
  $_SESSION["db"] = "hadeci";

  return back();
});

Route::get("cambiarAbase2018", function() {
  $_SESSION["db"] = "hadeci2018";

  return back();
});


Route::get('/consultas', function () {
    return view('consultas');
})->middleware("auth");

Route::get('/inscripcion', function () {
    return view('inscripcion');
});

Route::get('/mentoresD1', function () {
    return view('mentoresPresentesD1');
});

Route::get('/mentoresD2', function () {
    return view('mentoresPresentesD2');
});

// Prueba a ver si se necesita también

Route::get('/acreditacion', function () {
    return view('acreditacion');
});
// fin de prueba

// probando locuras
Route::get('/acreditacionxmenu', function () {
    return view('acreditacion-con-menu-PRUEBA');
});
// fin de prueba de locuras

Route::get("/consultaEstablecimientos", "EscuelasParticipantesController@listadotodas");
Route::get("/acreditarEstudiantes", "EstudiantesController@acreditacion");
Route::post("/estudiantesAcreditados", "EstudiantesController@acreditados");

Route::get("/mentoresD1", "OtrosController@listadoMentoresPresentesD1");
Route::get("/mentoresD2", "OtrosController@listadoMentoresPresentesD2");

Route::get("/acreditarEstudiantesDia1", "EstudiantesController@acreditacionDia1")->middleware("auth");
Route::post("/estudiantesAcreditadosDia1", "EstudiantesController@acreditadosDia1")->middleware("auth");
Route::get("/acreditarEstudiantesDia2", "EstudiantesController@acreditacionDia2")->middleware("auth");
Route::post("/estudiantesAcreditadosDia2", "EstudiantesController@acreditadosDia2")->middleware("auth");
// Acreditar docentes y tutores
Route::get("/acreditacionDocentesDia1", "DocentesController@acreditarDia1")->middleware("auth");
Route::post("/acreditacionDocentesDia1", "DocentesController@confirmarDia1")->middleware("auth");
Route::get("/acreditacionDocentesDia2", "DocentesController@acreditarDia2")->middleware("auth");
Route::post("/acreditacionDocentesDia2", "DocentesController@confirmarDia2")->middleware("auth");
Route::get("/acreditacionTutoresDia1", "TutoresController@acreditarDia1")->middleware("auth");
Route::post("/acreditacionTutoresDia1", "TutoresController@confirmarDia1")->middleware("auth");
Route::get("/acreditacionTutoresDia2", "TutoresController@acreditarDia2")->middleware("auth");
Route::post("/acreditacionTutoresDia2", "TutoresController@confirmarDia2")->middleware("auth");
// fin acreditar docentes y tutores

// Acreditar OTROS (jurados, organizadores, colaboradores, etc.)
Route::get("/acreditacionOtrosDia1", "OtrosController@acreditarOtroDia1")->middleware("auth");
Route::post("/acreditacionOtrosDia1", "OtrosController@confirmarOtroDia1")->middleware("auth");
Route::get("/acreditacionOtrosDia2", "OtrosController@acreditarOtroDia2")->middleware("auth");
Route::post("/acreditacionOtrosDia2", "OtrosController@confirmarOtroDia2")->middleware("auth");
// fin de acreditar OTROS

// Opción agregar escuelas
Route::get("/agregarescuelas", "EscuelasParticipantesController@cargarEscuela")->middleware("auth");
Route::post("/agregarescuelas", "EscuelasParticipantesController@agregarEscuela")->middleware("auth");
// fin de agregar escuelas

// Check-out de mentores
Route::get("/checkoutMentoresDia1", "OtrosController@acreditarCheckOutDia1")->middleware("auth");
Route::post("/checkoutMentoresDia1", "OtrosController@confirmarCheckOutDia1")->middleware("auth");
Route::get("/checkoutMentoresDia2", "OtrosController@acreditarCheckOutDia2")->middleware("auth");
Route::post("/checkoutMentoresDia2", "OtrosController@confirmarCheckOutDia2")->middleware("auth");
// fin de check-out de mentores

// Route::get("/acreditarDocentesDia1", "DocentesController@porDNI");// probando ANDA como listado...
Route::post("/estudiantesDocentesDia1", "DocentesController@acreditadosDia1");
// fin otra prueba acreditar docentes


Route::get("/consultaEscuelasParticipantes", "EscuelasParticipantesController@consultaactivas")->middleware("auth");
Route::get("/consultaTutores", "TutoresController@consulta")->middleware("auth");
Route::get("/listadoTutores", "TutoresController@listado")->middleware("auth");
Route::get("/listadoTutoresD1", "TutoresController@listadoD1")->middleware("auth");
Route::get("/listadoTutoresD2", "TutoresController@listadoD2")->middleware("auth");
Route::get("/listadoDocentes", "DocentesController@listado")->middleware("auth");
Route::get("/listadoDocentesD1", "DocentesController@listadoD1")->middleware("auth");
Route::get("/listadoDocentesD2", "DocentesController@listadoD2")->middleware("auth");
Route::get("/listadoDocentesD1D2", "DocentesController@listadoD1D2")->middleware("auth");
Route::get("/listadoDocentesTotales", "DocentesController@listadoDocentesTotales")->middleware("auth");
Route::get("/listadoMentores", "OtrosController@listadoMentores")->middleware("auth");
Route::get("/listadoJurados", "OtrosController@listadoJurados")->middleware("auth");
Route::get("/listadoDisertantes", "OtrosController@listadoDisertantes")->middleware("auth");
Route::get("/listadoOrganizadores", "OtrosController@listadoOrganizadores")->middleware("auth");
Route::get("/listadoAutoridades", "OtrosController@listadoAutoridades")->middleware("auth");
Route::get("/listadoColaboradores", "OtrosController@listadoColaboradores")->middleware("auth");
Route::get("/listadoInvitados", "OtrosController@listadoInvitados")->middleware("auth");
Route::get("/listadoProveedores", "OtrosController@listadoProveedores")->middleware("auth");
Route::get("/listadoEscuelasInscriptas", "EscuelasParticipantesController@listadoInscriptas")->middleware("auth");
Route::get("/listadoEscuelasParticipantes", "EscuelasParticipantesController@listadoParticipantes")->middleware("auth");
Route::get("/estudiantesPorDocente", "EstudiantesController@PorDocente")->middleware("auth");
// Consulta para docentes sin necesidad de loguearse
Route::get("/estudiantesPorDocenteNL", "EstudiantesController@PorDocenteNL");
// fin de consulta para docentes
Route::get("/listadoEstudiantes", "EstudiantesController@listado")->middleware("auth");
Route::get("/listadoEstudiantesPresentesDia1", "EstudiantesController@listadoEstudiantesPresentesDia1")->middleware("auth");
Route::get("/listadoEstudiantesPresentesDia2", "EstudiantesController@listadoEstudiantesPresentesDia2")->middleware("auth");
Route::get("/estudiantesPorEscuela", "EstudiantesController@PorEscuelaActiva")->middleware("auth");
Route::get("/estudiantesPorGrupo", "EstudiantesController@PorGrupo")->middleware("auth");
// agregado a ver si funciona
Route::get("/estudiantesPorApellido", "EstudiantesController@PorApellido")->middleware("auth");
// Route::get("/estudiantesPorApellido", "EstudiantesController@PorApellido");
// Route::get("/inscripcionPropuestas", "PropuestasController@PorGrupo")->middleware("auth");
// fin de agregado
Route::get("/consultaPorDesafio", "DesafiosController@consulta")->middleware("auth");

Route::get("/asignarDesafioATutores", "DesafiosController@consultaDeTutores");

Route::get("/consultaPorDesafioTipeandoCodigo", "DesafiosController@consultaTipeandoCodigo");

// Deshabilitación transitoria por falta de cupo
Route::get("/inscripcionEstudiantes", "EstudiantesController@inscribir");
Route::post("/inscripcionEstudiantes", "EstudiantesController@registrar");
// Fin de deshabilitación transitoria por falta de cupo

// People's choice
Route::get("/inscripcionPropuestas", "PropuestasController@inscribirPropuestas");
Route::post("/inscripcionPropuestas", "PropuestasController@registrarPropuestas");

Route::get("/votacionPeoplesChoice", "PropuestasController@votarPropuestas");
// fin de People's choice
Route::get("/cargarDesafios", "DesafiosController@cargar");
Route::post("/cargarDesafios", "DesafiosController@guardar");

// Deshabilitación transitoria por falta de cupo
Route::get("/preinscripcionEstudiantes", "EstudiantesController@preinscribir");
Route::post("/preinscripcionEstudiantes", "EstudiantesController@preregistrar");
// fin de deshabilitación transitoria por falta de cupo

Route::get("/inscripcionTutores", "TutoresController@inscribir");
Route::post("/inscripcionTutores", "TutoresController@registrar");
Route::get("/inscripcionMentores", "OtrosController@inscribirMentores");
Route::post("/inscripcionMentores", "OtrosController@registrarMentores");
Route::get("/inscripcionJurados", "OtrosController@inscribirJurados");
Route::post("/inscripcionJurados", "OtrosController@registrarJurados");
Route::get("/inscripcionDisertantes", "OtrosController@inscribirDisertantes");
Route::post("/inscripcionDisertantes", "OtrosController@registrarDisertantes");
Route::get("/inscripcionOrganizadores", "OtrosController@inscribirOrganizadores");
Route::post("/inscripcionOrganizadores", "OtrosController@registrarOrganizadores");
Route::get("/inscripcionAutoridades", "OtrosController@inscribirAutoridades");
Route::post("/inscripcionAutoridades", "OtrosController@registrarAutoridades");
Route::get("/inscripcionColaboradores", "OtrosController@inscribirColaboradores");
Route::post("/inscripcionColaboradores", "OtrosController@registrarColaboradores");
Route::get("/inscripcionInvitados", "OtrosController@inscribirInvitados");
Route::post("/inscripcionInvitados", "OtrosController@registrarInvitados");
Route::get("/inscripcionProveedores", "OtrosController@inscribirProveedores");
Route::post("/inscripcionProveedores", "OtrosController@registrarProveedores");
Route::post("/inscripcion", "OtrosController@registrar");
Route::get("/inscripcionDocentes", "DocentesController@inscribir");
Route::post("/inscripcionDocentes", "DocentesController@registrar");

// Esto lo agregué para el logout
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
// fin de lo que agregué para el logout

// Esta sección es para eliminar la parte de registración
Auth::routes(['register' => false]);
// Auth::routes();
// fin de sección para eliminar la parte de registración

Route::get('/home', 'HomeController@index')->name('home');

// Esto es para probar cosas
Route::get('/probarCosas', function () {
    return view('probarCosas');
});
// fin de probar cosas
