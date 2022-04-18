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
        Schema::create('xml_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dealer_id')->default(0);
            $table->foreign('dealer_id')->references('id')->on('dealers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('uin', 100)->default('');
            $table->string('category', 100)->default('');
            $table->string('brand', 100)->default('');
            $table->string('model', 100)->default('');
            $table->string('generation', 100)->default('');
            $table->string('bodyConfiguration', 100)->default('');
            $table->string('modification', 100)->default('');


            // $table->string('complectation', 100);
            // $table->string('brandComplectationCode', 100);
            // $table->string('engineType', 100);
            // $table->string('engineVolume', 100);
            // $table->string('enginePower', 100);
            // $table->string('bodyType', 100)
            // $table->string('bodyDoorCount', 100);
            // $table->string('bodyColor', 100);
            // $table->string('bodyColorMetallic', 100);
            // $table->string('driveType', 100);
            // $table->string('gearboxType', 100);
            // $table->string('gearboxGearCount', 100);
            // $table->string('steeringWheel', 100);

            // $table->string('mileage', 100);
            // $table->string('mileageUnit', 100);
            // $table->string('price', 100);
            // $table->string('specialOffer', 100);
            // $table->string('specialOfferPreviousPrice', 100);
            // $table->string('tradeinDiscount', 100);
            // $table->string('creditDiscount', 100);
            // $table->string('insuranceDiscount', 100);
            // $table->string('maxDiscount', 100);
            // $table->string('availability', 100);
            // $table->string('ptsType', 100);
            // $table->string('country', 100);
            // $table->string('operatingTime', 100);
            // $table->string('ecoClass', 100);
            // $table->string('driveWheel', 100);
            // $table->string('axisCount', 100);

            // $table->string('brakeType', 100);
            // $table->string('cabinType', 100);
            // $table->string('maximumPermittedMass', 100);
            // $table->string('saddleHeight', 100);
            // $table->string('cabinSuspension', 100);
            // $table->string('chassisSuspension', 100);
            // $table->string('length', 100);
            // $table->string('width', 100);
            // $table->string('bodyVolume', 100);
            // $table->string('bucketVolume', 100);
            // $table->string('tractionClass', 100);
            // $table->string('refrigeratorClass', 100);
            // $table->string('craneArrowRadius', 100);
            // $table->string('craneArrowLength', 100);
            // $table->string('craneArrowPayload', 100);
            // $table->string('loadHeight', 100);
            // $table->string('photoCount', 100);
            // $table->string('description', 100);
            // $table->string('ownersCount', 100);
            // $table->string('vehicleCondition', 100);
            // $table->string('equipment', 100);
            // $table->string('brandColorCode', 100);
            // $table->string('brandInteriorCode', 100);
            // $table->string('certificationProgram', 100);

            // $table->string('acquisitionSource', 100);
            // $table->string('acquisitionDate', 100);
            // $table->string('manufactureDate', 100);   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xml_data');
    }
};
