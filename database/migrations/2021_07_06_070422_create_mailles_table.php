<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaillesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mailles', function (Blueprint $table) {
            $table->id();
            $table->date('date_debut');
            $table->date('date_actu');
            $table->date('date_fin');
            $table->bigInteger('marche_id')->unsigned()->nullable();
            $table->foreign('marche_id')->references('id')->on('marches');
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
        Schema::dropIfExists('mailles');
    }
}
