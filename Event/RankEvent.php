<?php



namespace Ant\BadgeBundle\Event;

use Ant\BadgeBundle\Model\RankInterface;

use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\EventDispatcher\Event;
use Ant\BadgeBundle\Model\BadgeInterface;
use Doctrine\ORM\EntityManager;

class RankEvent extends Event
{
	/**
	 * The rank
	 * @var RankInterface
	 */
	private $rank;
	
	public function __construct(RankInterface $rank)
	{	
		$this->rank = $rank;
	}
	
	/**
	 * Returns the rank
	 *
	 * @return RankInterface
	 */
	public function getRank()
	{
		return $this->rank;
	}
}
