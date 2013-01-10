<?php 

namespace antwebes\BadgeBundle;


interface BadgeInterface
{
	public function getId();
	
	public function setId($id);
	
	public function getName();
	
	public function setName($name);
	
	public function getDescription();
	
	public function setDescription($description);
	
	public function getImage();
	
	public function setImage($image);
	
	public function getHasLevels();
	
	public function setHasLevels($hasLevels);
}