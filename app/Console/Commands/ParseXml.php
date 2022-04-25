<?php

namespace App\Console\Commands;

use App\{
    Http\Controllers\BodyColorController,
    Http\Controllers\BodyConfigurationController,
    Http\Controllers\BodyTypeController,
    Http\Controllers\BrandController,
    Http\Controllers\CategoryController,
    Http\Controllers\ComplectationController,
    Http\Controllers\DealerController,
    Http\Controllers\DriveTypeController,
    Http\Controllers\EngineController,
    Http\Controllers\GearboxTypeController,
    Http\Controllers\GenerationController,
    Http\Controllers\MileageController,
    Http\Controllers\ModelsController,
    Http\Controllers\ModificationController,
    Http\Controllers\PriceController,
    Http\Controllers\DescriptionController,



    Http\Controllers\XmlController,
};
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BodyColorMetallicController;
use App\Http\Controllers\BodyDoorCountController;
use App\Http\Controllers\BodyNumberController;
use App\Http\Controllers\BrandComplectationCodeController;
use App\Http\Controllers\EnginePowerController;
use App\Http\Controllers\EngineVolumeController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\GearboxGearCountController;
use App\Http\Controllers\MileageUnitController;
use App\Http\Controllers\PriceListController;
use App\Http\Controllers\PtsTypeController;
use App\Http\Controllers\SteeringWheelController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UinController;
use App\Http\Controllers\VinController;
use App\Http\Controllers\YearController;
use App\Models\Availability;
use App\Models\BodyColor;
use App\Models\BodyColorMetallic;
use App\Models\BodyDoorCount;
use App\Models\BodyNumber;
use App\Models\BrandComplectationCode;
use App\Models\EnginePower;
use App\Models\EngineVolume;
use App\Models\Equipment;
use App\Models\GearboxGearCount;
use App\Models\MileageUnit;
use App\Models\PtsType;
use App\Models\SteeringWheel;
use App\Models\Subcategory;
use App\Models\Type;
use App\Models\Uin;
use App\Models\Vin;
use App\Models\Year;
use Illuminate\Console\Command;
use Illuminate\Http\Request;

class ParseXml extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xml:parse {file?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $arguments = $this->arguments();
        $request = new Request($arguments);
        BodyColorController::store($request);
        BodyConfigurationController::store($request);
        BodyTypeController::store($request);
        BrandController::store($request);
        CategoryController::store($request);
        ComplectationController::store($request);
        DealerController::store($request);
        DriveTypeController::store($request);
        EngineController::store($request);
        GearboxTypeController::store($request);
        GenerationController::store($request);
        MileageController::store($request);
        ModelsController::store($request);
        ModificationController::store($request);
        PriceController::store($request);
        TypeController::store($request);

        AvailabilityController::store($request);
        BodyColorMetallicController::store($request);
        BodyDoorCountController::store($request);
        BodyNumberController::store($request);
        BrandComplectationCodeController::store($request);
        EnginePowerController::store($request);
        EngineVolumeController::store($request);

        GearboxGearCountController::store($request);
        MileageUnitController::store($request);
        PtsTypeController::store($request);
        SteeringWheelController::store($request);
        SubcategoryController::store($request);
        UinController::store($request);
        VinController::store($request);
        YearController::store($request);
        DescriptionController::store($request);
        EquipmentController::store($request);



        XmlController::store($request);











        // $dealer->store($request);
        // // $cars->store($request);
        // $bodyType->store($request);
        // // $mileage->store($request);
        // $brand->store($request);
    }
}
