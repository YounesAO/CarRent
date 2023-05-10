<?php

namespace App\Observers;

use App\Models\Entretient;

class EntretientObserver
{
    /**
     * Handle the Entretient "created" event.
     */
    public function created(Entretient $entretient): void
    {
        //
    }

    /**
     * Handle the Entretient "updated" event.
     */
    public function updated(Entretient $entretient): void
    {
        //
    }

    /**
     * Handle the Entretient "deleted" event.
     */
    public function deleted(Entretient $entretient): void
    {
        $entretient->chargevoiture->delete();
        $entretient->pieceChangee->delete();

    }

    /**
     * Handle the Entretient "restored" event.
     */
    public function restored(Entretient $entretient): void
    {
        //
    }

    /**
     * Handle the Entretient "force deleted" event.
     */
    public function forceDeleted(Entretient $entretient): void
    {
        //
    }
}
