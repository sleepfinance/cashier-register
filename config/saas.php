<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cashier Register Models
    |--------------------------------------------------------------------------
    |
    | Here you can configure the model classes to use for the tables
    | provided by this package. For example, you can extend the
    | original model and make your needed changes then replace the
    | following models with your extended ones to be used by the package.
    |
    */

    'models' => [

        'usage' => \Forgeify\CashierRegister\Models\Usage::class,

    ],

    'cashier' => [

        /*
        |--------------------------------------------------------------------------
        | Cashier Stripe Models
        |--------------------------------------------------------------------------
        |
        | Here you can configure the model classes to use for the tables
        | provided by Laravel Cashier. The models are already extended by
        | Cashier Register, but you can extend them again if you need
        | to customize them for your needs.
        |
        */

        'models' => [

            'subscription' => [

                'stripe' => \Forgeify\CashierRegister\Models\Stripe\Subscription::class,

                'paddle' => \Forgeify\CashierRegister\Models\Paddle\Subscription::class,

            ],

        ],

    ],

];
