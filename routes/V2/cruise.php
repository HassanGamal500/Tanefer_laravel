<?php

Route::get('/', [\App\Http\Controllers\ApiV2\Front\CruiseController::class,'index']);

Route::get('/{id}' , [\App\Http\Controllers\ApiV2\Front\CruiseController::class,'show']);


Route::get('/{id}/availability' , [\App\Http\Controllers\ApiV2\Front\CruiseController::class,'availability']);

Route::post('/{id}/calculate-price' , [\App\Http\Controllers\ApiV2\Front\CruiseController::class,'calculatePrice']);

Route::post('/{id}/booking' , [\App\Http\Controllers\ApiV2\Front\CruiseController::class,'book']);
