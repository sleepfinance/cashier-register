<?php

namespace Forgeify\CashierRegister\Models\Paddle;

use Laravel\Paddle\Subscription as CashierSubscription;
use Forgeify\CashierRegister\Concerns\HasPlans;
use Forgeify\CashierRegister\Concerns\HasQuotas;

class Subscription extends CashierSubscription
{
    use HasPlans;
    use HasQuotas;

    /**
     * Get the service plan identifier for the resource.
     *
     * @return mixed
     */
    public function getPlanIdentifier()
    {
        return $this->paddle_plan;
    }
}
