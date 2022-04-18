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
        Schema::create('gearbox_type_xml_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('xml_data_id');
            $table->unsignedBigInteger('gearbox_type_id');
            $table->foreign('xml_data_id')->references('id')->on('xml_data')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('gearbox_type_id')->references('id')->on('gearbox_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gearbox_type_xml_data');
    }
};
