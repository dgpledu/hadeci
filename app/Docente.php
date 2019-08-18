<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
  public $table = "docentes";
  public $primaryKey = "ID";
  public $timestamps = false;
  public $guarded = [];

  public function estudiantes() { //"estudiantes" viene del método
    return $this->hasMany("App\Estudiante", "ID_docente_reg");
}
public function escuelas() {
    return $this->belongsToMany("App\Escuela", "docente_escuela", "ID_docente", "ID_escuela");
    // return $this->belongsToMany("App\Escuela", "ID_escuela", "ID_docente"); //al revés probando...
}
}
