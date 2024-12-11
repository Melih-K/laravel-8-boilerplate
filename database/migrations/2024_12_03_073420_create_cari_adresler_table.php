<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCariAdreslerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('cari_adresler')) {
            Schema::create('cari_adresler', function (Blueprint $table) {
            
                $table->id();
                $table->foreignId('cari_id')->constrained('cariler')->onDelete('cascade');
                $table->string('address1');
                $table->string('address2')->nullable();
                $table->string('country');
                $table->string('city');
                $table->string('district');
                $table->string('postalCode');
                $table->string('mobilePhone')->nullable();
                $table->string('phone')->nullable();
                $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cari_adresler');
    }
}
