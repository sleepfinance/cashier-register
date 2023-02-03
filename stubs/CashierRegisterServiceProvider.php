<?php

namespace App\Providers;

use Forgeify\CashierRegister\CashierRegisterServiceProvider as BaseServiceProvider;
use Forgeify\CashierRegister\Saas;

class CashierRegisterServiceProvider extends BaseServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Saas::currency('EUR');

        $free = Saas::plan('Free Plan', 'price_free')
            ->monthly(0)
            ->features([
                Saas::feature('5 Seats', 'seats', 5)->notResettable(),
                Saas::feature('10,000 mails', 'mails', 10000),
            ]);

        Saas::plan('Tier One', 'price_1')
            ->monthly(10)
            ->features([
                Saas::feature('Unlimited Seats', 'seats')->unlimited()->notResettable(),
                Saas::feature('20,000 mails', 'mails', 20000),
                Saas::feature('Beta Access', 'beta.access')->unlimited(),
            ]);

        Saas::plan('Tier Two', 'price_2')
            ->monthly(20)
            ->features([
                Saas::feature('Unlimited Seats', 'seats')->unlimited()->notResettable(),
                Saas::feature('30,000 mails', 'mails', 30000),
                Saas::feature('Beta Access', 'beta.access')->unlimited(),
            ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        parent::register();
    }
}
