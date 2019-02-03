<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('data_de_nascimento');
            $table->integer('cpf')->unique();
            $table->string('telefone')->unique();
            $table->string('bairro');
            $table->integer('produtos_id')->unsigned()->nullable();
            $table->timestamps();
        });

        //chave estrangeira
        Schema::table('clientes', function(Blueprint $table){
            $table->foreign('produtos_id')->references('id')->on('produtos')->onDelete('set null');
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
}
