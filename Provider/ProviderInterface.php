<?php

namespace ant\BadgeBundle\Provider;

/**
 * 
 * @author Pablo <pablo@antweb.es>
 */
use ant\BadgeBundle\Model\ParticipantInterface;

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
	
	public function RanksOfParticipantOnline($acquired);
	
	public function RanksOfParticipant($acquired, ParticipantInterface $participant);
}
