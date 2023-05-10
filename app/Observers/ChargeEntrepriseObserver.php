<?php

namespace App\Observers;

use App\Models\ChargeEntreprise;

class ChargeEntrepriseObserver
{
    /**
     * Handle the ChargeEntreprise "created" event.
     */
    public function created(ChargeEntreprise $chargeEntreprise): void
    {
        //
    }

    /**
     * Handle the ChargeEntreprise "updated" event.
     */
    public function updated(ChargeEntreprise $chargeEntreprise): void
    {
        //
    }

    /**
     * Handle the ChargeEntreprise "deleted" event.
     */
    public function deleted(ChargeEntreprise $chargeEntreprise): void
    {
        $chargeEntreprise->charge->delete();
    }

    /**
     * Handle the ChargeEntreprise "restored" event.
     */
    public function restored(ChargeEntreprise $chargeEntreprise): void
    {
        //
    }

    /**
     * Handle the ChargeEntreprise "force deleted" event.
     */
    public function forceDeleted(ChargeEntreprise $chargeEntreprise): void
    {
        //
    }
}
