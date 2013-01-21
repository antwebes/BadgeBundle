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


use ant\BadgeBundle\ModelManager\GroupManager as BaseGroupManager;
use ant\BadgeBundle\Model\GroupInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query\Builder;

/**
* Default ORM GroupManager.
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
    /**
     * Finds a group by its ID
     *
     * @return GroupInterface or null
     */
    public function findGroupById($id)
    {
    	return $this->repository->find($id);
    }
    /**
     * Finds a group by its class
     *
     * @return GroupInterface or null
     */
    public function findGroupByClass($class)
    {
    	return $this->repository->findOneByClass($class);
    	//recuperamos un solo objeto grupo
    }
    /**
     * Finds all groups
     *
     * @return GroupInterface or null
     */
    public function findAllGroup()
    {
    	return $this->repository->createQueryBuilder('g')
    	->getQuery()
    	->execute();
    }
    /**
     * Deletes a group
     *
     * @param GroupInterface $group the group to delete
     */
    public function deleteGroup(GroupInterface $group)
    {
    	$this->em->remove($group);
    	$this->em->flush();
    }
	/**
     * Returns the fully qualified badge class name
     *
     * @return string
     */
    public function getClass()
    {
    	return $this->class;
    }
}