<?php

use App\Http\Controllers\ApiDocumentationController;
use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', fn () => redirect('/login'));
});

Route::middleware('auth')->group(function () {
    Route::get('/docs', [ApiDocumentationController::class, 'index'])->name('scribe');
    Route::get('/postman', [ApiDocumentationController::class, 'postman'])->name('scribe.postman');
    Route::get('/openapi', [ApiDocumentationController::class, 'openapi'])->name('scribe.openapi');
});
