<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cariler', function (Blueprint $table) {
            $table->id();
            $table->integer('cariCode');
            $table->longtext('description');
            $table->string('relatedPerson');
            $table->string('companyName');
            $table->string('country');
            $table->integer('authorityCode');
            $table->string('email');
            $table->string('ekalan1')->unique();
            $table->string('ekalan2')->unique();
            $table->string('ekalan3')->unique();
            $table->string('ekalan4')->unique();
            $table->string('ekalan5')->unique();
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
        Schema::dropIfExists('cariler');
    }
}
