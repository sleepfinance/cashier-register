<?php

namespace Forgeify\CashierRegister\Concerns;

use Forgeify\CashierRegister\Saas;

trait HasPlans
{
    /**
     * Get the plan this instance belongs to.
     *
     * @return \Forgeify\CashierRegister\Plan
     */
    public function getPlan()
    {
        return Saas::getPlan($this->getPlanIdentifier());
    }

    /**
     * Get the service plan identifier for the resource.
     *
     * @return void
     */
    public function getPlanIdentifier()
    {
        return $this->stripe_price;
    }
}
