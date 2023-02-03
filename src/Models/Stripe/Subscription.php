<?php

namespace Forgeify\CashierRegister\Models\Stripe;

use Laravel\Cashier\Subscription as CashierSubscription;
use Forgeify\CashierRegister\Concerns\HasPlans;
use Forgeify\CashierRegister\Concerns\HasQuotas;

class Subscription extends CashierSubscription
{
    use HasPlans;
    use HasQuotas;

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
