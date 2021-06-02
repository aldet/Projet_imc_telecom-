<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjoutKeyMarcheCommuneId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('communes', function (Blueprint $table)
        {
            $table->bigInteger('marche_id')->unsigned()->nullable();
            $table->foreign('marche_id')->references('id')->on('marches');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
