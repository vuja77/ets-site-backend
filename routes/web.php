<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view(public_path() . '\uploads\kurs2\scormcontent\index.html');
});
Route::get('/{path?}', function () {
    return view('app'); // 'app' je naziv Vue.js ili React komponente
})->where('path', '.*');