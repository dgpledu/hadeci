<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    public $table = "escuelas";
    public $primaryKey = "ID";
    public $timestamps = false;
    public $guarded = [];

public function estudiantes() {
  return $this->hasMany("App\Estudiante", "ID_escuela");
}

public function docentes() {
 return $this->belongsToMany("App\Docente", "docente_escuela", "ID_escuela", "ID_docente");

}
}
