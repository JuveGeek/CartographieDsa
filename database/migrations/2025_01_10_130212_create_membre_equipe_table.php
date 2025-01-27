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
        Schema::create('membre_equipe', function (Blueprint $table) {
            $table->id();
           // $table->foreignId('personnel_id')->constrained()->onDelete('cascade');
           // $table->foreignId('equipe_id')->constrained()->onDelete('cascade');
            $table->string('role');
            $table->string('statut');
            $table->boolean('actif')->default(true);
            $table->date('date_debut');
            $table->date('date_fin');
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
        Schema::dropIfExists('membre_equipe');
    }
};
