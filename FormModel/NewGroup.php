<?php

namespace ant\BadgeBundle\FormModel;

class NewGroup extends AbstractBadge
{
	//Aquí habria que declarar los campos propios del badge,
	//en abstractbadge, serian los campos comunes, con otras clases

	/**
	 * The class associated
	 *
	 * @var string
	 */
	protected $class;
	/**
	 * The type
	 *
	 * @var string
	 */
	protected $type;
	
	/**
	 * @return string
	 */
	public function getClass()
	{
		return $this->class;
	}
	/**
	 * @param  string
	 * @return null
	 */
	public function setClass($class)
	{
		$this->class = $class;
	}
	/**
	 * @return string
	 */
	public function getType()
	{
		return $this->type;
	}
	/**
	 * @param  string
	 * @return null
	 */
	public function setType($type)
	{
		$this->type = $type;
	}
}
