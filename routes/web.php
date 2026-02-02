<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/','home');

Route::resource('jobs', JobController::class);

Route::view('/contact','contact');


Route::get('/login',[LoginController::class,'create'])->name('login');
Route::post('/login',[LoginController::class,'store']);
