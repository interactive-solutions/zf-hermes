<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types = 1);

namespace InteractiveSolutions\Hermes\Factory\Service;

use InteractiveSolutions\Hermes\Hydrator\MessageHydrator;
use InteractiveSolutions\Hermes\Service\NotifierService;
use Redis;
use Zend\Mvc\Controller\ControllerManager;

final class NotifierServiceFactory
{
    public function __invoke(ControllerManager $controllerManager):NotifierService
    {
        $sl = $controllerManager->getServiceLocator();

        /* @var Redis $redis */
        $redis = $sl->get(Redis::class);

        /* @var MessageHydrator $hydrator */
        $hydrator = $sl->get('HydratorManager')->get(MessageHydrator::class);

        return new NotifierService($redis, $hydrator);
    }
}
