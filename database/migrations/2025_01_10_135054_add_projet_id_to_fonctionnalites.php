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
        Schema::table('fonctionnalites', function (Blueprint $table) {

            $table->foreignId('projet_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fonctionnalites', function (Blueprint $table) {
             // Supprimer la clé étrangère et la colonne
            $table->dropForeign(['projet_id']);
            $table->dropColumn('projet_id');
        });
    }
};
