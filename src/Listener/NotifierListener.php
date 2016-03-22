<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types = 1);

namespace InteractiveSolutions\Hermes\Listener;

use InteractiveSolutions\Hermes\Events;
use InteractiveSolutions\Hermes\Service\MessageInterface;
use InteractiveSolutions\Hermes\Service\NotifierServiceInterface;
use InvalidArgumentException;
use Zend\EventManager\Event;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use Zend\EventManager\ListenerAggregateTrait;

final class NotifierListener implements ListenerAggregateInterface
{
    use ListenerAggregateTrait;

    /**
     * @var NotifierServiceInterface
     */
    private $notifierService;

    /**
     * NotifierListener constructor.
     * @param NotifierServiceInterface $notifierService
     */
    public function __construct(NotifierServiceInterface $notifierService)
    {
        $this->notifierService = $notifierService;
    }

    /**
     * {@inheritdoc}
     */
    public function attach(EventManagerInterface $events)
    {
        $this->listeners[] = $events->attach(Events::HERMES_NOTIFY, [$this, 'notify']);
    }

    public function notify(Event $event)
    {
        $message = $event->getParam('message');

        if (!$message instanceof MessageInterface) {
            throw new InvalidArgumentException();
        }

        $this->notifierService->publish($message);
    }
}
