<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types = 1);

namespace InteractiveSolutions\Hermes\Factory\Service;

use InteractiveSolutions\Hermes\Hydrator\MessageHydrator;
use InteractiveSolutions\Hermes\Service\NotifierService;
use Interop\Container\ContainerInterface;
use Redis;

final class NotifierServiceFactory
{
    /**
     * @param ContainerInterface $serviceLocator
     * @return NotifierService
     */
    public function __invoke(ContainerInterface $serviceLocator):NotifierService
    {
        /* @var Redis $redis */
        $redis = $serviceLocator->get(Redis::class);

        /* @var MessageHydrator $hydrator */
        $hydrator = $serviceLocator->get('HydratorManager')->get(MessageHydrator::class);

        return new NotifierService($redis, $hydrator);
    }
}
