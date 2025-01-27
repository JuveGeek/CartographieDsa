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
        Schema::table('users', function (Blueprint $table) {

            //$table->foreignId('structure_porteuse_id')->constrained()->default(1)->onDelete('cascade');
            $table->foreignId('structure_porteuse_id')->default(1)->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['structure_porteuse_id']);
            $table->dropColumn('structure_porteuse_id');
        });
    }
};
