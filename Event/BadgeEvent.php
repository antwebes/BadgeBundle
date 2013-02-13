<?php



namespace Ant\BadgeBundle\Event;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\EventDispatcher\Event;
use Ant\BadgeBundle\Model\BadgeInterface;
use Doctrine\ORM\EntityManager;

class BadgeEvent extends Event
{
    /**
     * The badge
     * @var BadgeInterface
     */
    private $class;
    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em, $class)
    {
        //parent::__construct($message->getThread());

        //$this->badge = $badge;
    	$this->em = $em;
        //$this->class = $em->getClassMetadata($class)->name; //para recuperar la clase
       $this->class=$class;
        //ldd($class);
    }

   /**
     * Returns the badge
     *
     * @return BadgeInterface
     */
  /*  public function getBadge()
    {
        return $this->badge;
    }*/
    /**
     * Returns the class
     *
     * @return string
     */
    public function getClass()
    {
    	return $this->class;
    }
}
