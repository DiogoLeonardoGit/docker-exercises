<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagensProjetoTable extends Migration
{
    public function up()
    {
        Schema::create('imagens_projetos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('projeto_id')->constrained()->onDelete('cascade');
            $table->string('path');
            $table->string('alt_text')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imagens_projetos');
    }
};
