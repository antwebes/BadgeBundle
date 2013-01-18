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

use ant\BadgeBundle\ModelManager\BadgeManager as BaseBadgeManager;

use Doctrine\ORM\EntityManager;
use ant\BadgeBundle\Model\BadgeInterface;
use Doctrine\ORM\Query\Builder;

/**
* Default ORM BadgeManager.
*
* @author Pablo <pablo@antweb.es>
*/
class BadgeManager extends BaseBadgeManager
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
     * Saves a badge
     *
     * @param BadgeInterface $badge
     */
    public function saveBadge(BadgeInterface $badge)
    {
    	$this->em->persist($badge);
    	$this->em->flush();
    }
    /**
     * Finds a badge by its ID
     *
     * @return BadgeInterface or null
     */
    public function findBadgeById($id)
    {
    	//ldd($this->repository->find($id));
    	return $this->repository->find($id);
    }
    /**
     * Finds all badge 
     *
     * @return BadgeInterface or null
     */
    public function findAllBadge()
    {
    	return $this->repository->createQueryBuilder('b')    	
    	->getQuery()
    	->execute();
    }
    /**
     * Deletes a badge
     *
     * @param BadgeInterface $badge the badge to delete
     */
    public function deleteBadge(BadgeInterface $badge)
    {
    	$this->em->remove($badge);
    	$this->em->flush();
    }
    /**
     * Finds a badge by its class
     *
     * @return BadgeInterface or null
     */
    public function findBadgeByClass($class)
    {
    	return $this->repository->findByClass($class);
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