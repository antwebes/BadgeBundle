<?php

namespace antwebes\BadgeBundle;

abstract class BadgeGroup implements BadgeGroupInterface {
	protected $id;
	protected $name;


	public function __construct($name) {
		$this->name = $name;
	}

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


}
