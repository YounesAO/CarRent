<?php

use App\Http\Controllers\ChargeController;
use App\Http\Controllers\ChargeEntrepriseController;
use App\Http\Controllers\ChargeVoitureController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntretientController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\UserController;
use App\Models\Charge;
use App\Models\ChargeEntreprise;
use App\Models\ChargeVoiture;
use App\Models\Entretient;
use App\Models\Marque;
use App\Models\Reservation;
use App\Models\User;

use App\Models\Voiture;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Request;
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
Route::get('/cars/{id}', [VoitureController::class, 'view'])->name('voiture');
Route::get('/cars/{id}/edit', [VoitureController::class, 'edit']);
Route::post('/cars/{voiture}/edit', [VoitureController::class,'update']);
Route::get('/cars/{voiture}/delete', [VoitureController::class,'delete']);
Route::post('/add/car', [VoitureController::class, 'store']);
Route::get('/add/car',function () {
    return view('Pages.Voiture.add',['marque'=>Marque::all()]);
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
Route::get('/check/client/{client}', function($client){
    view('Pages.Reservation.add',['voiture'=>$client]);
})->name('client');

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('dashboard/entretient',[EntretientController::class,'index']);
Route::get('add/entretient/{voiture}',[EntretientController::class,'fill']);
Route::post('add/entretient/{voiture}',[EntretientController::class,'store']);

Route::get('/dashboard/cars',[VoitureController::class,'getAll']);
Route::get('/dashboard/reservation',[ReservationController::class,'index']);
Route::get('/dashboard/reservation/history',[ReservationController::class,'view']);

Route::get('/dashboard/charge', [ChargeController::class,'index']);
Route::get('/dashboard/charge/voiture',[ChargeVoitureController::class,'index']);
Route::get('/dashboard/charge/voiture/{voiture}',[ChargeVoitureController::class,'view']);
Route::post('/dashboard/charge/voiture/{voiture}',[ChargeVoitureController::class,'store']);

Route::get('dashboard/charge/entreprise',[ChargeEntrepriseController::class,'index']);
Route::post('dashboard/charge/entreprise',[ChargeEntrepriseController::class,'store']);
Route::get('/check/charge/{charge}',[ChargeController::class,'show']);
Route::get('/edite/charge/{charge}',[ChargeController::class,'update']);

Route::get('/get-model',[ModeleController::class,'index']);


Route::get('/check/reservation/{id}',[ReservationController::class,'show']);
Route::post('edite/reservation/{reservation}',[ReservationController::class,'update']);
Route::post('add/paiement/{reservation}',[PaiementController::class,'store']);
Route::post('edite/paiement/{paiement}',[PaiementController::class,'update']);

Route::get('dashboard/analyse',[RevenueController::class,'index']);
Route::post('dashboard/analyse',[RevenueController::class,'index']);

Route::get('dashboard/client',[ClientController::class,'index']);

    
Route::get('/home', function () {
    return view('home');
});

