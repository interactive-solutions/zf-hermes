<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types = 1);

namespace InteractiveSolutions\Hermes\Factory\Listener;

use InteractiveSolutions\Hermes\Listener\NotifierListener;
use InteractiveSolutions\Hermes\Service\NotifierService;
use Zend\ServiceManager\ServiceLocatorInterface;

final class NotifierListenerFactory
{
    public function __invoke(ServiceLocatorInterface $serviceLocator):NotifierListener
    {
        /* @var NotifierService $notifierService */
        $notifierService = $serviceLocator->get(NotifierService::class);

        return new NotifierListener($notifierService);
    }
}
