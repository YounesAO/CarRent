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

    public function index()
    {
        $users = User::all();
        return view('login', ['users' => $users]);
    }
    public function update(Request $request)
    {

        $user = User::find(Auth::user()->idUtilisateur);
        $request->validate([
            'email'=>['email'],
        ]);

        $user->nomUtilisateur = $request->nomUtilisateur;
        $user->prenomUtilisateur = $request->prenomUtilisateur;
        $user->email = $request->email;

        if($request->password !=null){
            $request->validate([
                'password' => 'min:6|required_with:repassword|same:repassword',
                'repassword' => 'min:6',
            ]);
            $user->password = Hash::make($request->password);
        }  
        
        
        $user->save();

        return view('login', ['users' => [$user]]);
    }
}
