<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Otro extends Model
{
    public $table = "otros";
    public $primaryKey = "ID";
    public $timestamps = false;
    public $guarded = [];
}
