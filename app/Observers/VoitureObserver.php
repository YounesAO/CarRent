<?php

namespace App\Observers;

use App\Models\Charge;
use App\Models\Reservation;
use App\Models\Voiture;

class VoitureObserver
{
    /**
     * Handle the Voiture "created" event.
     */
    public function created(Voiture $voiture): void
    {
        //
    }

    /**
     * Handle the Voiture "updated" event.
     */
    public function updated(Voiture $voiture): void
    {
        //
    }

    /**
     * Handle the Voiture "deleted" event.
     */
    public function deleted(Voiture $voiture): void
    {   
            $voiture->chargesvoi()->delete();
            $voiture->reservations()->delete();
            
    }

    /**
     * Handle the Voiture "restored" event.
     */
    public function restored(Voiture $voiture): void
    { 
        echo'hi';
        die();

    }

    /**
     * Handle the Voiture "force deleted" event.
     */
    public function forceDeleted(Voiture $voiture): void
    {
        //
    }
}
