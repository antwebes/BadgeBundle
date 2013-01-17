<?php

namespace ant\BadgeBundle\BadgeBuilder;

use ant\BadgeBundle\Model\RankInterface;
use ant\BadgeBundle\Model\ParticipantInterface;
use ant\BadgeBundle\Model\BadgeInterface;
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
	 * @see ant\BadgeBundle\Model\RankInterface::setParticipant()
	 */
	public function setParticipant(ParticipantInterface $participant)
	{
		$this->rank->setParticipant($participant);
		return $this;
	}
	
	/**
	 * @see ant\BadgeBundle\Model\RankInterface::setAcquired()
	 */
	public function setAcquired($acquired)
	{
		$this->rank->setAcquired($acquired);
		return $this;
	}
	
	/**
	 * @see ant\BadgeBundle\Model\RankInterface::setBadge()
	 */
	public function setBadge(BadgeInterface $badge)
	{
		$this->rank->setBadge($badge);
		return $this;
	}
	
	/**
	 * @see FOS\MessageBundle\Model\ThreadInterface::setWonAt()
	 */
	public function setWonAt(\DateTime $wonAt)
	{
		$this->rank->setWonAt($wonAt);
		return $this;
	}
}
