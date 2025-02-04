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
    Schema::table('projets', function (Blueprint $table) {
        $table->string('objectif_principal')->nullable(); // ou un autre type de champ selon tes besoins
        $table->string('public_cible')->nullable(); // ou un autre type de champ selon tes besoins
        $table->string('phase_actuelle')->nullable(); // ou un autre type de champ selon tes besoins
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projets', function (Blueprint $table) {
            //
            $table->dropColumn(['objectif_principal', 'public_cible', 'phase_actuelle']);
        });
    }
};
