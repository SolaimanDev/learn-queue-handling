<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QueController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('create-users', [QueController::class, 'index']);
Route::get('transfer', [QueController::class, 'transfer']);


Route::get('log-viewer', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);