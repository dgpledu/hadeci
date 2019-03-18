<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
  public $table = "estudiantes";
  public $primaryKey = "ID";
  public $timestamps = false;
  public $guarded = [];

  public function docente() {
    return $this->belongsTo("App\Docente", "ID_docente_reg");
  }

  public function grupo() {
    return $this->belongsTo("App\Grupo", "ID_grupo");
  }

  public function escuela() {
    return $this->belongsTo("App\Escuela", "ID_escuela");
  }

  public function categoria() {
    return $this->hasMany("App\Escuela", "ID_cat_tem1", "ID_cat_tem2");
  }
}
