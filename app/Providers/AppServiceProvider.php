<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function ($app) {
            return new Gateway([
                'environment' => 'sandbox',
                'merchantId' => 'jqcyx3prfh5d8xmn',
                'publicKey' => 'kf9cj5k5yvh8dkrg',
                'privateKey' => 'f44e0e5494a8e5edf3ee0e8718e14764'
            ]);
        });
    }
}
