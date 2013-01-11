<?php

namespace ant\BadgeBundle\Provider;

use ant\BadgeBundle\Badge;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use ant\BadgeBundle\ModelManager\BadgeManagerInterface;

/**
 *
 * @author Pablo <pablo@antweb.es>
 */
class Provider implements ProviderInterface
{
	/**
	 * The badge manager
	 *
	 * @var BadgeManagerInterface
	 */
	protected $badgeManager;
	
	public function __construct(BadgeManagerInterface $badgeManager)
	{
		$this->badgeManager = $badgeManager;
	}
	
	/**
	 * Gets a badge by its ID
	 *
	 * @return BadgeInterface
	 */
	public function getBadge($badgeId){
		
		$badge = $this->badgeManager->findBadgeById($threadId);
		return $badge;
	}
}
