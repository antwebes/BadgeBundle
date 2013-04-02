<?php

namespace Ant\BadgeBundle\FormModel;

use Ant\BadgeBundle\Model\GroupInterface;

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
	 * The route of image_icon
	 *
	 * @var string
	 */
	protected $image_icon;
	
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
	public function getImageIcon()
	{
		return $this->image_icon;
	}
	
	/**
	 * @param  string
	 * @return null
	 */
	public function setImageIcon($image_icon)
	{
		$this->image_icon = $image_icon;
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
