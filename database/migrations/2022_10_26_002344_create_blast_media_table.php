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
        Schema::create('blast_media', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('blast_id')->unsigned()->index()->nullable();
            $table->bigInteger('media_id')->unsigned()->index()->nullable();
            $table->timestamps();

            $table->foreign('blast_id')->references('id')->on('blasts')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blast_media');
    }
};
