<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('pages.home'); });
Route::get('/about', function () { return view('pages.about'); });
Route::get('/contact', function () { return view('pages.contact'); });

Route::get('/students', function () { return view('pages.students'); });
Route::get('/students/{student}/edit', [StudentController::class, 'edit']);

Route::get('/accounts', [AccountController::class, 'index']);
Route::get('/accounts/{account}/edit',[AccountController::class, 'edit']);
Route::get('/accounts/{account}/show',[AccountController::class, 'show']);