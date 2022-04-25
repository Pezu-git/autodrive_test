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
            $table->unsignedBigInteger('dealer')->default(0);
            $table->foreign('dealer')->references('id')->on('dealers')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('brand')->default(0);
            $table->foreign('brand')->references('id')->on('brands')->onUpdate('cascade')->onDelete('cascade');
            $table->string('vin')->nullable()->default(NULL);
            $table->string('uin')->nullable()->default(NULL);
            $table->unsignedBigInteger('category')->default(0);
            $table->foreign('category')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('subcategory', 100)->nullable()->default(NULL);
            $table->unsignedBigInteger('type')->default(0);
            $table->foreign('type')->references('id')->on('types')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('year')->default(0);
            $table->foreign('year')->references('id')->on('years')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('model')->default(0);
            $table->foreign('model')->references('id')->on('models')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('generation')->nullable()->default(NULL);
            $table->foreign('generation')->references('id')->on('generations')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('bodyConfiguration')->nullable()->default(NULL);
            $table->foreign('bodyConfiguration')->references('id')->on('body_configurations')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('modification')->nullable()->default(NULL);
            $table->foreign('modification')->references('id')->on('modifications')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('complectation')->nullable()->default(NULL);
            $table->foreign('complectation')->references('id')->on('complectations')->onUpdate('cascade')->onDelete('cascade');
            $table->string('brandComplectationCode', 100)->nullable()->default(NULL);
            $table->unsignedBigInteger('engineType')->nullable()->default(NULL);
            $table->foreign('engineType')->references('id')->on('engines')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('engineVolume')->nullable()->default(NULL);
            $table->foreign('engineVolume')->references('id')->on('engine_volumes')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('enginePower')->nullable()->default(NULL);
            $table->foreign('enginePower')->references('id')->on('engine_powers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('bodyNumber', 100)->nullable()->default(NULL);
            $table->unsignedBigInteger('bodyType')->nullable()->default(NULL);
            $table->foreign('bodyType')->references('id')->on('body_types')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('bodyDoorCount')->nullable()->default(NULL);
            $table->foreign('bodyDoorCount')->references('id')->on('body_door_counts')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('bodyColor')->nullable()->default(NULL);
            $table->foreign('bodyColor')->references('id')->on('body_colors')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('bodyColorMetallic')->nullable()->default(NULL);
            $table->foreign('bodyColorMetallic')->references('id')->on('body_color_metallics')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('driveType')->nullable()->default(NULL);
            $table->foreign('driveType')->references('id')->on('drive_types')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('gearboxType')->nullable()->default(NULL);
            $table->foreign('gearboxType')->references('id')->on('gearbox_types')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('gearboxGearCount')->nullable()->default(NULL);
            $table->foreign('gearboxGearCount')->references('id')->on('gearbox_gear_counts')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('steeringWheel')->nullable()->default(NULL);
            $table->foreign('steeringWheel')->references('id')->on('steering_wheels')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('mileage')->nullable()->default(NULL);
            $table->foreign('mileage')->references('id')->on('mileages')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('mileageUnit')->nullable()->default(NULL);
            $table->foreign('mileageUnit')->references('id')->on('mileage_units')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('price')->nullable()->default(NULL);
            $table->foreign('price')->references('id')->on('prices')->onUpdate('cascade')->onDelete('cascade');
            $table->string('specialOffer', 100)->nullable()->default(NULL);
            $table->string('specialOfferPreviousPrice', 100)->nullable()->default(NULL);;
            $table->string('tradeinDiscount', 100)->nullable()->default(NULL);;
            $table->string('creditDiscount', 100)->nullable()->default(NULL);;
            $table->string('insuranceDiscount', 100)->nullable()->default(NULL);
            $table->string('maxDiscount', 100)->nullable()->default(NULL);
            $table->unsignedBigInteger('availability')->default(0);
            $table->foreign('availability')->references('id')->on('availabilities')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('ptsType')->nullable()->default(NULL);
            $table->foreign('ptsType')->references('id')->on('pts_types')->onUpdate('cascade')->onDelete('cascade');
            $table->string('country', 100)->nullable()->default(NULL);
            $table->string('operatingTime', 100)->nullable()->default(NULL);
            $table->string('ecoClass', 100)->nullable()->default(NULL);
            $table->string('driveWheel', 100)->nullable()->default(NULL);
            $table->string('axisCount', 100)->nullable()->default(NULL);
            $table->string('brakeType', 100)->nullable()->default(NULL);
            $table->string('cabinType', 100)->nullable()->default(NULL);
            $table->string('maximumPermittedMass', 100)->nullable()->default(NULL);
            $table->string('saddleHeight', 100)->nullable()->default(NULL);
            $table->string('cabinSuspension', 100)->nullable()->default(NULL);
            $table->string('chassisSuspension', 100)->nullable()->default(NULL);
            $table->string('length', 100)->nullable()->default(NULL);
            $table->string('width', 100)->nullable()->default(NULL);
            $table->string('bodyVolume', 100)->nullable()->default(NULL);
            $table->string('bucketVolume', 100)->nullable()->default(NULL);
            $table->string('tractionClass', 100)->nullable()->default(NULL);
            $table->string('refrigeratorClass', 100)->nullable()->default(NULL);
            $table->string('craneArrowRadius', 100)->nullable()->default(NULL);
            $table->string('craneArrowLength', 100)->nullable()->default(NULL);
            $table->string('craneArrowPayload', 100)->nullable()->default(NULL);
            $table->string('loadHeight', 100)->nullable()->default(NULL);
            $table->string('photoCount', 100)->nullable()->default(NULL);
            $table->unsignedBigInteger('description')->default(0);
            $table->foreign('description')->references('id')->on('descriptions')->onUpdate('cascade')->onDelete('cascade');
            $table->string('ownersCount', 100)->nullable()->default(NULL);
            $table->string('vehicleCondition', 100)->nullable()->default(NULL);
            $table->json('equipment')->nullable()->default(NULL);
            $table->string('brandColorCode', 100)->nullable()->default(NULL);
            $table->string('brandInteriorCode', 100)->nullable()->default(NULL);
            $table->string('certificationProgram', 100)->nullable()->default(NULL);
            $table->string('promoFeatures', 100)->nullable()->default(NULL);
            $table->string('acquisitionSource', 100)->nullable()->default(NULL);
            $table->string('acquisitionDate', 100)->nullable()->default(NULL);
            $table->string('manufactureDate', 100)->nullable()->default(NULL);
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
