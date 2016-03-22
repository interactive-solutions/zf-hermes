<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types = 1);

namespace InteractiveSolutions\Hermes\Service;

interface NotifierServiceInterface
{
    /**
     * Publishes a message over Redis
     *
     * @param MessageInterface $message
     * @return void
     */
    public function publish(MessageInterface $message);
}
