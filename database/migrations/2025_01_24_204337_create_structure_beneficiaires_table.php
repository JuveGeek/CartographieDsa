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
        Schema::create('structure_beneficiaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('statut');
            $table->string('etat');
            $table->date('annee_deploiement');
            $table->date('annee_exploitation');
            $table->string('commentaire');

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
        Schema::dropIfExists('structure_beneficiaire');
    }
};
