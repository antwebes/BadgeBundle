<?php 

namespace antwebes\BadgeBundle;


interface BadgeGroupInterface
{
	public function getId();
	
	public function setId($id);
	
	public function getName();
	
	public function setName($name);


}