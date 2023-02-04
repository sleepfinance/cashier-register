<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cashier Plans configured for forgeify
    |--------------------------------------------------------------------------
    |
    | Here you can configure the model classes to use for the tables
    | provided by this package. For example, you can extend the
    | original model and make your needed changes then replace the
    | following models with your extended ones to be used by the package.
    |
    */
    'trial_days' => 5,
    'currency' => "USD",
    'currency_symbol' => "$",
    'plans' => [
        [
            'monthly_id' => 'stripe_monthly_1_id',
            'yearly_id' => 'stripe_yearly_1_id',
            'monthly_price'=>3,// use null for free
            'yearly_price' => 28,// use null for free
            'number_of_servers' => 1, // use null for unlimited
            'number_of_sites' => 10, // use null for unlimited
            'server_monitor' => true,
            'db_backups' => true,
            'teams' => true,
            'name' => 'Forgeify Developer',
            'description' => 'The developer plan allows you to manage a single server; however, and deploy up to 10 sites and deployments.',
            'features' => [
               'Manage a Single Server',
               'Deploy upto 10 Sites',
               'Unlimited Repositories',
               'Push To Deploy',
            ]
        ],
        [
            'monthly_id' => 'stripe_monthly_2_id',
            'yearly_id' => 'stripe_yearly_2_id',
            'monthly_price' => 9,// use null for free
            'yearly_price' => 28,// use null for free
            'number_of_servers' => 10, // use null for unlimited
            'number_of_sites' => null, // use null for unlimited
            'server_monitor' => true,
            'db_backups' => true,
            'teams' => true,
            'name' => 'Forgeify Standard',
            'description' => 'The Standard plan allows you to manage 10 servers;  and deploy unlimitted sites and deployments.',
            'features' => [
                'Manage a 10 Servers',
                'Deploy unlimited Sites',
                'Unlimited Repositories',
                'Push To Deploy',
                'Site Monitoring',
                'Load balancers',
                'Mysql Load balancers',
                'Phpmyadmin One click Install'
            ],
        ],
        [
            'monthly_id' => 'stripe_monthly_3_id',
            'yearly_id' => 'stripe_yearly_3_id',
            'monthly_price' => 29.95,// use null for free
            'yearly_price' => 28,// use null for free
            'number_of_servers' => null, // use null for unlimited
            'number_of_sites' => null, // use null for unlimited
            'server_monitor' => true,
            'db_backups' => true,
            'teams' => true,
            'name' => 'Forgeify Professional',
            'description' => 'The Professional plan allows you to manage unlimited servers, sites, and deployments. In addition, you may configure database backups, site monitoring and server monitoring. Professional plan customers also receive priority email support',
            'features' => [
                'Manage unlimited Servers',
                'Deploy unlimited Sites',
                'Unlimited Repositories',
                'Push To Deploy',
                'Site Monitoring',
                'Server Monitoring',
                'Phpmyadmin One click Install',
                'Automatic Database Backups',
                'Teams and Server sharing',
                'Priority Support',
                'Load balancers',
                'Mysql Load balancers',
            ],
        ],
    ],

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
