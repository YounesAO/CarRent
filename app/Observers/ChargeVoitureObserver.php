<?php

namespace App\Observers;

use App\Models\ChargeVoiture;

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
        $chargeVoiture->ChargesVoiture->delete();
    }

    /**
     * Handle the ChargeVoiture "restored" event.
     */
    public function restored(ChargeVoiture $chargeVoiture): void
    {
        //
    }

    /**
     * Handle the ChargeVoiture "force deleted" event.
     */
    public function forceDeleted(ChargeVoiture $chargeVoiture): void
    {
        //
    }
}
