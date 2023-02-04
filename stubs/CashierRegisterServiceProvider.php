<?php

namespace App\Providers;

use Forgeify\CashierRegister\CashierRegisterServiceProvider as BaseServiceProvider;
use Forgeify\CashierRegister\Saas;
use Illuminate\Support\Str;

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
        $plans = config('saas.plans');
        $currency = config('saas.currency');
        $currency_symbol = config('saas.currency_symbol');
        Saas::currency($currency, $currency_symbol);
        collect($plans)
            ->map(fn ($plan) => (object)$plan)
            ->each(function ($plan) {
                $features = collect($plan->features)
                    ->map(fn ($ft) => Saas::feature($ft, Str::slug($ft))->notResettable())
                    ->all();
                $plan = Saas::plan($plan->name, $plan->monthly_id, $plan->yearly_id ?? null)
                    ->serverMonitor($plan->server_monitor ?? false)
                    ->dbBackups($plan->db_backups ?? false)
                    ->teams($plan->teams ?? false)
                    ->servers($plan->servers ?? null)
                    ->sites($plan->sites ?? null)
                    ->teams($plan->teams ?? false)
                    ->monthly($plan->monthly_price ?? 0)
                    ->description($plan->description ?? 0)
                    ->features($features);
            });
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
