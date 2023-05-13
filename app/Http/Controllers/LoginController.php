<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class LoginController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required'
        ]);
        if(auth()->attempt($request->only(['email','password'])))
        return redirect('cars');
        return 'no connection';

    }
}
