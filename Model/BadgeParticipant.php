<?php

namespace antwebes\BadgeBundle;

abstract class BadgeParticipant implements BadgeParticipantInterface {
	
	protected $wins;

	public function getWins() {
		return $this->wins;
	}
	
	public function setWins($wins) {
		$this->wins = $wins;
	}

}
