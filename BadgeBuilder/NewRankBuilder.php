<?php

namespace Ant\BadgeBundle\BadgeBuilder;

use Ant\BadgeBundle\Model\RankInterface;
use Ant\BadgeBundle\Model\ParticipantInterface;
use Ant\BadgeBundle\Model\BadgeInterface;
/**
 * Fluent interface badge builder for new badge
 *
 * @author pablo <pablo@antweb.es>
 */
class NewRankBuilder extends AbstractBadgeBuilder
{
	/**
	 * The rank we are building
	 *
	 * @var RankInterface
	 */
	protected $rank;
	
	public function __construct(RankInterface $rank)
	{
		$this->rank = $rank;
	}
	
	/**
	 * Gets the created rank.
	 *
	 * @return RankInterface the rank created
	 */
	public function getRank()
	{
		return $this->rank;
	}
	
	
	public function setcount($count) {
		
		$this->rank->setCount($count);
		
		return $this;
	}
	
	
	/**
	 * @see Ant\BadgeBundle\Model\RankInterface::setParticipant()
	 */
	public function setParticipant(ParticipantInterface $participant)
	{
		$this->rank->setParticipant($participant);
		return $this;
	}
	
	/**
	 * @see Ant\BadgeBundle\Model\RankInterface::setAcquired()
	 */
	public function setAcquired($acquired)
	{
		$this->rank->setAcquired($acquired);
		return $this;
	}
	
	/**
	 * @see Ant\BadgeBundle\Model\RankInterface::setBadge()
	 */
	public function setBadge(BadgeInterface $badge)
	{
		$this->rank->setBadge($badge);
		return $this;
	}
	
	/**
	 * @see Ant\BadgeBundle\Model\RankInterface::setWonAt()
	 */
	public function setWonAt(\DateTime $wonAt)
	{
		$this->rank->setWonAt($wonAt);
		return $this;
	}
}
