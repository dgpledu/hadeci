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

// ¿Está bien este método? (siempre estuvo y nunca dio error)
  public function categoria() {
    return $this->hasMany("App\Escuela", "ID_cat_tem1", "ID_cat_tem2");
  }

  // public function categoria() {
  //   return $this->hasMany("App\Categoria", "ID_cat_tem1", "ID_cat_tem2");
  // }

  // public function categoriaUno() {
  //   return $this->hasMany("App\Categoria", "ID_cat_tem1", "ID_cat_tem2");
  // }
  //
  public function categoria1() {
    return $this->belongsTo("App\Categoria", "ID_cat_tem1");
  }

  public function categoria2() {
    return $this->belongsTo("App\Categoria", "ID_cat_tem2");
  }

}
