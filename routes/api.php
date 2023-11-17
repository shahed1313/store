<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductUserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StorehouseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::get('mymy',[\App\Http\Controllers\Controller::class,'mymy']);

Route::post('upd',[ProductController::class,'up']);


Route::post('photo',[ImageController::class,'shahed']);

Route::post('addCategory',[CategoryController::class,'store']);

Route::post('addProduct',[ProductController::class,'store']);
Route::get('getProduct',[ProductController::class,'getproduct']);
Route::delete('deleteProduct',[ProductController::class,'delete']);


Route::post('waiting',[ProductUserController::class,'store']);

Route::post('buyproduct',[ProductUserController::class,'buyproduct']);


Route::post('add/commentproduct',[CommentController::class,'store']);
Route::get('get/commentproduct',[CommentController::class,'get']);
Route::delete('delete/commentproduct',[CommentController::class,'delete']);
Route::post('update/commentproduct',[CommentController::class,'update']);

Route::post('add/restore',[ReportController::class,'restore']);

Route::post('searchMedst',[StorehouseController::class,'searchMedst']);

Route::post('medpost',[MedicineController::class,'medpost']);
Route::get('medget',[MedicineController::class,'medget']);
Route::post('buyMedicine',[MedicineController::class,'buyMedicine']);
Route::post('searchMedst',[MedicineController::class,'searchMedst']);


Route::get('getbill',[ReportController::class,'getbill']);


