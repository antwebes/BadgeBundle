<?php

namespace Ant\BadgeBundle\Composer;


use Ant\BadgeBundle\Event\RankEvent;

use Ant\BadgeBundle\Model\RankInterface;
use Ant\BadgeBundle\Model\ParticipantInterface;
use Ant\BadgeBundle\Model\BadgeInterface;
use Ant\BadgeBundle\ModelManager\BadgeManagerInterface;
use Ant\BadgeBundle\ModelManager\RankManagerInterface;
use Ant\BadgeBundle\BadgeBuilder\NewBadgeBuilder;
use Ant\BadgeBundle\BadgeBuilder\NewRankBuilder;
use Ant\BadgeBundle\BadgeBuilder\NewGroupBuilder;
use Ant\BadgeBundle\ModelManager\GroupManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Ant\BadgeBundle\Event\AntBadgeEvents;

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
    /**
     * The event dispatcher
     *
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    public function __construct(BadgeManagerInterface $badgeManager, RankManagerInterface $rankManager, GroupManagerInterface $groupManager, EventDispatcherInterface $dispatcher)
    {
        $this->badgeManager = $badgeManager;
        $this->rankManager = $rankManager;
        $this->groupManager = $groupManager;
        $this->dispatcher = $dispatcher;
        
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
    	$countBadge = $badge->getCount();
    	if ($countBadge == $count )
    	{
	    	$rank = $this->newRank()
		    	->setParticipant($participant)
		    	->setBadge($badge)
		    	->setcount($count)
		    	->setAcquired(true)
		    	->setWonAt(new \DateTime('now'))
		    	->getRank();
    		$this->rankManager->saveRank($rank);
    		$this->dispatcher->dispatch(AntBadgeEvents::POST_ACQUIRED, new RankEvent($rank));
    	}
    	else {
    		$rank = $this->newRank()
		    	->setParticipant($participant)
		    	->setBadge($badge)
		    	->setcount($count)
		    	->getRank();
    		$this->rankManager->saveRank($rank);
    	}
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
    		$this->rankManager->saveRank($rank);
    		$this->dispatcher->dispatch(AntBadgeEvents::POST_ACQUIRED, new RankEvent($rank));
    	}
    	else $this->rankManager->saveRank($rank);
    	
    	return $rank;
    }
    

}
