<?php
/**
 * This file is part of the AntewesBadgeBundle package.
 *
 * (c) antweb <http://github.com/antwebes/>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ant\BadgeBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Abstract badge model
 *
 * @author Pablo <pablo@ntweb.es>
 */
abstract class Badge implements BadgeInterface {
	protected $id;
	protected $name;
	protected $description;
	protected $image;
	/**
	 * amount necessary to obtain the badge
	 * @var int
	 */
	protected $count;
	
	/**
	 * Badges contained in this badge
	 *
	 * @var Collection of BadgeInterface
	 */
	protected $badges;
	

/*	public function __construct($name) {
		$this->name = $name;
	}*/

	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getDescription() {
		return $this->description;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function getImage() {
		return $this->image;
	}

	public function setImage($image) {
		$this->image = $image;
	}
	
	/**
	 * @see ant\BadgeBundle\Model\BadgeInterface::adBadge()
	 */
	public function addBadge(BadgeInterface $badge)
	{
		$this->badges->add($badge);
	}
	
	/**
	 * @see ant\BadgeBundle\Model\BadgeInterface::getBadges()
	 */
	public function getBadges()
	{
		return $this->badges->toArray();
	}
	public function getCount() {
		return $this->cound;
	}
	
	public function setCount($count) {
		$this->count = $count;
	}
	
}
