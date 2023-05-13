<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use Illuminate\Http\Request;

class PieceController extends Controller
{
    public function edit(Piece $piece)
    {
        return view('Pages.settings.editePiece',['piece'=>$piece]);
    }
    public function update (Request $request )
    {
        $piece = Piece::find($request->idPiece);
        $piece->nom = $request->nom;
        $piece->prix = $request->prix;
        $piece->description = $request->description;
        $piece->maxKilo = $request->maxKilo;
        $piece->maxDurre = $request->maxDurre;
        if($request->hasFile('img')){
            $fileName = 'stats/'.$piece->nom.'_'.time() .'.' . $request->img->extension();
            $path = $request->file('img')->move(public_path('/images/stats/'),$fileName);
            $piece->update(['img'=> $fileName]);

        }
        $piece->save();
        return redirect('settings/general')->with(['status' => "les informations de Piece ont été modifier par success"]);
    }
    public function destroy(Piece $piece )
    {
        $piece->delete();
    }
}
