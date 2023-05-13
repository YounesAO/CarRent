<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    public function index(Marque $marque)
    {
        return(view('Pages.settings.editeMarque',['marque'=>$marque]));
    }
    public function update(Request $request)
    {
        $marque = Marque::find($request->idMarque);
        $marque->update($request->all());
        return(redirect('/settings/general')->with('status', 'Marque a été modifier par success'));
    }
    public function destroy( $id)
    {           
        $marque = Marque::where('idMarque',$id);
        $marque->delete();
        return(redirect('/settings/general')->with('status', 'Marque a été supprimer par success'));

    }
}
