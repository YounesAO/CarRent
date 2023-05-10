<?php

namespace App\Providers;

use App\Models\Charge;
use App\Models\ChargeEntreprise;
use App\Models\ChargeVoiture;
use App\Models\Client;
use App\Models\Entretient;
use App\Models\Marque;
use App\Models\Modele;
use App\Models\Paiement;
use App\Models\Voiture;
use App\Observers\ChargeEntrepriseObserver;
use App\Observers\ChargeObserver;
use App\Observers\ChargeVoitureObserver;
use App\Observers\ClientObserver;
use App\Observers\EntretientObserver;
use App\Observers\MarqueObserver;
use App\Observers\ModeleObserver;
use App\Observers\PaiementObserver;
use App\Observers\VoitureObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Voiture::observe(VoitureObserver::class);
        Charge::observe(ChargeObserver::class);
        ChargeVoiture::observe(ChargeVoitureObserver::class);
        ChargeEntreprise::observe(ChargeEntrepriseObserver::class);
        Client::observe(ClientObserver::class);
        Marque::observe(MarqueObserver::class);
        Modele::observe(ModeleObserver::class);
        Paiement::observe(PaiementObserver::class);
        Entretient::observe(EntretientObserver::class);

    }
}
