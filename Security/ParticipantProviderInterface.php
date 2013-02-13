<?php

namespace Ant\BadgeBundle\Security;

use Ant\BadgeBundle\Security\ParticipantProvider;

/**
 * Provides the authenticated participant
 *
 * @author Pablo <pablo@antweb.es>
 */
interface ParticipantProviderInterface
{
    /**
     * Gets the current authenticated user
     *
     * @return ParticipantInterface
     */
    function getAuthenticatedParticipant();
}
