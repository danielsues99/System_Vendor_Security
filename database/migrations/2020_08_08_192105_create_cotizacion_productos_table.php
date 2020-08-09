<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizacion_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_customer');
            $table->unsignedBigInteger('id_cotizacion');
            $table->string('products');
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('id_customer')->references('id')->on('customers');
            $table->foreign('id_cotizacion')->references('id')->on('cotizacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizacion_productos');
    }
}
