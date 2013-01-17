<?php

namespace ant\BadgeBundle\Composer;

use ant\BadgeBundle\Model\BadgeInterface;

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

}
