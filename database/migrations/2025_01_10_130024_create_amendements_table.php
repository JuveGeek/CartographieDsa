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
        Schema::create('amendements', function (Blueprint $table) {
            $table->id();
            $table->text('description');
            $table->string('source');
            $table->string('statut');
            $table->string('file_path')->nullable();
            $table->date('date');


            $table->string('responsable')->nullable();
            $table->string('categorie')->nullable();
            $table->string('mise_production')->nullable();
            $table->integer('priorite')->default(3)->nullable();


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
        Schema::dropIfExists('amendements');
    }
};
