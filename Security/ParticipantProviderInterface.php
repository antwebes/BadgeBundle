<?php

namespace ant\BadgeBundle\Security;

use ant\BadgeBundle\Security\ParticipantProvider;

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
