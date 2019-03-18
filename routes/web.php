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

Route::get("/consultaEstablecimientos", "EscuelasParticipantesController@listadotodas");
Route::get("/acreditarEstudiantes", "EstudiantesController@acreditacion");
Route::post("/estudiantesAcreditados", "EstudiantesController@acreditados");

Route::get("/acreditarEstudiantesDia1", "EstudiantesController@acreditacionDia1");
Route::post("/estudiantesAcreditadosDia1", "EstudiantesController@acreditadosDia1");

Route::get("/acreditarEstudiantesDia2", "EstudiantesController@acreditacionDia2");
Route::post("/estudiantesAcreditadosDia2", "EstudiantesController@acreditadosDia2");

Route::get("/consultaEscuelasParticipantes", "EscuelasParticipantesController@consultaactivas")->middleware("auth");
Route::get("/consultaTutores", "TutoresController@consulta")->middleware("auth");
Route::get("/listadoTutores", "TutoresController@listado")->middleware("auth");
Route::get("/listadoEscuelas", "EscuelasParticipantesController@listado")->middleware("auth");
Route::get("/estudiantesPorDocente", "EstudiantesController@PorDocente")->middleware("auth");
Route::get("/listadoEstudiantes", "EstudiantesController@listado")->middleware("auth");
Route::get("/listadoEstudiantesPresentesDia1", "EstudiantesController@listadoEstudiantesPresentesDia1")->middleware("auth");
Route::get("/listadoEstudiantesPresentesDia2", "EstudiantesController@listadoEstudiantesPresentesDia2")->middleware("auth");
Route::get("/estudiantesPorEscuela", "EstudiantesController@PorEscuelaActiva")->middleware("auth");
Route::get("/estudiantesPorGrupo", "EstudiantesController@PorGrupo")->middleware("auth");
Route::get("/consultaPorDesafio", "DesafiosController@consulta")->middleware("auth");

Route::get("/asignarDesafioATutores", "DesafiosController@consultaDeTutores");

Route::get("/consultaPorDesafioTipeandoCodigo", "DesafiosController@consultaTipeandoCodigo");
Route::get("/inscripcionEstudiantes", "EstudiantesController@inscribir");
Route::post("/inscripcionEstudiantes", "EstudiantesController@registrar");
Route::get("/cargarDesafios", "DesafiosController@cargar");
Route::post("/cargarDesafios", "DesafiosController@guardar");
Route::get("/preinscripcionEstudiantes", "EstudiantesController@preinscribir");
Route::post("/preinscripcionEstudiantes", "EstudiantesController@preregistrar");
Route::get("/inscripcionTutores", "TutoresController@inscribir");
Route::post("/inscripcionTutores", "TutoresController@registrar");
Route::get("/inscripcionMentores", "OtrosController@inscribirMentores");
Route::post("/inscripcionMentores", "OtrosController@registrarMentores");
Route::get("/inscripcionDocentes", "DocentesController@inscribir");
Route::post("/inscripcionDocentes", "DocentesController@registrar");

// Esto lo agregué para el logout
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
// fin de lo que agregué para el logout

// Auth::routes(['register' => false]);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Esto es para probar cosas
Route::get('/probarCosas', function () {
    return view('probarCosas');
});
// fin de probar cosas
