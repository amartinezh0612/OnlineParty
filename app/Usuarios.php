<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Usuarios extends Model
{
    //
    protected $table='usuarios';
     protected $primaryKey='id_usuario';
     public $timestamps=false;
 
     protected $fillable=[
         
        'id_paquete',
        'costo_paquete',
         'documento',
         'nombre_completo',
         'correo_electronico',
         'telefono',
         'fecha_llamada',
         'ciudad',
         'motivo_celebracion',
         'fecha_evento',
         'fecha_fin_evento',
         'numero_invitado',
         'rango_edad_inv',
         'duracion',
         'nombre_anfitrion',
         'edad_anfitrion',
         'comunicado',
         'nombre_asesor',
         'observacion',
     ];
 
     protected $guarded=[
 
     ];
}
