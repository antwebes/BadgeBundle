<?php

namespace ant\BadgeBundle\Composer;

use ant\BadgeBundle\Model\BadgeInterface;
use ant\BadgeBundle\ModelManager\BadgeManagerInterface;
use ant\BadgeBundle\ModelManager\RankManagerInterface;
use ant\BadgeBundle\BadgeBuilder\NewBadgeBuilder;
use ant\BadgeBundle\BadgeBuilder\NewRankBuilder;

/**
 * Factory for badge builders
 *
 * @author Pablo <pablo@antweb.es>
 */
class Composer implements ComposerInterface
{
    /**
     * Badge manager
     *
     * @var BadgeManagerInterface
     */
    protected $badgeManager;
    /**
     * Rank manager
     *
     * @var RankManagerInterface
     */
    protected $rankManager;


    public function __construct(BadgeManagerInterface $badgeManager, RankManagerInterface $rankManager)
    {
        $this->badgeManager = $badgeManager;
        $this->rankManager = $rankManager;
    }

    /**
     * Starts composing a badge
     *
     * @return NewBadgeBuilder
     */
    public function newBadge()
    {
    	$badge = $this->badgeManager->createBadge();
    	//$badge = $this->badgeManager->saveBadge($badge);

        return new NewBadgeBuilder($badge);
    }
    /**
     * Starts composing a rank
     *
     * @return NewRankBuilder
     */
    public function newRank()
    {
    	$rank = $this->rankManager->createRank();
    
    	return new NewRankBuilder($rank);
    }
    

}
