<?php
/**
 * This file is part of the AntewesBadgeBundle package.
 *
 * (c) antweb <http://github.com/antwebes/>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Ant\BadgeBundle\Model;

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
	protected $image_icon;
	/**
	 * amount necessary to obtain the badge
	 * @var int
	 */
	protected $count;
	
	/**
	 * Group belong
	 *
	 * @var GroupInterface
	 */
	protected $badgeGroup;
	

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
	
	public function getImageIcon() {
		return $this->image_icon;
	}
	
	public function setImageIcon($image_icon) {
		$this->image_icon = $image_icon;
	}
	
	public function getCount() {
		return $this->count;
	}
	
	public function setCount($count) {
		$this->count = $count;
	}
	public function getBadgeGroup() {
		return $this->badgeGroup;
	}
	
	public function setBadgeGroup(GroupInterface $group) {
		$this->badgeGroup = $group;
	}
}
