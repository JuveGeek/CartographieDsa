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
        Schema::table('projet_structure_beneficiaire', function (Blueprint $table) {
            $table->foreignId('projet_id')->constrained()->onDelete('cascade');
            $table->foreignId('structure_beneficiaire_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projet_structure_beneficiaire', function (Blueprint $table) {
            $table->dropForeign(['projet_id']);
            $table->dropColumn('projet_id');
            $table->dropForeign(['structure_beneficiaire_id']);
            $table->dropColumn('structure_beneficiaire_id');
        });
    }
};
