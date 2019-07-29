<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('films', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',100);
            $table->text('deskripsi');
            $table->integer('genre_id');
            $table->date('start_at');
            $table->date('end_at');
            $table->integer('studio_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('films');
    }
}
