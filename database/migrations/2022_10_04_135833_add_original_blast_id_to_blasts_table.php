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
        Schema::table('blasts', function (Blueprint $table) {
            $table->unsignedBigInteger('original_blast_id',false)->index()->nullable();

            $table->foreign('original_blast_id')->references('id')->on('blasts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blasts', function (Blueprint $table) {
            $table->dropColumn('original_blast_id');
        });
    }
};
