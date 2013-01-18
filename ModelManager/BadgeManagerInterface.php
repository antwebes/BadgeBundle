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

interface BadgeManagerInterface 
{
	/**
	 * Finds a badge by its ID
	 *
	 * @return BadgeInterface or null
	 */
	function findBadgeById($id);
	
	/**
     * Saves a badge
     *
     * @param BadgeInterface $badge
     */
    function saveBadge(BadgeInterface $badge);
    /**
     * Get all badges
     *
     */
    public function findAllBadge();
    /**
     * Finds a badge by its group
     *
     * @return BadgeInterface or null
     */
    public function findBadgesByGroup($group);
    
}