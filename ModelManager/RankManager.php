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



class RankManager implements RankManagerInterface
{
  
    public function createBadgeParticipant()
    {
    	$class = $this->getClass();
    	$badge = new $class;
    	
    	return $badge;
    }
}