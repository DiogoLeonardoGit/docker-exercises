<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesProjetoTable extends Migration
{
    public function up()
    {
        Schema::create('files_projetos', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('projeto_id')->constrained()->onDelete('cascade');
            $table->string('path');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('files_projetos');
    }
};
