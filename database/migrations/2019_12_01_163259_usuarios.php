<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id_usuario');
            $table->integer('id_paquete');
            $table->string('costo_paquete');
            $table->integer('documento');
            $table->string('nombre_completo');
            $table->string('correo_electronico');
            $table->string('telefono');
            $table->date('fecha_llamada');
            $table->string('ciudad');
            $table->string('motivo_celebracion');
            $table->date('fecha_evento');
            $table->date('fecha_fin_evento');
            $table->string('hora');
            $table->string('numero_invitado');
            $table->string('rango_edad_inv');
            $table->string('duracion');
            $table->string('nombre_anfitrion');
            $table->integer('edad_anfitrion');
            $table->string('comunicado');
            $table->string('nombre_asesor');
            $table->string('observacion');
            $table->timestamps(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('usuarios');
    }
}
