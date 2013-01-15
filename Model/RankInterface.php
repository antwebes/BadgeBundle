<?php 
/**
 * This file is part of the AntewesBadgeBundle package.
 *
 * (c) antweb <http://github.com/antwebes/>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace ant\BadgeBundle\Model;

use ant\BadgeBundle\Model\ParticipantInterface;

interface RankInterface
{
	/**
	 * Set and get count, count own the user for to get the badge
	 */
	public function getCount();	
	public function setCount($count);
	
	/**
	 * Gets the user that won the badge
	 *
	 * @return ParticipantInterface
	 */
	function getParticipant();
	
	/**
	 * Sets the participant the badge
	 *
	 * @param ParticipantInterface
	 */
	function setParticipant(ParticipantInterface $participant);
	/**
	 * Set and get acquired, field boolean, true = badge acquired for the user
	 */
	public function getAcquired();
	public function setAcquired();
	/**
	 * Set and get badge, the badge that user want to win
	 */
	public function getBadge();
	public function setBadge(BadgeInterface $badge);
	
	/**
	 * Set and get wonAt, the date when the user won the badge
	 */
	public function getWonAt();
	public function setWonAt(\DateTime $wonAt);
	
}