<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostReportController;

Route::get('/', function () {
    return redirect()->route('posts.index');
});
Route::get('/posts/reports', [PostReportController::class, 'index'])
    ->name('posts.reports.index');

Route::get('/posts/reports/pdf', [PostReportController::class, 'exportPdf'])
    ->name('posts.reports.pdf');

Route::get('/posts/reports/csv', [PostReportController::class, 'exportCsv'])
    ->name('posts.reports.csv');

Route::resource('posts', PostController::class);
Route::resource('posts', PostController::class);
