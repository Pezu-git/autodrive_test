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
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_id')->default(0);
            $table->foreign('data_id')->references('id')->on('xml_data')->onUpdate('cascade')->onDelete('cascade');
            $table->string('price', 100)->default('');
            $table->string('specialOffer', 100)->default('');
            $table->string('specialOfferPreviousPrice', 100)->default('');
            $table->string('tradeinDiscount', 100)->default('');
            $table->string('creditDiscount', 100)->default('');
            $table->string('insuranceDiscount', 100)->default('');
            $table->string('maxDiscount', 100)->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_lists');
    }
};
