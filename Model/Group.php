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

abstract class Group implements GroupInterface {
	protected $id;
	protected $name;
	/**
	 * Class belong badge
	 *
	 * @var string
	 */
	protected $class;
	
	/**
	 * type associated
	 */
	protected $type;



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
	public function getClass() {
		return $this->class;
	}
	
	public function setClass($class) {
		$this->class = $class;
	}
	
	public function getType() {
		return $this->type;
	}
	
	public function setType($type) {
		$this->type = $type;
	}

}
