<?php

/*
 * @copyright   2014 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

return [
    'name' => 'Auth0',
    'description' => 'Enables Auth0 login for users.',
    'version' => '1.2.0',
    'author' => 'Florian Wessels',
    'routes'      => [
        'main'   => [],
        'public' => [],
        'api'    => [],
    ],
    'services' => [
        'other' => [
            // Provides access to configured API keys, settings, field mapping, etc
            'auth0.config'            => [
                'class'     => \MauticPlugin\MauticAuth0Bundle\Integration\Config::class,
                'arguments' => [
                    'mautic.integrations.helper',
                ],
            ],
        ],
        'events' => [
            'mautic.auth0.user.subscriber' => [
                'class' => \MauticPlugin\MauticAuth0Bundle\EventListener\UserSubscriber::class,
                'arguments' => [
                    'mautic.helper.core_parameters',
                ],
            ],
            'mautic.auth0.config.subscriber' => [
                'class' => \MauticPlugin\MauticAuth0Bundle\EventListener\ConfigSubscriber::class,
            ],
        ],
        'forms' => [
            'mautic.form.type.auth0config' => [
                'class' => \MauticPlugin\MauticAuth0Bundle\Form\Type\ConfigType::class,
                'alias' => 'auth0config',
            ],
        ],
        'integrations' => [
            // Basic definitions with name, display name and icon
            'mautic.integration.auth0'               => [
                'class' => \MauticPlugin\MauticAuth0Bundle\Integration\Auth0AuthIntegration::class,
                'tags'  => [
                    'mautic.integration',
                    'mautic.basic_integration',
                ],
            ],
            // Provides the form types to use for the configuration UI
            'auth0.integration.configuration' => [
                'class'     => \MauticPlugin\MauticAuth0Bundle\Integration\Support\ConfigSupport::class,
                'arguments' => [
                    'helloworld.sync.repository.fields',
                ],
                'tags'      => [
                    'mautic.config_integration',
                ],
            ],
        ]
    ],

    'parameters' => [
        'auth0_username' => 'email',
        'auth0_email' => 'email',
        'auth0_firstName' => 'given_name',
        'auth0_lastName' => 'family_name',
        'auth0_timezone' => null,
        'auth0_locale' => null,
        'auth0_signature' => null,
        'auth0_position' => null,
    ],
];
