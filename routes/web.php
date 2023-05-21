<?php

use App\Http\Controllers\ChargeController;
use App\Http\Controllers\ChargeEntrepriseController;
use App\Http\Controllers\ChargeVoitureController;
use App\Http\Controllers\ChequeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EntretientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ModeleController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\PieceController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\VoitureController;
use App\Http\Controllers\UserController;
use App\Models\Charge;
use App\Models\ChargeEntreprise;
use App\Models\ChargeVoiture;
use App\Models\Cheque;
use App\Models\Client;
use App\Models\Entretient;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\PieceChangee;
use App\Models\Reservation;
use App\Models\User;

use App\Models\Voiture;
use GuzzleHttp\Psr7\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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



Route::get('/', [LoginController::class,'index'])->name('login');

Route::post('/login',[LoginController::class,'login']);

//middleware authetification group starts
Route::group(['middleware' => 'auth'], function () {

Route::get('/logout',[LoginController::class,'logout']);

//catalogue des voitures
Route::get('/cars', [VoitureController::class, 'index']);
Route::get('/cars/{id}', [VoitureController::class, 'view'])->name('voiture');



/*Gestion des Voitures  #Create #Update #delete :*/

Route::get('/cars/{id}/edit', [VoitureController::class, 'edit']);
Route::post('/cars/{voiture}/edit', [VoitureController::class,'update']);
Route::get('/cars/{voiture}/delete', [VoitureController::class,'delete']);
Route::post('/add/car', [VoitureController::class, 'store']);
Route::get('/add/car',function () {
    return view('Pages.Voiture.add',['marque'=>Marque::all()]);
});

/*Gestion des reservation  #Create :*/
Route::get('/new/reservation',function (Request $request) {
    if(isset($request->client)){
    $client = Client::where('idClient',$request->client)->first();
    return view('Pages.Reservation.new',['client'=>$client]);

    }
    return view('Pages.Reservation.new');

});

Route::post('/new/reservation',[ReservationController::class,'filter']);
Route::get('/new/reservation/car/{id}',[ReservationController::class,'send']);

Route::get('/add/reservation',function () {
    return view('Pages.Reservation.add');
});
Route::get('/add/reservation/{id}', function ($id) {
    return view('Pages.Reservation.add',['voiture'=>$id]);
});
Route::post('/add/reservation/{id}', [ReservationController::class, 'prepare']);

/*Cestion des Client :*/
Route::get('dashboard/Clients', [ClientController::class, 'all']);
Route::get('add/client',[ClientController::class,'add']);
Route::post('new/client',[ClientController::class,'insert']);
Route::get('edite/client/{client}',[ClientController::class,'edit']);
Route::post('edite/client/{client}',[ClientController::class,'update']);

Route::post('/add/client', [ClientController::class, 'store']);
Route::post('/check/client', [ReservationController::class, 'store']);
Route::get('/check/client/{client}', function($client){
    view('Pages.Reservation.add',['voiture'=>$client]);
});

/*Gestion des Entretiens :*/
Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('dashboard/entretient',[EntretientController::class,'index']);
Route::get('add/entretient/{voiture}',[EntretientController::class,'fill']);
Route::post('add/entretient/{voiture}',[EntretientController::class,'store']);

Route::get('/dashboard/cars',[VoitureController::class,'getAll']);
Route::get('/dashboard/reservation',[ReservationController::class,'index']);
Route::get('/dashboard/reservation/history',[ReservationController::class,'view']);
/*Gestion des Charge :*/

Route::get('/dashboard/charge', [ChargeController::class,'index']);
Route::get('/dashboard/charge/voiture',[ChargeVoitureController::class,'index']);
Route::get('/dashboard/charge/voiture/{voiture}',[ChargeVoitureController::class,'view']);
Route::post('/dashboard/charge/voiture/{voiture}',[ChargeVoitureController::class,'store']);

Route::get('dashboard/charge/entreprise',[ChargeEntrepriseController::class,'index']);
Route::post('dashboard/charge/entreprise',[ChargeEntrepriseController::class,'store']);
Route::get('/check/charge/{charge}',[ChargeController::class,'show']);
Route::get('/edite/charge/{charge}',[ChargeController::class,'update']);
Route::get('/delete/charge/{charge}',[ChargeController::class,'destroy']);

Route::get('/get-model',[ModeleController::class,'index']);

/*slide des reservation :*/

Route::get('/check/reservation/{id}',[ReservationController::class,'show']);
Route::post('edite/reservation/{reservation}',[ReservationController::class,'update']);
Route::get('/delete/reservation/{reservation}',[ReservationController::class,'destroy']);

Route::get('/slide/reservation',[ReservationController::class,'slide']);
Route::get('slide/car/reservation/{id}',[VoitureController::class,'slide']);
Route::get('/slide/reservation/unpaid',[ReservationController::class,'slideUpaid']);

/*Gestion des paiement des reservation :*/

Route::post('add/paiement/{reservation}',[PaiementController::class,'store']);
Route::post('edite/paiement/{paiement}',[PaiementController::class,'update']);

Route::get('dashboard/analyse',[RevenueController::class,'index']);
Route::post('dashboard/analyse',[RevenueController::class,'index']);
Route::get('dashboard/incom',[ChequeController::class,'index']);
Route::get('dashboard/incom/history',[ChequeController::class,'all']);
Route::get('dashboard/client',[ClientController::class,'index']);
Route::any('/profile/client',[ClientController::class,'view'])->name('client');
Route::get('/delete/client/{client}',[ClientController::class,'drop']);

/*Parametres de l'application :*/


Route::get('/settings',[SettingsController::class,'index']);
Route::get('/settings/user',[SettingsController::class,'compte']);
Route::post('/settings/user',[UserController::class,'update']);
Route::get('/settings/general',[SettingsController::class,'general']);
Route::get('/settings/deleted',[SettingsController::class,'deleted']);
Route::get('/settings/edite/marque/{marque}',[MarqueController::class,'index']);
Route::post('edite/marque',[MarqueController::class,'update']);
Route::get('/delete/marque/{marque}',[MarqueController::class,'destroy']);
Route::get('/settings/edite/model/{model}',[ModeleController::class,'edit']);
Route::post('/edite/model',[ModeleController::class,'update']);
Route::post('/delete/model/{model}',[ModeleController::class,'destroy']);
Route::get('/settings/edite/piece/{piece}',[PieceController::class,'edit']);
Route::post('/edite/piece',[PieceController::class,'update']);
Route::post('/delete/piece/{piece}',[PieceController::class,'destroy']);
Route::get('/notification',function (){
    return view('Pages.dashboard.notification',['cheques'=>Cheque::all(),'voitures'=>Voiture::all()]);
});
/* la restoration des éléments suprimmés*/
Route::get('/restore/reservation/{reservation}',[ReservationController::class,'restore']);
Route::get('/restore/client/{client}',[ClientController::class,'restore']);
Route::get('/restore/voiture/{voiture}',[voitureController::class,'restore']);


//end midleware group
});
