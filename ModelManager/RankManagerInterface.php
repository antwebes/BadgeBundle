<?php
/**
 * This file is part of the AntewesBadgeBundle package.
 *
 * (c) antweb <http://github.com/antwebes/>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ant\BadgeBundle\ModelManager;

use ant\BadgeBundle\Model\RankInterface;

use ant\BadgeBundle\Model\ParticipantInterface;

use ant\BadgeBundle\Model\BadgeInterface;

interface RankManagerInterface
{

	//public function createBadgeParticipant();
	public function createRank();
	
	public function findRankOfBadge(BadgeInterface $badge, ParticipantInterface $participant);
	
	public function saveRank(RankInterface $rank);
	
}