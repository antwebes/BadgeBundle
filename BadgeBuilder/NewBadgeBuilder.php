<?php

namespace Ant\BadgeBundle\BadgeBuilder;

use Ant\BadgeBundle\Model\GroupInterface;
use Ant\BadgeBundle\Model\BadgeInterface;

/**
 * Fluent interface badge builder for new badge
 *
 * @author pablo <pablo@antweb.es>
 */
class NewBadgeBuilder extends AbstractBadgeBuilder
{
	/**
	 * The badge we are building
	 *
	 * @var BadgeInterface
	 */
	protected $badge;
	
	public function __construct(BadgeInterface $badge)
	{
		$this->badge = $badge;
	}
	
	/**
	 * Gets the created badge.
	 *
	 * @return BadgeInterface the badge created
	 */
	public function getBadge()
	{
		return $this->badge;
	}
	
	/**
	 * @param BadgeInterface
	 * @return BadgeBuilder (fluent interface)
	 */
	public function setDescription($description)
	{
		$this->badge->setDescription($description);
	
		return $this;
	}
	
	/**
	 * @param BadgeInterface
	 * @return BadgeBuilder (fluent interface)
	 */
	public function setImage($image)
	{
		$this->badge->setImage($image);
	
		return $this;
	}
	
	/**
	 * @param BadgeInterface
	 * @return BadgeBuilder (fluent interface)
	 */
	public function setImageIcon($image_icon)
	{
		$this->badge->setImageIcon($image_icon);
	
		return $this;
	}
	
	public function setcount($count) {
	
		$this->badge->setCount($count);
	
		return $this;
	}
	/**
	 * @param BadgeInterface
	 * @return BadgeBuilder (fluent interface)
	 */
	public function setName($name)
	{
		$this->badge->setName($name);
	
		return $this;
	}
	/**
	* @param BadgeInterface
	* @return BadgeBuilder (fluent interface)
	*/
	public function setBadgeGroup(GroupInterface $group)
	{
		$this->badge->setBadgeGroup($group);
	
		return $this;
	}
}
