<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class LoginController extends Controller
{
    /*
        preparer le formulaire de login 
    */
    public function index()
    {
        return view('welcome');
    }

    /*
        logique d'authentification  
    */
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required|min:6'
        ],
        //messages d'erreurs 
        ['email.required'=>"l'adresse email est obligatoire",
        'email.email'=>"l'adresse email non validée",
        'password.required' => 'le mot de passe est obligatoire',
        'password' => 'le mot de passe doit etre plus du 6 caractères'
        ]);
        //attentation de login
        if(auth()->attempt($request->only(['email','password'])))
        return redirect('cars');
        //cas de coordonée non validées
        return back()->withErrors("Adresse email ou mot de passe incorrect");
    }
    /*
        la deconnection 
    */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
