<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    dump((new \App\Classes\WebSocketServer\ConfigAppProvider())->all());
});

Route::get('/resetServer', function () {
    \Illuminate\Support\Facades\Artisan::call("websockets:restart");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource("applications", \App\Http\Controllers\ApplicationController::class)->except(["store", "update"]);
Route::match(["put", "post"], "applications", [\App\Http\Controllers\ApplicationController::class,"store"])->name("applications.store");
