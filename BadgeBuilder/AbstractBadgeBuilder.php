<?php

namespace ant\BadgeBundle\BadgeBuilder;

use ant\BadgeBundle\Model\BadgeInterface;
use ant\BadgeBundle\Model\BadgeParticipantInterface;
use ant\BadgeBundle\Model\BadgeInterface;

/**
 * Fluent interface badge builder
 *
 * @author Pablo <pablo@antweb.es>
 */
abstract class AbstractBadgeBuilder
{
    /**
     * The badge we are building
     *
     * @var BadgeInterface
     */
    protected $badge;

    public function __construct(BadgeInterface $badge)
    {
        $this->badge = $badge;
    }


}
