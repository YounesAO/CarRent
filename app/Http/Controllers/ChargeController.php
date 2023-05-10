<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Voiture;
use Illuminate\Http\Request;

class ChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('Pages.Charge.charge',['charges'=>Charge::all()]);
    
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
    public function show(Charge $charge)
    {
        return view('Pages.Charge.charge-info',['title'=>'Information sur les charge','charge'=>$charge]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Charge $charge)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Charge $charge)
    {
        $charge->update($request->all());
        return redirect('/check/charge/'.$charge->idCharge);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Charge $charge)
    {
        $charge->delete();
    }
}
