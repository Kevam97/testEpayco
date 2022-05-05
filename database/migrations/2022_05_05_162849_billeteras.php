<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billeteras', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_fk')->nullable();
            $table->string('numero');               
            $table->integer('valor');
            $table->timestamps();
        });
        Schema::table('billeteras', function ( $table){
            $table->foreign('cliente_fk')->references('documento')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('billeteras');
    }
};
