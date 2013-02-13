<?php

namespace Ant\BadgeBundle\Provider;

/**
 * 
 * @author Pablo <pablo@antweb.es>
 */
use Ant\BadgeBundle\Model\ParticipantInterface;

interface ProviderInterface
{
	/**
	 * Gets the thread 
	 *
	 * @return badge
	 */
	public function getBadge($badgeId);
	public function getRank($rankId);
	/**
	 * Gets shelf ( all badges available)
	 *
	 * @return badges
	 */
	public function getShelf();
	
	public function RanksOfParticipantOnline();
	
	public function RanksOfParticipant($acquired, ParticipantInterface $participant);
}
