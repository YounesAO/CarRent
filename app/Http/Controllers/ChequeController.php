<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use Illuminate\Http\Request;

class ChequeController extends Controller
{
    public function index()
    {
        
        $cheques = Cheque::where('dateCheque','>=',date('Y-m-d'))->get();
        return view('Pages.Reservation.cheques',['cheques'=>$cheques]);
    }
    public function all()
    {
        
        $cheques = Cheque::all();
        return view('Pages.Reservation.cheques',['cheques'=>$cheques,'bool'=>true]);
    }
}
