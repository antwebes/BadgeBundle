<?php

namespace antwebes\BadgeBundle\EntityManager;

use antwebes\BadgeBundle\ModelManager\BadgeParticipantManager as BaseBadgeParticipantManager;
use Doctrine\ORM\EntityManager;
use antwebes\BadgeBundle\Model\BadgeInterface;
use Doctrine\ORM\Query\Builder;

/**
* Default ORM BadgeParticipantManager.
*
* @author Pablo <pablo@antweb.es>
*/
class BadgeParticipantManager extends BaseBadgeParticipantManager
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
	* @param string $metaClass
	*/
    public function __construct(EntityManager $em, $class, $metaClass)
    {
        $this->em = $em;
        $this->repository = $em->getRepository($class);
        $this->class = $em->getClassMetadata($class)->name;
        $this->metaClass = $em->getClassMetadata($metaClass)->name;
    }

    /**
* Creamos todas las funciones que queramos como el FOsMessageBundle
*/
    etSingleScalarResult();
    }

    protected function createMessageMetadata()
    {
        return new $this->metaClass();
    }
}