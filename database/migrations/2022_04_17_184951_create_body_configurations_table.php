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
        Schema::create('body_configurations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('model_id')->default(0);
            $table->foreign('model_id')->references('id')->on('models')->onUpdate('cascade')->onDelete('cascade');
            $table->string('bodyConfiguration', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('body_configurations');
    }
};
