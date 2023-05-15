<?php

namespace App\Observers;

use App\Models\Charge;
use App\Models\ChargeVoiture;
use App\Models\Entretient;

class ChargeVoitureObserver
{
    /**
     * Handle the ChargeVoiture "created" event.
     */
    public function created(ChargeVoiture $chargeVoiture): void
    {
        //
    }

    /**
     * Handle the ChargeVoiture "updated" event.
     */
    public function updated(ChargeVoiture $chargeVoiture): void
    {
        //
    }

    /**
     * Handle the ChargeVoiture "deleted" event.
     */
    public function deleted(ChargeVoiture $chargeVoiture): void
    {
        Charge::where('idChargeVoiture',$chargeVoiture->idChargeVoiture)->delete();
        Entretient::where('idEntretient',$chargeVoiture->idEntretient)->delete();
    }

    /**
     * Handle the ChargeVoiture "restored" event.
     */
    public function restored(ChargeVoiture $chargeVoiture): void
    {
        Charge::withTrashed('idChargeVoiture',$chargeVoiture->idChargeVoiture)->restore();
        Entretient::withTrashed('idEntretient',$chargeVoiture->idEntretient)->restore();


    }

    /**
     * Handle the ChargeVoiture "force deleted" event.
     */
    public function forceDeleted(ChargeVoiture $chargeVoiture): void
    {
        //
    }
}
