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

class BadgeManagerInterface 
{
	/**
	 * Finds a badge by its ID
	 *
	 * @return BadgeInterface or null
	 */
	function findBadgeById($id);

	public function createBadgeGroup();
}