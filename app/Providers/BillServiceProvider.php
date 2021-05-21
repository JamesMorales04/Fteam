<?php

namespace App\Providers;

use App\Interfaces\Billing;
use App\Util\Bill;
use Illuminate\Support\ServiceProvider;

class BillServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     *
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Billing::class, function () {
            return new Bill();
        });
    }
}
