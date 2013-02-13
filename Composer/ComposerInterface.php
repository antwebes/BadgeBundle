<?php

namespace Ant\BadgeBundle\Composer;

use Ant\BadgeBundle\Model\RankInterface;

use Ant\BadgeBundle\Model\ParticipantInterface;

use Ant\BadgeBundle\Model\BadgeInterface;

/**
 * Factory for badge builders
 *
 * @author Pablo <pablo@antweb.es>
 */
interface ComposerInterface
{
    /**
     * Starts composing a badge
     *
     * @return NewBadgeBuilder
     */
    public function newBadge();
    /**
     * Starts composing a rank
     *
     * @return NewRankBuilder
     */
    public function newRank();
    
    public function createRank(ParticipantInterface $participant, BadgeInterface $badge);

    public function addCountToRank(RankInterface $rank);
}
