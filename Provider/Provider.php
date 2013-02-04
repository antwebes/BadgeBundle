<?php

namespace ant\BadgeBundle\Provider;

use ant\BadgeBundle\Model\ParticipantInterface;

use ant\BadgeBundle\Composer\ComposerInterface;

use ant\BadgeBundle\Security\ParticipantProviderInterface;

use ant\BadgeBundle\ModelManager\RankManagerInterface;

use ant\BadgeBundle\Event\BadgeEvent;
use ant\BadgeBundle\Model\GroupInterface;
use ant\BadgeBundle\ModelManager\GroupManagerInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use ant\BadgeBundle\ModelManager\BadgeManagerInterface;

/**
 *
 * @author Pablo <pablo@antweb.es>
 */
class Provider implements ProviderInterface
{
	/**
	 * The badge manager
	 *
	 * @var BadgeManagerInterface
	 */
	protected $badgeManager;
	/**
	 * The group manager
	 *
	 * @var GroupManagerInterface
	 */
	protected $groupManager;
	/**
	 * The rank manager
	 *
	 * @var RankManagerInterface
	 */
	protected $rankManager;
	/**
	 * The participant provider instance
	 *
	 * @var ParticipantProviderInterface
	 */
	protected $participantProvider;
	protected $composer;
	
	public function __construct(BadgeManagerInterface $badgeManager, GroupManagerInterface $groupManager, RankManagerInterface $rankManager, ParticipantProviderInterface $participantProvider, ComposerInterface $composer)
	{
		$this->badgeManager = $badgeManager;
		$this->groupManager = $groupManager;
		$this->rankManager = $rankManager;
		$this->participantProvider = $participantProvider;
		$this->composer = $composer;
	}
	
	/**
	 * Gets a badge by its ID
	 *
	 * @return BadgeInterface
	 */
	public function getBadge($badgeId){
		
		$badge = $this->badgeManager->findBadgeById($badgeId);
		return $badge;
	}
	/**
	 * Gets a rank by its ID
	 *
	 * @return RankInterface
	 */
	public function getRank($rankId){
	
		$rank = $this->rankManager->findRankById($rankId);
		
		return $rank;
	}
	/**
	 * Gets a group by its ID
	 *
	 * @return GroupInterface
	 */
	public function getGroup($groupId){
	
		$group = $this->groupManager->findGroupById($groupId);
		return $group;
	}
	/**
	 * Gets shelf ( allt badges available)
	 *
	 * @return array of BadgeInterface
	 */
	public function getShelf()
	{
		return $this->badgeManager->findAllBadge();
	}
	/**
	 * Gets shelf ( all groups available)
	 *
	 * @return array of GroupsInterface
	 */
	public function getShelfGroup()
	{
		return $this->groupManager->findAllGroup();
	}
	/**
	 * Gets the group of a class (only one)
	 */
	public function getGroupByClass($class)
	{
		return $this->groupManager->findGroupByClass($class);
	}
	/**
	 * Gets badges of a group
	 * @return array BadgeInterface
	 */
	public function getBadgesByGroup(GroupInterface $group)
	{
		return $this->badgeManager->findBadgesByGroup($group);
	}
	/**
	 * Gets all ranks of a participant of user online
	 * @return array RankInterface
	 */
	public function RanksOfParticipantOnline()
	{		
		$participant = $this->participantProvider->getAuthenticatedParticipant(); // obtain the user logueado
		return $this->rankManager->findRanksOfParticipant($participant);
	}
	/**
	 * Gets ranks of a participant acquires or no 
	 * @return array RankInterface
	 */
	public function RanksOfParticipant($acquired, ParticipantInterface $participant)
	{
		if ($acquired == 'true') return $this->rankManager->findRanksOfParticipantAcquired($participant);
		else return $this->rankManager->findRanksOfParticipant($participant);
	}
	/**
	 * Action for create a first ranking of a user
	 */
	public function RookieUser(BadgeEvent $event)
	{
		$group = $this->getGroupByClass($event->getClass());
		$badges = $this->getBadgesByGroup($group);
		$participant = $this->participantProvider->getAuthenticatedParticipant(); // obtain the user logueado
		
		$totalBadges = sizeof($badges);
		$i = 1;
		$count = 0;
		foreach ($badges as $badge)
		{
			$rank = $this->rankManager->findRankOfBadge($badge, $participant);
			if ($rank == null) {
				$this->composer->createRank($participant, $badge, $count+1);
				return ;
			}
			if ( $rank->getAcquired() == false || $totalBadges == $i) {
				$this->composer->addCountToRank($rank);//Habria que sumar el count
				return;
			}
			$count = $rank->getCount();
			$i++;
		}
	}
}
