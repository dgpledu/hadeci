<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    public $table = "establecimientos";
    public $primaryKey = "ID";
    public $timestamps = false;
    public $guarded = [];
}
