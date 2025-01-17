<?php

namespace Forgeify\CashierRegister\Test;

use Laravel\Cashier\Cashier as StripeCashier;
use Orchestra\Testbench\TestCase as Orchestra;
use Forgeify\CashierRegister\Saas;

abstract class TestCase extends Orchestra
{
    /**
     * {@inheritdoc}
     */
    public function setUp(): void
    {
        parent::setUp();

        Saas::clearPlans();
        Saas::cleanSyncUsageCallbacks();

        $this->resetDatabase();

        $this->loadLaravelMigrations(['--database' => 'sqlite']);

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->withFactories(__DIR__.'/database/factories');

        Saas::currency('EUR');

        if (class_exists(StripeCashier::class)) {
            StripeCashier::useCustomerModel(Models\Stripe\User::class);
        }
    }

    /**
     * Get the package providers.
     *
     * @param  mixed  $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            \Laravel\Cashier\CashierServiceProvider::class,
            \Laravel\Paddle\CashierServiceProvider::class,
            \Forgeify\CashierRegister\CashierRegisterServiceProvider::class,
        ];
    }

    /**
     * Set up the environment.
     *
     * @param  mixed  $app
     * @return void
     */
    public function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'sqlite');
        $app['config']->set('database.connections.sqlite', [
            'driver'   => 'sqlite',
            'database' => __DIR__.'/database.sqlite',
            'prefix'   => '',
        ]);
        $app['config']->set('auth.providers.users_with_stripe.model', Models\Stripe\User::class);
        $app['config']->set('auth.providers.users_with_paddle.model', Models\Paddle\User::class);
        $app['config']->set('app.key', 'wslxrEFGWY6GfGhvN9L3wH3KSRJQQpBD');
    }

    /**
     * Reset the database.
     *
     * @return void
     */
    protected function resetDatabase()
    {
        file_put_contents(__DIR__.'/database.sqlite', null);
    }
}
