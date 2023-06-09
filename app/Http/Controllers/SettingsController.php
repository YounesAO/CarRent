<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Marque;
use App\Models\Piece;
use App\Models\Reservation;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{

    /*
    ## Controlleur ne contient pas de model il 
        definie les view de padge paramètre de app
    */
    public function index (){
        return view('Pages.settings.index');
    }
//parametre de compte utilisateur
    public function compte (){
        $user = Auth::user();
        return view('Pages.settings.userEdite',['user'=>$user]);
    }
//parametre des option de la base de donées
    public function general (){
        $pieces = Piece::all();
        $marques = Marque::with('models')->get();
        return view('Pages.settings.general',['marques'=>$marques,'pieces'=>$pieces     ]);
    }
//les elements supprimées
    public function deleted(){
        $client = Client::onlyTrashed()->get();
        $voitures = Voiture::onlyTrashed()->get();
        $Reservation = Reservation::onlyTrashed()->get();
        return view('Pages.settings.deleted',['clients'=>$client,"voitures"=>$voitures,"reservations"=>$Reservation]);
    }
}
