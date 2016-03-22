<?php
/**
 * @author Erik Norgren <erik.norgren@interactivesolutions.se>
 * @copyright Interactive Solutions
 */

declare(strict_types = 1);

namespace InteractiveSolutions\Hermes\Hydrator;

use DateTime;
use DomainException;
use InteractiveSolutions\Hermes\Service\MessageInterface;
use InvalidArgumentException;
use Zend\Stdlib\Hydrator\AbstractHydrator;

class MessageHydrator extends AbstractHydrator
{

    /**
     * {@inheritdoc}
     */
    public function extract($object)
    {
        if (!$object instanceof MessageInterface) {
            throw new InvalidArgumentException();
        }

        return [
            'userId'    => $object->getUserId(),
            'timeStamp' => $object->getTimestamp()->format(DateTime::ISO8601),
            'payload'   => $object->getPayload()
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function hydrate(array $data, $object)
    {
        throw new DomainException();
    }
}
