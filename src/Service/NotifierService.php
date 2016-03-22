<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types = 1);

namespace InteractiveSolutions\Hermes\Service;

use InteractiveSolutions\Hermes\Hydrator\MessageHydrator;
use Redis;

final class NotifierService implements NotifierServiceInterface
{
    /**
     * @var Redis
     */
    private $redis;

    /**
     * @var MessageHydrator
     */
    private $messageHydrator;

    /**
     * NotifierService constructor.
     * @param Redis $redis
     * @param MessageHydrator $messageHydrator
     */
    public function __construct(Redis $redis, MessageHydrator $messageHydrator)
    {
        $this->redis           = $redis;
        $this->messageHydrator = $messageHydrator;
    }

    public function publish(MessageInterface $message)
    {
        $this->redis->publish($message->getChannel(), json_encode($this->messageHydrator->extract($message)));
    }
}
