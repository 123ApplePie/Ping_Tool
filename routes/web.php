<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/gebruikers',[IndexController::class,'users']);
    Route::match(['get', 'post'], '/gebruikers/toevoegen', [IndexController::class, 'userAdd']);
    
    Route::get('/',[IndexController::class,'index'])->name('index');
    Route::get('/ping', [IndexController::class, 'pingForm']);
    Route::post('/ping', [IndexController::class, 'ping']);
    Route::get('/whois',[IndexController::class, 'whois']);
    Route::get('/urlshort', [IndexController::class, 'urlshort']);
});
