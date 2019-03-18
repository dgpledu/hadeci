<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desafio extends Model
{
  public $table = "desafios";
  public $primaryKey = "ID";
  public $timestamps = false;
  public $guarded = [];

  public function tutores() {
    return $this->hasMany("App\Tutor", "ID_desafio");
  }
}
