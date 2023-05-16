<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\Reservation;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class ClientObserver
{
    /**
     * Handle the Client "created" event.
     */
    public function created(Client $client): void
    {
        //
    }

    /**
     * Handle the Client "updated" event.
     */
    public function updated(Client $client): void
    {
        //
    }

    /**
     * Handle the Client "deleted" event.
     */
    public function deleted(Client $client): void
    {
        Reservation::where('idClient',$client->idClient)->delete();

    }

    /**
     * Handle the Client "restored" event.
     */
    public function restored(Client $client): void
    {
    Reservation::withTrashed()->where('idClient',$client->idClient)->restore();

    }

    /**
     * Handle the Client "force deleted" event.
     */
    public function forceDeleted(Client $client): void
    {
        //
    }
}
