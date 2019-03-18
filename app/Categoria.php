<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  public $table = "categorias";
  public $primaryKey = "ID";
  public $timestamps = false;
  public $guarded = [];

  public function estudiantes() {
    return $this->hasMany("App\Estudiante", "ID_cat_tem1", "ID_cat_tem2");
  }
}
