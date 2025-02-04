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
        Schema::table('difficulte_amendements', function (Blueprint $table) {

            $table->foreignId('amendement_id')->constrained()->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('difficulte_amendements', function (Blueprint $table) {
            $table->dropForeign(['amendement_id']);
            $table->dropColumn('amendement_id');
        });
    }
};
