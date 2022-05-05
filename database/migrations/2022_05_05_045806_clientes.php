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
        Schema::create('clientes', function (Blueprint $table) {            
            $table->string("documento",250);
            $table->string("nombre",250);
            $table->string("email",250);
            $table->string("celular",250);
            $table->timestamps();
        });
        Schema::table('clientes', function ( $table){
            $table->primary('documento');
        });       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
