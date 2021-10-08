<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\LinkShortener;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/link/{id}', [LinkShortener::class, 'link']);
Route::get('/linkshortener', [LinkShortener::class, 'linkshortener']);
Route::post('/link/create', [LinkShortener::class, 'create']);
