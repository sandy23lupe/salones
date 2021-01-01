<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alquilers extends Model
{
    protected $table = 'alquilers'; 
    protected $fillable=['id','fe_inicio','fe_entrega','id_empleado','id_cliente'];
}
