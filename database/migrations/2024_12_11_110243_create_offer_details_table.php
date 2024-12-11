<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id')->constrained('offers')->onDelete('cascade'); // Teklif tablosuyla ilişki
            $table->foreignId('stock_id')->constrained('stocks')->onDelete('cascade'); // Stok tablosuyla ilişki
            $table->string('currency', 3); // TL veya EUR
            $table->decimal('quantity', 8, 2); // Adet
            $table->decimal('price', 10, 2); // Fiyat
            $table->decimal('total', 10, 2); // Toplam (quantity * price)
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
        Schema::dropIfExists('offer_details');
    }
}
