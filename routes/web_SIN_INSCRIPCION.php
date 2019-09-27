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

Route::get("cambiarAbase2019", function() {
  $_SESSION["db"] = "hadeci";

  return back();
});

Route::get("cambiarAbasePrueba", function() {
  $_SESSION["db"] = "hadeci_prueba";

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

// probando locuras
Route::get('/acreditacionxmenu', function () {
    return view('acreditacion-con-menu-PRUEBA');
});
// fin de prueba de locuras

Route::get("/consultaEstablecimientos", "EscuelasParticipantesController@listadotodas");
Route::get("/consultaEscuelasPorID", "EscuelasParticipantesController@consultaEscuelasPorID");
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

Route::get("/armadoDeGrupos", "EstudiantesController@armarGrupos")->middleware("auth");
Route::post("/armadoDeGrupos", "EstudiantesController@armarGrupos")->middleware("auth");

Route::get("/formadoDeGrupos", "EstudiantesController@formarGrupos")->middleware("auth");
Route::post("/formadoDeGrupos", "EstudiantesController@formarGrupos")->middleware("auth");

Route::get("/asignarDesafioATutores", "DesafiosController@consultaDeTutores")->middleware("auth");
Route::post("/asignarDesafioATutores", "DesafiosController@asignarDesafioATutor")->middleware("auth");

Route::get("/asignacionTutorAGrupos", "TutoresController@seleccionarTutor")->middleware("auth");
Route::post("/asignacionTutorAGrupos", "TutoresController@crearGrupo_y_AsignarleTutor")->middleware("auth");

Route::get("/reasignacionTutorAGrupos", "TutoresController@seleccionarTutorAReasignar")->middleware("auth");
Route::post("/reasignacionTutorAGrupos", "TutoresController@reasignarTutorAGrupo")->middleware("auth");

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

Route::get("/listadoParaBorrarTutores", "TutoresController@listadoParaBorrar")->middleware("auth");
Route::post("/listadoParaBorrarTutores", "TutoresController@borrarTutor")->middleware("auth");

// Con esto funciona bien la actualización de tutores
Route::get("/indiceTutores", "TutoresController@listadoParaEditarTutores")->middleware("auth");
Route::post("/indiceTutores", "TutoresController@actualizarTutor")->middleware("auth");
Route::post("/editarTutores", "TutoresController@editarTutor")->middleware("auth");
// fin

// Con esto funciona bien la actualización de docentes
Route::get("/indiceDocentes", "DocentesController@listadoParaEditarDocentes")->middleware("auth");
Route::post("/indiceDocentes", "DocentesController@actualizarDocente")->middleware("auth");
Route::post("/editarDocentes", "DocentesController@editarDocente")->middleware("auth");
// fin

Route::get("/listadoTutoresD1", "TutoresController@listadoD1")->middleware("auth");
Route::get("/listadoTutoresD2", "TutoresController@listadoD2")->middleware("auth");
Route::get("/listadoDocentes", "DocentesController@listado")->middleware("auth");
Route::get("/listadoDocentesPorEscuela", "EscuelasParticipantesController@listadoPorEscuela")->middleware("auth");
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
Route::get("/listadoEstudiantesCT1", "EstudiantesController@listadoCT1")->middleware("auth");
Route::get("/listadoEstudiantesCT2", "EstudiantesController@listadoCT2")->middleware("auth");
Route::get("/listadoEstudiantesPresentesDia1", "EstudiantesController@listadoEstudiantesPresentesDia1")->middleware("auth");
Route::get("/listadoEstudiantesPresentesDia2", "EstudiantesController@listadoEstudiantesPresentesDia2")->middleware("auth");
Route::get("/listadoEstudiantesPresentesD1D2", "EstudiantesController@listadoEstudiantesPresentesD1D2")->middleware("auth");
Route::get("/estudiantesPorEscuela", "EstudiantesController@PorEscuelaActiva")->middleware("auth");
Route::get("/estudiantesPorGrupo", "EstudiantesController@PorGrupo")->middleware("auth");
// agregado a ver si funciona
Route::get("/estudiantesPorApellido", "EstudiantesController@PorApellido")->middleware("auth");
// Route::get("/estudiantesPorApellido", "EstudiantesController@PorApellido");
// Route::get("/inscripcionPropuestas", "PropuestasController@PorGrupo")->middleware("auth");
// fin de agregado
Route::get("/consultaPorDesafio", "DesafiosController@consulta")->middleware("auth");

Route::get("/consultaPorDesafioTipeandoCodigo", "DesafiosController@consultaTipeandoCodigo");

// Deshabilitación por cupo cubierto
// Route::get("/inscripcionEstudiantes", "EstudiantesController@inscribir");
// Route::post("/inscripcionEstudiantes", "EstudiantesController@registrar");
// Fin de deshabilitación transitoria por cupo cubierto

Route::get("/cargarDesafios", "DesafiosController@cargar")->middleware("auth");
Route::post("/cargarDesafios", "DesafiosController@guardar")->middleware("auth");

// Deshabilitación por cupo cubierto
// Route::get("/preinscripcionEstudiantes", "EstudiantesController@preinscribir");
// Route::post("/preinscripcionEstudiantes", "EstudiantesController@preregistrar");
// fin de deshabilitación por cupo cubierto

// Route::get("/inscripcionTutores", "TutoresController@inscribir");
// Route::post("/inscripcionTutores", "TutoresController@registrar");
// Route::get("/inscripcionMentores", "OtrosController@inscribirMentores");
// Route::post("/inscripcionMentores", "OtrosController@registrarMentores");
// Route::get("/inscripcionJurados", "OtrosController@inscribirJurados");
// Route::post("/inscripcionJurados", "OtrosController@registrarJurados");
// Route::get("/inscripcionDisertantes", "OtrosController@inscribirDisertantes");
// Route::post("/inscripcionDisertantes", "OtrosController@registrarDisertantes");
// Route::get("/inscripcionOrganizadores", "OtrosController@inscribirOrganizadores");
// Route::post("/inscripcionOrganizadores", "OtrosController@registrarOrganizadores");

// Route::get("/inscripcionAutoridades", "OtrosController@inscribirAutoridades");
// Route::post("/inscripcionAutoridades", "OtrosController@registrarAutoridades");

// Route::get("/inscripcionColaboradores", "OtrosController@inscribirColaboradores");
// Route::post("/inscripcionColaboradores", "OtrosController@registrarColaboradores");
// Route::get("/inscripcionInvitados", "OtrosController@inscribirInvitados");
// Route::post("/inscripcionInvitados", "OtrosController@registrarInvitados");
// Route::get("/inscripcionProveedores", "OtrosController@inscribirProveedores");
// Route::post("/inscripcionProveedores", "OtrosController@registrarProveedores");
// Route::post("/inscripcion", "OtrosController@registrar");
//
// Route::get("/inscripcionDocentes", "DocentesController@inscribir");
// Route::post("/inscripcionDocentes", "DocentesController@registrar");

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
