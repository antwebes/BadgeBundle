<?php

namespace ant\BadgeBundle\FormModel;

use ant\BadgeBundle\Model\GroupInterface;

class NewBadge extends AbstractBadge
{
	//Aquí habria que declarar los campos propios del badge,
	//en abstractbadge, serian los campos comunes, con otras clases

	/**
	 * The badge description
	 *
	 * @var string
	 */
	protected $description;
	
	/**
	 * The badge name image
	 *
	 * @var string
	 */
	protected $image;
	
	/**
	 * amount necessary to obtain the badge
	 *
	 * @var int
	 */
	protected $count;
	/**
	 * The group
	 *
	 * @var string
	 */
	protected $badgeGroup;
	
	/**
	 * @return string
	 */
	public function getImage()
	{
		return $this->image;
	}
	
	/**
	 * @param  string
	 * @return null
	 */
	public function setImage($image)
	{
		$this->image = $image;
	}
	
	
	
	
	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}
	
	/**
	 * @param  string
	 * @return null
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}
	
	
	/**
	 * @return int
	 */
	public function getCount()
	{
		return $this->count;
	}
	/**
	 * @param  int
	 * @return null
	 */
	public function setCount($count)
	{
		$this->count = $count;
	}
	/**
	 * @return string
	 */
	public function getBadgeGroup()
	{
		return $this->badgeGroup;
	}
	/**
	 * @param  string
	 * @return null
	 */
	public function setBadgeGroup(GroupInterface $group)
	{
		$this->badgeGroup = $group;
	}
	
}
