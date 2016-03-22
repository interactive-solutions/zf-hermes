<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types = 1);

namespace InteractiveSolutions\Hermes\Service;

use DateTime;

interface MessageInterface
{
    /**
     * Redis event channel
     *
     * @return string
     */
    public function getChannel():string;

    /**
     * Id of the user to notify
     *
     * @return mixed
     */
    public function getUserId();

    /**
     * Time stamp of message
     *
     * @return DateTime
     */
    public function getTimestamp():DateTime;

    /**
     * Data to be sent
     *
     * @return array
     */
    public function getPayload():array;
}
