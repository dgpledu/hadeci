<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
  public $table = "grupos";
  public $primaryKey = "ID";
  public $timestamps = false;
  public $guarded = [];

  public function tutor() {
    return $this->belongsTo("App\Tutor", "ID_tutor");
  }

  public function estudiantes() {
    return $this->hasMany("App\Estudiante", "ID_grupo");
  }
}
