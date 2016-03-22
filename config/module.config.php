<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types = 1);

use InteractiveSolutions\Hermes\Factory\Options\RedisOptionsFactory;
use InteractiveSolutions\Hermes\Factory\RedisFactory;
use InteractiveSolutions\Hermes\Factory\Service\NotifierServiceFactory;
use InteractiveSolutions\Hermes\Options\RedisOptions;
use InteractiveSolutions\Hermes\Service\NotifierService;

return [
    'service_manager' => [
        'factories' => [
            NotifierService::class => NotifierServiceFactory::class,

            Redis::class        => RedisFactory::class,
            RedisOptions::class => RedisOptionsFactory::class,
        ],
    ],
];
