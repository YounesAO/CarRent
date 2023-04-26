<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class VoitureController extends Controller
{
    public function getAll()
    {
        $voitures = Voiture::all();
        return(view('Pages.dashboard.cars',['cars'=>$voitures]));

    }
    public function index(){

        $voitures = Voiture::all();
        // foreach ($voitures as $v){
        //     $v->stats = DB::select('select * from reservation where idVoiture = ? order by dateRetour',[$v->s]);
        // }
        // dd($voitures);
        return view('catalogue',['voitures'=>$voitures]);
    }
    public function view($id){

        $voiture = Voiture::where('id', $id)->first();
        return view('Pages.Voiture.info',['car'=>$voiture]);
    }  
    public function edit($id){

        $voiture = Voiture::where('id', $id)->first();
        return view('Pages.Voiture.edit',['car'=>$voiture]);
    }
    public function store(Request $request): RedirectResponse{
        Voiture::create($request->all());
        return redirect('/cars');
    }
    public function update(Request $request,Voiture $voiture){
        $voiture->update($request->all());
        return redirect('/cars');
    }
    public function delete(Request $request,Voiture $voiture){
        $voiture->delete();
        return redirect('/cars');
    }
}
