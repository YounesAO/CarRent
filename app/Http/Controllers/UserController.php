<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

   /*
        mise ajour les données d'utilisateur 
    */
    public function update(Request $request)
    {
        //recuperatioin de l'utilisateur par id de session Auth
        $user = User::find(Auth::user()->idUtilisateur);
        $request->validate(
            [
            'email'=>'email|required'
            ],
            ['email.required'=>"l'adresse email est obligatoire",
            'email.email'=>"l'adresse email non validée",
        ]);
        //mise a jour des champs 
        $user->nomUtilisateur = $request->nomUtilisateur;
        $user->prenomUtilisateur = $request->prenomUtilisateur;
        $user->email = $request->email;
        //si le mot de passe est modifié
        if($request->password !=null){
            $request->validate([
                'password' => 'min:6|required_with:repassword|same:repassword',
                'repassword' => 'min:6',
            ],[
                'password.required' => 'le mot de passe est obligatoire',
                'password.min' => 'le mot de passe doit etre plus du 6 caractères',
                'password.same' => 'la confirmation de mot de passe doit etre identique au mot de passe',
                'password.required_with' => 'la confirmation de mot de passe doit etre identique au mot de passe',
                'repassword.min' =>'la confirmation de mot de passe doit etre plus de 6 caractères',
            ]
        );
        //hashage de mot de passe
            $user->password = Hash::make($request->password);
        }  
        
        //enregistrer les modification
        $user->save();

        return back()->with("status","les données de itlilsateur ont été modifiée");
    }
}
