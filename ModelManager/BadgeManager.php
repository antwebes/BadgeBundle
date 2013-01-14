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

use ant\BadgeBundle\Model\BadgeInterface;

class BadgeManager implements BadgeManagerInterface {

	protected function createBadge() {
		$class = $this->getClass();
		$badge = new $class;

		return $badge;
	}
	/**
	 * Saves a badge
	 * must implement the abstract doSaveBadge method which will
	 *
	 * @param BadgeInterface $badge
	 * @throws InvalidArgumentException when the comment does not have a thread.
	 */
	public function saveComment(BadgeInterface $badge)
	{	
		$event = new CommentPersistBadge($badge);
		$this->dispatcher->dispatch(Events::BADGE_PRE_PERSIST, $event);
	
		if ($event->isPersistenceAborted()) {
			return;
		}
	
		$this->doSaveBadge($badge);
	
		$event = new BadgeEvent($badge);
		$this->dispatcher->dispatch(Events::BADGE_POST_PERSIST, $event);
	}
	
	
	abstract protected function doSaveBadge(BadgeInterface $badge) {
		// TODO: Auto-generated method stub

	}

}
