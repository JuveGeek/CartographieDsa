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
        Schema::create('projet_structure_beneficiaire', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('projet_id')->constrained()->onDelete('cascade');
            //$table->foreignId('structure_beneficiaire_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('projet_structure_beneficiaire');
    }
};
