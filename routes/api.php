<?php
// use App\Http\Controllers\XmlController;
// use App\Http\Controllers\DealerController;
// use App\Http\Controllers\BodyTypeController;
// use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () {
  return view('welcome');
});

//!Dealer 
//allDealerr
Route::get('/xml/dealer', [App\Http\Controllers\DealerController::class, 'index'])->name('dealer_all');
//parse
Route::post('/xml/dealer/parse', [App\Http\Controllers\DealerController::class, 'store'])->name('dealer_parse');
/* show 
* @param {str dealer}
*/
Route::post('/xml/dealer/show', [App\Http\Controllers\DealerController::class, 'show'])->name('dealer_show');
/* update
* @param {dealer, name}
*/
Route::post('/xml/dealer/update', [App\Http\Controllers\DealerController::class, 'update'])->name('dealer_update');
/* destroy
* @param {str dealer}
*/
Route::post('/xml/dealer/destroy', [App\Http\Controllers\DealerController::class, 'destroy'])->name('dealer_destroy');

//!Car
//all
Route::get('/xml/car', [App\Http\Controllers\XmlController::class, 'index'])->name('car_all');
//parse
Route::post('/xml/car/parse', [App\Http\Controllers\XmlController::class, 'store'])->name('car_parse');
/* show 
* @param id
*/
Route::post('/xml/car/show', [App\Http\Controllers\XmlController::class, 'show'])->name('car_show');
/* update
* @param {dealer_id, uin, category, brand, model, generation, bodyConfiguration, modification}
*/
Route::post('/xml/car/update', [App\Http\Controllers\XmlController::class, 'update'])->name('car_update');
/* destroy
* @param id
*/
Route::post('/xml/car/destroy', [App\Http\Controllers\XmlController::class, 'destroy'])->name('car_destroy');

//!Brands
//all
Route::get('/xml/brand', [App\Http\Controllers\BrandController::class, 'index'])->name('brand_all');
//parse
Route::post('/xml/brand/parse', [App\Http\Controllers\BrandController::class, 'store'])->name('brand_parse');
/* show
* @param {str brand}
*/
Route::post('/xml/brand/show', [App\Http\Controllers\BrandController::class, 'show'])->name('brand_show');
/* update
* @param {brand, name}
*/
Route::post('/xml/brand/update', [App\Http\Controllers\BrandController::class, 'update'])->name('car_update');
/* destroy
* @param {str brand}
*/
Route::post('/xml/brand/destroy', [App\Http\Controllers\BrandController::class, 'destroy'])->name('brand_destroy');

//!Category
//all
Route::get('/xml/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category_all');
//parse
Route::post('/xml/category/parse', [App\Http\Controllers\CategoryController::class, 'store'])->name('category_parse');
/* show
* @param {str category, subcategory}
*/
Route::post('/xml/category/show', [App\Http\Controllers\CategoryController::class, 'show'])->name('category_show');
/* update
* @param {str category, subcategory, categoryUpdate, subcategoryUpdate}
*/
Route::post('/xml/category/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category_update');
/* destroy
* @param {str category, subcategory}
*/
Route::post('/xml/category/destroy', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('category_destroy');

//!Models
//all
Route::get('/xml/model', [App\Http\Controllers\ModelsController::class, 'index'])->name('model_all');
//parse
Route::post('/xml/model/parse', [App\Http\Controllers\ModelsController::class, 'store'])->name('model_parse');
/* show
* @param {str model}
*/
Route::post('/xml/model/show', [App\Http\Controllers\ModelsController::class, 'show'])->name('model_show');
/* update
* @param {str model, modelUpdate}
*/
Route::post('/xml/model/update', [App\Http\Controllers\ModelsController::class, 'update'])->name('model_update');
/* destroy
* @param {str model}
*/
Route::post('/xml/model/destroy', [App\Http\Controllers\ModelsController::class, 'destroy'])->name('model_destroy');


//!BodyConfigurations
//all
Route::get('/xml/bodyConfiguration', [App\Http\Controllers\BodyConfigurationController::class, 'index'])->name('bodyConf_all');
//parse
Route::post('/xml/bodyConfiguration/parse', [App\Http\Controllers\BodyConfigurationController::class, 'store'])->name('bodyConf_parse');
/* show
* @param {model_id, str bodyConfiguration}
*/
Route::post('/xml/bodyConfiguration/show', [App\Http\Controllers\BodyConfigurationController::class, 'show'])->name('bodyConf_show');
/* update
* @param { model_id, str bodyConfiguration, bodyConfigurationUpdate}
*/
Route::post('/xml/bodyConfiguration/update', [App\Http\Controllers\BodyConfigurationController::class, 'update'])->name('bodyConf_update');
/* destroy
* @param { model_id, str bodyConfiguration}
*/
Route::post('/xml/bodyConfiguration/destroy', [App\Http\Controllers\BodyConfigurationController::class, 'destroy'])->name('bodyConf_destroy');

//!Generation
//all
Route::get('/xml/generation', [App\Http\Controllers\GenerationController::class, 'index'])->name('generation_all');
//parse
Route::post('/xml/generation/parse', [App\Http\Controllers\GenerationController::class, 'store'])->name('generation_parse');
/* show
* @param {bodyConf_id, generation}
*/
Route::post('/xml/generation/show', [App\Http\Controllers\GenerationController::class, 'show'])->name('generation_show');
/* update
* @param {bodyConf_id, generation, generationUpdate}
*/
Route::post('/xml/generation/update', [App\Http\Controllers\GenerationController::class, 'update'])->name('generation_update');
/* destroy
* @param {bodyConf_id, generation}
*/
Route::post('/xml/generation/destroy', [App\Http\Controllers\GenerationController::class, 'destroy'])->name('generation_destroy');

//!Modification
//all
Route::get('/xml/modification', [App\Http\Controllers\ModificationController::class, 'index'])->name('modification_all');
//parse
Route::post('/xml/modification/parse', [App\Http\Controllers\ModificationController::class, 'store'])->name('modification_parse');
/* show
* @param {bodyConf_id, modification}
*/
Route::post('/xml/modification/show', [App\Http\Controllers\ModificationController::class, 'show'])->name('modification_show');
/* destroy
* @param {bodyConf_id, modification}
*/
Route::post('/xml/modification/destroy', [App\Http\Controllers\ModificationController::class, 'destroy'])->name('modification_destroy');

//!Complectation
//all
Route::get('/xml/complectation', [App\Http\Controllers\ComplectationController::class, 'index'])->name('complectation_all');
//parse
Route::post('/xml/complectation/parse', [App\Http\Controllers\ComplectationController::class, 'store'])->name('complectation_parse');
/* show
* @param {bodyConf_id, complectation}
*/
Route::post('/xml/complectation/show', [App\Http\Controllers\ModificationController::class, 'show'])->name('complectation_show');
/* destroy
* @param {bodyConf_id, complectation}
*/
Route::post('/xml/complectation/destroy', [App\Http\Controllers\ModificationController::class, 'destroy'])->name('complectation_destroy');

//!Engine
//all
Route::get('/xml/engine', [App\Http\Controllers\EngineController::class, 'index'])->name('engine_all');
//parse
Route::post('/xml/engine/parse', [App\Http\Controllers\EngineController::class, 'store'])->name('engine_parse');
/* show
* @param {data_id, engineType, engineVolume, enginePower}
*/
Route::post('/xml/engine/show', [App\Http\Controllers\EngineController::class, 'show'])->name('engine_show');
/* update
* @param {data_id, engineType, engineVolume, enginePower, engineTypeUpdate, engineVolumeUpdate, enginePowerUpdate}
*/
Route::post('/xml/engine/update', [App\Http\Controllers\EngineController::class, 'update'])->name('engine_update');
/* destroy
* @param {data_id, engineType, engineVolume, enginePower}
*/
Route::post('/xml/engine/destroy', [App\Http\Controllers\EngineController::class, 'destroy'])->name('engine_destroy');

//!BodyTypes
//all
Route::get('/xml/bodyType', [App\Http\Controllers\BodyTypeController::class, 'index'])->name('bodyType_all');
//parse
Route::post('/xml/bodyType/parse', [App\Http\Controllers\BodyTypeController::class, 'store'])->name('bodyType_parse');
/* show
* @param {bodyType}
*/
Route::post('/xml/bodyType/show', [App\Http\Controllers\BodyTypeController::class, 'show'])->name('bodyType_show');
/* update
* @param {bodyType, bodyTypeUpdate}
*/
Route::post('/xml/bodyType/update', [App\Http\Controllers\BodyTypeController::class, 'update'])->name('bodyType_update');
/* destroy
* @param {bodyType}
*/
Route::post('/xml/bodyType/destroy', [App\Http\Controllers\BodyTypeController::class, 'destroy'])->name('bodyType_destroy');

//!BodyColor
//all
Route::get('/xml/bodyColor', [App\Http\Controllers\BodyColorController::class, 'index'])->name('bodyColor_all');
//parse
Route::post('/xml/bodyColor/parse', [App\Http\Controllers\BodyColorController::class, 'store'])->name('bodyColor_parse');
/* show
* @param {bodyColor, bodyColorMetallic}
*/
Route::post('/xml/bodyColor/show', [App\Http\Controllers\BodyColorController::class, 'show'])->name('bodyColor_show');
/* destroy
* @param {bodyColor, bodyColorMetallic}
*/
Route::post('/xml/bodyColor/destroy', [App\Http\Controllers\BodyColorController::class, 'destroy'])->name('bodyColor_destroy');

//!DriveTypes
//all
Route::get('/xml/driveType', [App\Http\Controllers\DriveTypeController::class, 'index'])->name('driveType_all');
//parse
Route::post('/xml/driveType/parse', [App\Http\Controllers\DriveTypeController::class, 'store'])->name('driveType_parse');
/* show
* @param {str driveType}
*/
Route::post('/xml/driveType/show', [App\Http\Controllers\DriveTypeController::class, 'show'])->name('driveType_show');
/* destroy
* @param {str driveType}
*/
Route::post('/xml/driveType/destroy', [App\Http\Controllers\DriveTypeController::class, 'destroy'])->name('driveType_destroy');

//!GearboxType
//all
Route::get('/xml/gearboxType', [App\Http\Controllers\GearboxTypeController::class, 'index'])->name('gearboxType_all');
//parse
Route::post('/xml/gearboxType/parse', [App\Http\Controllers\GearboxTypeController::class, 'store'])->name('gearboxType_parse');
/* show
* @param {gearboxType, gearboxGearCount}
*/
Route::post('/xml/gearboxType/show', [App\Http\Controllers\GearboxTypeController::class, 'show'])->name('gearboxType_show');
/* destroy
* @param {gearboxType, gearboxGearCount}
*/
Route::post('/xml/gearboxType/destroy', [App\Http\Controllers\GearboxTypeController::class, 'destroy'])->name('gearboxType_destroy');

//!Mileage
//all
Route::get('/xml/mileage', [App\Http\Controllers\MileageController::class, 'index'])->name('mileage_all');
//parse
Route::post('/xml/mileage/parse', [App\Http\Controllers\MileageController::class, 'store'])->name('mileage_parse');
/* show
* @param {data_id}
*/
Route::post('/xml/mileage/show', [App\Http\Controllers\MileageController::class, 'show'])->name('mileage_show');
/* update
* @param {data_id, mileageUpdate}
*/
Route::post('/xml/mileage/update', [App\Http\Controllers\MileageController::class, 'update'])->name('mileage_update');
/* destroy
* @param {data_id}
*/
Route::post('/xml/mileage/destroy', [App\Http\Controllers\MileageController::class, 'destroy'])->name('mileage_destroy');

//!Price
//all
Route::get('/xml/price', [App\Http\Controllers\PriceListController::class, 'index'])->name('price_all');
//parse
Route::post('/xml/price/parse', [App\Http\Controllers\PriceListController::class, 'store'])->name('price_parse');
/* show
* @param {data_id}
*/
Route::post('/xml/price/show', [App\Http\Controllers\PriceListController::class, 'show'])->name('price_show');
/* update
* @param {data_id, price, specialOffer, specialOfferPreviousPrice, tradeinDiscount, creditDiscount, insuranceDiscount, maxDiscount}
*/
Route::post('/xml/price/update', [App\Http\Controllers\PriceListController::class, 'update'])->name('price_update');
/* destroy
* @param {data_id}
*/
Route::post('/xml/price/destroy', [App\Http\Controllers\PriceListController::class, 'destroy'])->name('price_destroy');

//?SteeringWheel
//all

//parse

/* show
* @param
*/


/* update
* @param
*/


/* destroy
* @param
*/