<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propuesta extends Model
{
  public $table = "people_choice";
  public $primaryKey = "ID";
  public $timestamps = false;
  public $guarded = [];


  // public function grupo() {
  //   return $this->belongsTo("App\Grupo", "ID_grupo");
  // }

}
