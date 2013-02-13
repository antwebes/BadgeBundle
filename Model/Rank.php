<?php
/**
 * This file is part of the AntewesBadgeBundle package.
 *
 * (c) antweb <http://github.com/antwebes/>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Ant\BadgeBundle\Model;

use Ant\BadgeBundle\Model\ParticipantInterface;

abstract class Rank implements RankInterface {
	
	protected $count=0;
	
	/**
	 * Participant that created the badge
	 *
	 * @var ParticipantInterface
	 */
	protected $participant;
	/**
	 * boolean true = badge wins
	 *
	 * @var boolean
	 */
	protected $acquired=false;
	
	/**
	 * Badge contained in this rank
	 *
	 * @var BadgeInterface
	 */
	protected $badge;
	/**
	 * Date when the badge was won
	 *
	 * @var DateTime
	 */
	protected $wonAt;

	public function getcount() {
		return $this->count;
	}
	
	public function setcount($count) {
		$this->count = $count;
	}
	
	/**
	 * @see ant\BadgeBundle\Model\RankInterface::getParticipant()
	 */
	public function getParticipant()
	{
		return $this->participant;
	}
	
	/**
	 * @see Ant\BadgeBundle\Model\RankInterface::setParticipant()
	 */
	public function setParticipant(ParticipantInterface $participant)
	{
		$this->participant = $participant;
	}
	/**
	 * @see Ant\BadgeBundle\Model\RankInterface::getAcquired()
	 */
	public function getAcquired()
	{
		return $this->acquired;
	}
	
	/**
	 * @see Ant\BadgeBundle\Model\RankInterface::setAcquired()
	 */
	public function setAcquired($acquired)
	{
		$this->acquired = $acquired;
	}
	/**
	 * @see Ant\BadgeBundle\Model\RankInterface::getBadge()
	 */
	public function getBadge()
	{
		return $this->badge;
	}
	
	/**
	 * @see Ant\BadgeBundle\Model\RankInterface::setBadge()
	 */
	public function setBadge(BadgeInterface $badge)
	{
		$this->badge = $badge;
	}
	/**
	 * @see Ant\BadgeBundle\Model\RankInterface::getWonAt()
	 */
	public function getWonAt()
	{
		return $this->wonAt;
	}
	
	/**
	 * @see Ant\BadgeBundle\Model\RankInterface::setWonAt()
	 */
	public function setWonAt(\DateTime $wonAt)
	{
		$this->wonAt = $wonAt;
	}

}
