<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Interfaces\Billing;

use App\Util\Bill;

class BillServiceProvider extends ServiceProvider

{

    /**

     * Register any application services.

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
