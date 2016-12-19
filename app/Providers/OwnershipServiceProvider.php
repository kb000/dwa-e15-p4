<?php

namespace Kb0\Vectography\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Kb0\Vectography\Http\Controllers\OwnershipController;

class OwnershipServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('ownership', function() {
            return new OwnershipController();
        });
    }
}
