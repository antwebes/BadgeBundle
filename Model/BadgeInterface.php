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
	
	public function getChild();
	
	public function setChild(BadgeInterface $child);
	
	public function addBadge(BadgeInterface $badge);
	
	public function getBadges();
	
	public function getCount();
	
	public function setCount($count);
	
	public function getType();
	
	public function setType($type);
}