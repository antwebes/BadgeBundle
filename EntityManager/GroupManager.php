<?php
/**
 * This file is part of the AntewesBadgeBundle package.
 *
 * (c) antweb <http://github.com/antwebes/>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace ant\BadgeBundle\EntityManager;

use ant\BadgeBundle\Model\GroupInterface;

use ant\BadgeBundle\ModelManager\GroupManager as BaseGroupManager;

use Doctrine\ORM\EntityManager;
use antwebes\BadgeBundle\Model\BadgeInterface;
use Doctrine\ORM\Query\Builder;

/**
* Default ORM BadgeGroupManager.
*
* @author Pablo <pablo@antweb.es>
*/
class GroupManager extends BaseGroupManager
{
    /**
	* @var EntityManager
	*/
    protected $em;

    /**
	* @var DocumentRepository
	*/
    protected $repository;

    /**
	* @var string
	*/
    protected $class;

    /**
	* @var string
	*/
    protected $metaClass;

    /**
	* Constructor.
	*
	* @param EntityManager $em
	* @param string $class
	*/
    public function __construct(EntityManager $em, $class)
    {
        $this->em = $em;
        $this->repository = $em->getRepository($class);
        $this->class = $em->getClassMetadata($class)->name;
    }

    /**
	* Creamos todas las funciones que queramos como el FOsMessageBundle
	*/
    
    /**
     * Saves a group
     *
     * @param GroupInterface $badge
     */
    public function saveGroup(GroupInterface $group)
    {
    	$this->em->persist($group);
    	$this->em->flush();
    }
	
    protected function createMessageMetadata()
    {
        return new $this->metaClass();
    }
}