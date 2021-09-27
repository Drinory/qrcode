<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function() {
    $code = \QrCode::generate('instagram');
    return view('index')->with('code', $code);
});

// GENERATE
Route::get('qrcode/{link}', [CodeController::class, 'generate'])->name('generate');

Route::get('api/generate', [CodeController::class, 'api_generate'])->name('api.generate');

Route::get('/pro', function(){
    return phpinfo();
});
