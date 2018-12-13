<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalization', function (Blueprint $table) {
            $table->string('user');
            $table->string('county');
            $table->string('district');
            $table->string('location');
            $table->char('headline');
            $table->char('international');
            $table->char('business');
            $table->char('science');
            $table->char('entertainment');
            $table->char('sport');
            $table->char('health');
            $table->char('local');
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
        Schema::dropIfExists('personalization');
    }
}
