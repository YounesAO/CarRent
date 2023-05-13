<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Models\Modele;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $NOM = $request->input('marque');
        $marque = Marque::where('marque',$NOM)->first();
        
        $modeles = Modele::where('idMarque', $marque->idMarque)->get();
        return response()->json($modeles);

        }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Modele $modele)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modele $model)
    {
        return view('Pages.settings.editeModel',['model'=>$model]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $model= modele::find($request->idModel);
        $model->update($request->all());
        return redirect('settings/general')->with(['status' => "le model a été modifier par success"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modele $model)
    {
        $model->delete();
        return(redirect('/settings/general')->with('status', 'le Model a été supprimer par success'));

    }
}
