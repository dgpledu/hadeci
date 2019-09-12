<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
  public $table = "docentes";
  public $primaryKey = "ID";
  public $timestamps = false;
  public $guarded = [];

  public function estudiantes() {
    return $this->hasMany("App\Estudiante", "ID_docente_reg");
}
public function escuelas() {
    return $this->belongsToMany("App\Escuela", "docente_escuela", "ID_docente", "ID_escuela");
}
}
