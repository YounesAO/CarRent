<?php

namespace App\Observers;

use App\Models\Charge;
use App\Models\ChargeEntreprise;
use App\Models\ChargeVoiture;
use App\Models\Entretient;

class ChargeObserver
{
    /**
     * Handle the Charge "created" event.
     */
    public function created(Charge $charge): void
    {
        //
    }

    /**
     * Handle the Charge "updated" event.
     */
    public function updated(Charge $charge): void
    {
        //
    }

    /**
     * Handle the Charge "deleted" event.
     */
    public function deleted(Charge $charge): void
    {  
        
        $chargeVoiture = ChargeVoiture::where('idChargeVoiture',$charge->idChargeVoiture)->first();
        Entretient::where('idEntretient',$chargeVoiture->idEntretient)->delete();
        $chargeVoiture->delete();
        ChargeEntreprise::where('idChargeEntreprise',$charge->idChargeEntreprise)->delete();

    }

    /**
     * Handle the Charge "restored" event.
     */
    public function restored(Charge $charge): void
    {
        ChargeVoiture::withTrashed()->where('idChargeVoiture',$charge->idChargeVoiture)->restore();
        ChargeEntreprise::withTrashed()->where('idChargeEntreprise',$charge->idChargeEntreprise)->restore();


    }

    /**
     * Handle the Charge "force deleted" event.
     */
    public function forceDeleted(Charge $charge): void
    {
        //
    }
}
