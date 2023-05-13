<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Piece;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function index (){
        
        return view('Pages.settings.index');
    }
    public function compte (){
        $user = Auth::user();
        return view('Pages.settings.userEdite',['user'=>$user]);
    }
    public function general (){
        $pieces = Piece::all();
        $marques = Marque::with('models')->get();
        return view('Pages.settings.general',['marques'=>$marques,'pieces'=>$pieces]);
    }
}
