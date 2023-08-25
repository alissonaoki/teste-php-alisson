<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_unico')->unique();
            $table->string('nome');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
