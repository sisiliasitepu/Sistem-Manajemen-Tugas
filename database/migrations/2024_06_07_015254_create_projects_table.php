<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        // Nonaktifkan foreign key checks sementara
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('projects');

        // Aktifkan kembali foreign key checks
        Schema::enableForeignKeyConstraints();
    }
}
