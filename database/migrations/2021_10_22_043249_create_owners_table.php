<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('transaction');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('escrituras')->nullable();
            $table->string('contrato_compra_venta')->nullable();
            $table->string('poder_notarial')->nullable();
            $table->string('comprobante_domicilio')->nullable();
            $table->string('admite_mascotas');
            $table->string('cantidad_mascotas')->nullable();
            $table->string('tiene_estacionamiento');
            $table->string('servicios');
            $table->string('esta_amueblado');
            $table->string('identificacion_oficial');
            $table->string('metodo_pago');
            $table->string('puede_facturar');
            $table->string('precio_propiedad');
            $table->string('direccion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('owners');
    }
}
