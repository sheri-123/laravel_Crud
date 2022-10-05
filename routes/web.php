<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\studentcontroller;


Route::get('students',[studentcontroller::class,'index']);
Route::get('add-product',[studentcontroller::class,'create']);
Route::post('add-product',[studentcontroller::class,'store']);
Route::get('edit-product/{id}',[studentcontroller::class,'edit']);
Route::put('update-product/{id}',[studentcontroller::class,'update']);
Route::get('delete-product/{id}',[studentcontroller::class,'destroy']);








Route::get('/', function () {
    return view('welcome');
});
