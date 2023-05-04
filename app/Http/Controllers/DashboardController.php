<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Voiture;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('Pages.dashboard.home',['cars'=>Voiture::all(),'reservations'=>$reservations]);

    }
}
