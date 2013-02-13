<?php
/**
 * This file is part of the AntewesBadgeBundle package.
 *
 * (c) antweb <http://github.com/antwebes/>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ant\BadgeBundle\ModelManager;

use Ant\BadgeBundle\Model\RankInterface;

use Ant\BadgeBundle\Model\ParticipantInterface;

use Ant\BadgeBundle\Model\BadgeInterface;

interface RankManagerInterface
{

	//public function createBadgeParticipant();
	public function createRank();
	
	public function findRankById($id);
	
	public function findRankOfBadge(BadgeInterface $badge, ParticipantInterface $participant);
	
	public function findRanksOfParticipantAcquired(ParticipantInterface $participant);
	
	public function findRanksOfParticipant(ParticipantInterface $participant);
	
	public function saveRank(RankInterface $rank);
	
}