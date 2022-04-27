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
        Schema::create('medias', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->string('sid')->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('thumb')->nullable();
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
        Schema::dropIfExists('medias');
    }

};
