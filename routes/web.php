<?php
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\UserController;
use App\Models\Voiture;
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
    return view('welcome');
});
Route::get('/login', [UserController::class, 'index']);
Route::get('/cars', [VoitureController::class, 'index']);
Route::get('/cars/{id}', [VoitureController::class, 'view']);
Route::get('/cars/{id}/edit', [VoitureController::class, 'edit']);
Route::get('/add/car',function () {
    return view('addCar');
});
Route::post('/cars/{voiture}/edit', [VoitureController::class,'update']);
Route::get('/cars/{voiture}/delete', [VoitureController::class,'delete']);

Route::post('/add/car', [VoitureController::class, 'store']);


Route::get('/home', function () {
    return view('home');
});

