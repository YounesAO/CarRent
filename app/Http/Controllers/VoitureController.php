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
    public function getAll()
    {
        $voitures = Voiture::all();
        return(view('Pages.dashboard.cars',['cars'=>$voitures]));

    }
    public function index(){
        $voitures = Voiture::all();
       Charge::where('deleted_at',null)->delete();
        // foreach ($voitures as $v){
        //     $v->stats = DB::select('select * from reservation where idVoiture = ? order by dateRetour',[$v->s]);
        // }
        // dd($voitures);
        return view('catalogue',['voitures'=>$voitures]);
    }
    public function view($id){

        $voiture = Voiture::where('id', $id)->first();
        $reservations=Reservation::where('idVoiture',$id)->get();
        return view('Pages.Voiture.info',['car'=>$voiture,'reservations'=>$reservations]);
    }  
    public function edit($id){
        $marque = Marque::all();
        $voiture = Voiture::where('id', $id)->first();
        return view('Pages.Voiture.edit',['car'=>$voiture,'marque'=>$marque]);
    }
    public function store(Request $request): RedirectResponse{
        $marque =Marque::where('marque',$request->marque)->first();
        if($marque==null){
        $marque=new Marque(['marque'=>$request->marque]);
            $marque->save();
        }
        $model =Modele::where('model',$request->model)->where('annee',$request->anneeModel)->first();
        if($model==null){
        $model=new Modele(['idMarque'=>$marque->idMarque,'model'=>$request->model,'annee'=>$request->anneeModel]);
            $model->save();

        }
        $car = Voiture::create($request->all());

        if($request->hasFile('image')){
            $fileName = 'cars/'.$marque->marque.'_'.time() .'.' . $request->image->extension();
            $path = $request->file('image')->move(public_path('/images/cars/'),$fileName);
            $car->update(['image'=> $fileName]);

        }
        $car->update(['idModel'=> $model->idModel]);
        $car->update(['image'=> $fileName]);
        dd($request);

        return redirect('/cars');
    }
    public function update(Request $request,Voiture $voiture){
        $marque =Marque::where('marque',$request->marque)->first();
        if($marque==null){
        $marque=new Marque(['marque'=>$request->marque]);
            $marque->save();
        }
        $model =Modele::where('model',$request->model)->where('annee',$request->anneeModel)->first();
        if($model==null){
        $model=new Modele(['idMarque'=>$marque->idMarque,'model'=>$request->model,'annee'=>$request->anneeModel]);
            $model->save();

        }
        $voiture->update($request->all());
        if($request->image !=null){
            $fileName = 'cars/'.$marque->marque.'_'.time() .'.' . $request->image->extension();
            $path = $request->file('image')->move(public_path('/images/cars/'),$fileName);
            $voiture->update(['image'=> $fileName]);

        }
        
        $voiture->update(['idModel'=> $model->idModel]);
        dd($request);
        return redirect('/cars');
    }
    public function delete(Request $request,Voiture $voiture){
        $voiture->delete();
        return redirect('/cars');
    }
}
