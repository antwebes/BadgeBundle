<?php

namespace antwebes\BadgeBundle;

abstract class Badge implements BadgeInterface {
	protected $id;
	protected $name;
	protected $description;
	protected $image;
	protected $hasLevels;

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

	public function getHasLevels() {
		return $this->hasLevels;
	}

	public function setHasLevels($hasLevels) {
		$this->hasLevels = $hasLevels;
	}

}
