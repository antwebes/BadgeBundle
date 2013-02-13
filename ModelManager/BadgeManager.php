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

use Ant\BadgeBundle\Model\BadgeInterface;

abstract class BadgeManager implements BadgeManagerInterface {

	public function createBadge() {
		$class = $this->getClass();
		$badge = new $class;

		return $badge;
	}

}
