<?php

namespace App\Observers;

use App\Models\Modele;

class ModeleObserver
{
    /**
     * Handle the Modele "created" event.
     */
    public function created(Modele $modele): void
    {
        //
    }

    /**
     * Handle the Modele "updated" event.
     */
    public function updated(Modele $modele): void
    {
        //
    }

    /**
     * Handle the Modele "deleted" event.
     */
    public function deleted(Modele $modele): void
    {
        $modele->cars->delete();
    }

    /**
     * Handle the Modele "restored" event.
     */
    public function restored(Modele $modele): void
    {
        //
    }

    /**
     * Handle the Modele "force deleted" event.
     */
    public function forceDeleted(Modele $modele): void
    {
        //
    }
}
