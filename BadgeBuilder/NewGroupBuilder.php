<?php

namespace ant\BadgeBundle\BadgeBuilder;

use ant\BadgeBundle\Model\GroupInterface;

/**
 * Fluent interface badge builder for new badge
 *
 * @author pablo <pablo@antweb.es>
 */
class NewGroupBuilder extends AbstractBadgeBuilder
{
	/**
	 * The group we are building
	 *
	 * @var BadgeInterface
	 */
	protected $group;
	
	public function __construct(GroupInterface $group)
	{
		$this->group = $group;
	}
	
	/**
	 * Gets the created group.
	 *
	 * @return GroupInterface the group created
	 */
	public function getGroup()
	{
		return $this->group;
	}
	
	
	public function setType($type)
	{
		$this->badge->setType($type);
	
		return $this;
	}
	
	public function setClass($class){
		
		$this->badge->setClass($class);
		
		return $this;
	}

}
