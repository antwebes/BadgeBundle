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

interface GroupInterface
{
	public function getId();
	
	public function setId($id);
	
	public function getName();
	
	public function setName($name);
	
	public function getType();
	
	public function setType($type);

}