<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\XmlController;



Route::get('/xml', [XmlController::class, 'index']);
Route::post('/xml/parse', [XmlController::class, 'store'])->name('xml-loader');
