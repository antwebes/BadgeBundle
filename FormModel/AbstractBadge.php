<?php

namespace ant\BadgeBundle\FormModel;

use ant\BadgeBundle\Model\BadgeInterface;

abstract class AbstractBadge
{
	
	
	/**
	 *
	 * @var string
	 */
	protected $name;
	
    /**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}
	
	/**
	 * @param  string
	 * @return null
	 */
	public function setName($name)
	{
		$this->name = $name;
	}
}
