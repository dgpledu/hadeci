<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
  public $table = "tutores";
  public $primaryKey = "ID";
  public $timestamps = false;
  public $guarded = [];

  public function desafio() { //"estudiantes" viene del método
    return $this->belongsTo("App\Desafio", "ID_desafio");
  }

  public function grupos() {
    return $this->hasMany("App\Grupo", "ID_tutor");
  }



}
