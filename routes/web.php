<?php

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;

Route::prefix('/series')->group(function () {
  Route::get('/', [SeriesController::class, 'index'])->name('series.index');
  Route::get('/create', [SeriesController::class, 'create'])->name('series.create');
  Route::post('/create', [SeriesController::class, 'store'])->name('series.store');
  Route::delete('/delete/{id}', [SeriesController::class, 'destroy'])->name('series.delete');
  
  Route::get('/{serieId}', [SeasonsController::class, 'index'])->name('serie.index');
});