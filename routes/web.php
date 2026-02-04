<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/','home');
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit','job');
Route::resource('jobs', JobController::class)->except(['create','edit']);

Route::view('/contact','contact');


Route::get('/login',[LoginController::class,'create'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::delete('/login',[LoginController::class,'destroy']);

Route::get('/register',[RegisterController::class,'create'])->name('register');
Route::post('/register',[RegisterController::class,'store']);
