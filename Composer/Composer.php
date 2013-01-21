<?php

namespace ant\BadgeBundle\Composer;

use ant\BadgeBundle\Model\RankInterface;

use ant\BadgeBundle\Model\ParticipantInterface;

use ant\BadgeBundle\Model\BadgeInterface;
use ant\BadgeBundle\ModelManager\BadgeManagerInterface;
use ant\BadgeBundle\ModelManager\RankManagerInterface;
use ant\BadgeBundle\BadgeBuilder\NewBadgeBuilder;
use ant\BadgeBundle\BadgeBuilder\NewRankBuilder;
use ant\BadgeBundle\BadgeBuilder\NewGroupBuilder;
use ant\BadgeBundle\ModelManager\GroupManagerInterface;

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
    /**
     * Group manager
     *
     * @var GroupManagerInterface
     */
    protected $groupManager;


    public function __construct(BadgeManagerInterface $badgeManager, RankManagerInterface $rankManager, GroupManagerInterface $groupManager)
    {
        $this->badgeManager = $badgeManager;
        $this->rankManager = $rankManager;
        $this->groupManager = $groupManager;
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
    /**
     * Starts composing a group
     *
     * @return NewGroupBuilder
     */
    public function newGroup()
    {
    	$group = $this->groupManager->createGroup();
    	//$badge = $this->badgeManager->saveBadge($badge);
    
    	return new NewGroupBuilder($group);
    }
    /**
     * Starts composing a rank and complete its fields
     *
     * @return RankInterface
     */
    public function createRank(ParticipantInterface $participant, BadgeInterface $badge, $count=1)
    {
    	$rank = $this->newRank()
	    	->setParticipant($participant)
	    	->setBadge($badge)
	    	->setcount($count)
	    	->getRank();
    	$this->rankManager->saveRank($rank);
    }
    /**
     * Add one to the counter
     *
     * @return RankInterface
     */
    public function addCountToRank(RankInterface $rank)
    {
    	$rank->setCount($rank->getCount()+1);
    	$count = $rank->getCount();
    	$badge = $rank->getBadge();
    	if ($badge->getCount() == $count){
    		$rank->setAcquired(true);
    		$rank->setWonAt(new \DateTime('now'));
    	}
    	
    	return $rank;
    }
    

}
