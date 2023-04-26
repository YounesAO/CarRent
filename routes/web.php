<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EntretientController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\UserController;
use App\Models\Entretient;
use App\Models\Reservation;
use App\Models\User;

use App\Models\Voiture;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('login',['users'=>User::all()]);

});
Route::get('/welcome', function () {
    return view('welcome');
});
Route::post('welcome',function(){
    return redirect('cars');
});

Route::get('/cars', [VoitureController::class, 'index']);
Route::get('/cars/{id}', [VoitureController::class, 'view']);
Route::get('/cars/{id}/edit', [VoitureController::class, 'edit']);
Route::post('/cars/{voiture}/edit', [VoitureController::class,'update']);
Route::get('/cars/{voiture}/delete', [VoitureController::class,'delete']);
Route::post('/add/car', [VoitureController::class, 'store']);
Route::get('/add/car',function () {
    return view('Pages.Voiture.add');
});

Route::get('/add/reservation',function () {
    return view('Pages.Reservation.add');
});
Route::get('/add/reservation/{id}', function ($id) {
    return view('Pages.Reservation.add',['voiture'=>$id]);
});
Route::post('/add/reservation/{id}', [ReservationController::class, 'prepare']);

Route::post('/add/client', [ClientController::class, 'store']);
Route::post('/check/client', [ReservationController::class, 'store']);

Route::get('/dashboard',function () {
    return view('Pages.dashboard.home');
});
Route::get('dashboard/entretient',[EntretientController::class,'index']);
Route::get('add/entretient/{voiture}',[EntretientController::class,'fill']);
Route::post('add/entretient/{voiture}',[EntretientController::class,'store']);

Route::get('/dashboard/cars',[VoitureController::class,'getAll']);
Route::get('/dashboard/reservation',[ReservationController::class,'index']);

Route::get('/check/reservation/{id}',[ReservationController::class,'show']);

Route::get('/home', function () {
    return view('home');
});

