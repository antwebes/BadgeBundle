<?php

namespace ant\BadgeBundle\BadgeBuilder;

use ant\BadgeBundle\Model\BadgeInterface;
use ant\BadgeBundle\Model\RankInterface;

/**
 * Fluent interface badge builder
 *
 * @author Pablo <pablo@antweb.es>
 */
abstract class AbstractBadgeBuilder
{
   
	/**
	 * @param BadgeInterface
	 * @return BadgeBuilder (fluent interface)
	 */
	public function setName($name)
	{
		$this->badge->setName($name);
	
		return $this;
	}    

}
