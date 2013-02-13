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

interface GroupManagerInterface
{
	function createGroup();
	
	function findGroupById($id);
	
	/**
	 * Finds a group by its class
	 *
	 * @return GroupInterface or null
	 */
	public function findGroupByClass($class);
}