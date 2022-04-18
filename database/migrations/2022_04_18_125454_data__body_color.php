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
        Schema::create('data__body_color', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_id');
            $table->unsignedBigInteger('bodyColor_id');
            $table->foreign('data_id')->references('id')->on('xml_data');
            $table->foreign('bodyColor_id')->references('id')->on('body_colors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
