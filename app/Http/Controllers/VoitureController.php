<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\ChargeVoiture;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Reservation;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

use function PHPUnit\Framework\isEmpty;

class VoitureController extends Controller
{
    /*
        retourner toutes les voitures  
    */
    public function getAll()
    {
        $voitures = Voiture::all();
        return(view('Pages.dashboard.cars',['cars'=>$voitures]));

    }
    /*
        preparer catalogue les voitures  
    */
    public function index(){
        $voitures = Voiture::all();
        return view('catalogue',['voitures'=>$voitures]);
    }
    /*
        afficher un e voiture par identifiant 
    */
    public function view($id){
        $voiture = Voiture::where('id', $id)->first();
        $reservations=Reservation::where('idVoiture',$id)->get();

        //data for chart 
        $data = [];
            foreach($reservations as $r){
                $data[]=["date"=>$r->dateDebut,"montant"=>$r->montant,"duree"=> $r->duree];
            }
        $totalChargeVoiture = RevenueController::chargeVoiture('2020-02-09',date('Y-m-d'),$id)->pluck('montant')->sum();
        return view('Pages.Voiture.info',['car'=>$voiture,'reservations'=>$reservations,'data'=>$data,'totalChargeVoiture'=>$totalChargeVoiture]);
    }  
    /*
        Modifier une voiture par identifiant 
    */
    public function edit($id){
        $marque = Marque::all();
        $voiture = Voiture::where('id', $id)->first();
        return view('Pages.Voiture.edit',['car'=>$voiture,'marque'=>$marque]);
    }
    /*
        enregistrer une voiture  sur la base de données 
    */
    public function store(Request $request): RedirectResponse{

        $marque =Marque::where('marque',$request->marque)->first();
        //Si la marque n'existe pas
        if($marque==null){
        $marque=new Marque(['marque'=>$request->marque]);
            $marque->save();
        }

        $model =Modele::where('model',$request->model)->where('annee',$request->anneeModel)->first();
        //si le model n'existe pas
        if($model==null){
        $model=new Modele(['idMarque'=>$marque->idMarque,'model'=>$request->model,'annee'=>$request->anneeModel]);
            $model->save();
        }
        //creation de la voiture
        $car =new Voiture($request->all());

        //importer les images s'elles existent
        if($request->hasFile('image')){
            $fileName = 'cars/'.$marque->marque.'_'.time() .'.' . $request->image->extension();
            $path = $request->file('image')->move(public_path('/images/cars/'),$fileName);
            $car->image = $fileName;
        }
        //enregister les modifications et query
        $car->idModel = $model->idModel;
        $car->save();
        //redirect to the catalogue 
        return redirect('/cars');
    }
    /*
        mise a jour des information de voiture donnée 
    */
    public function update(Request $request,Voiture $voiture)
    {
        $marque =Marque::where('marque',$request->marque)->first();
        //Si la marque n'existe pas
        if($marque==null){
        $marque=new Marque(['marque'=>$request->marque]);
            $marque->save();
        }

        $model =Modele::where('model',$request->model)->where('annee',$request->anneeModel)->first();
        //Si le model n'existe pas
        if($model==null){
        $model=new Modele(['idMarque'=>$marque->idMarque,'model'=>$request->model,'annee'=>$request->anneeModel]);
            $model->save();
        }
        //mise à jour des attributes voiture
        $voiture->update($request->all());
        //traitement des images s'elles existent
        if($request->image !=null){
            $fileName = 'cars/'.$marque->marque.'_'.time() .'.' . $request->image->extension();
            $path = $request->file('image')->move(public_path('/images/cars/'),$fileName);
            $voiture->update(['image'=> $fileName]);
        }
        //enregister les modification sur la base de données
        $voiture->update(['idModel'=> $model->idModel]);
        //redirect to the catalogue
        return redirect('/cars');
    }
    /*
        suprimmer une voiture par son identifiant 
    */
    public function delete(Request $request,Voiture $voiture){
        $voiture->delete();
        return redirect('/cars');
    }
    /*
        restaurer une voiture par son identifiant 
    */
    function restore ($id){
        Voiture::withTrashed()->where('id', $id)->restore();
        return Redirect('settings/deleted')->with('status',"la Voiture a été bien restaurée");
    }
    
}

//end_Voiture