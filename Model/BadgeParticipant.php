<?php
/**
 * This file is part of the AntewesBadgeBundle package.
 *
 * (c) antweb <http://github.com/antwebes/>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace ant\BadgeBundle;

abstract class BadgeParticipant implements BadgeParticipantInterface {
	
	protected $wins;

	public function getWins() {
		return $this->wins;
	}
	
	public function setWins($wins) {
		$this->wins = $wins;
	}

}
