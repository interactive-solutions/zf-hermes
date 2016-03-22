<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types = 1);

namespace InteractiveSolutions\Hermes\Factory;

use InteractiveSolutions\Hermes\Options\RedisOptions;
use Interop\Container\ContainerInterface;
use Redis;

class RedisFactory
{
    /**
     * @param ContainerInterface $serviceLocator
     * @return Redis
     */
    public function __invoke(ContainerInterface $serviceLocator):Redis
    {
        /* @var $options RedisOptions */
        $options = $serviceLocator->get(RedisOptions::class);

        $redis = new Redis();
        $redis->connect($options->getHost(), $options->getPort());

        return $redis;
    }
}
