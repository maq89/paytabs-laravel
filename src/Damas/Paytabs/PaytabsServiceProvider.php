<?php

namespace Damas\Paytabs;

use Illuminate\Support\ServiceProvider;

class PaytabsServiceProvider extends ServiceProvider
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
        $this->app->singleton('Paytabs', function() {
			return new Paytabs;
	    });
    }
}
