<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Paquetes extends Model
{
     //
     protected $table='paquetes';
     protected $primaryKey='id_paquete';
     public $timestamps=false;
 
     protected $fillable=[
 
         'nombre',
         'descripcion_p',
         'costo_paquete',
         
     ];
 
     protected $guarded=[
 
     ];
}
