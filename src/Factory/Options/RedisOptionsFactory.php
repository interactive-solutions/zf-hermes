<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types = 1);

namespace InteractiveSolutions\Hermes\Factory\Options;

use InteractiveSolutions\Hermes\Options\RedisOptions;
use Interop\Container\ContainerInterface;

class RedisOptionsFactory
{
    public function __invoke(ContainerInterface $serviceLocator):RedisOptions
    {
        /* @var array $config */
        $config = $serviceLocator->get('config');

        return new RedisOptions($config['interactive_solutions']['options'][RedisOptions::class]);
    }
}
