<?php

namespace ant\BadgeBundle\Provider;

/**
 * 
 * @author Pablo <pablo@antweb.es>
 */
interface ProviderInterface
{
	/**
	 * Gets the thread 
	 *
	 * @return badge
	 */
	public function getBadge($badgeId);
	
	/**
	 * Gets shelf ( all badges available)
	 *
	 * @return badges
	 */
	public function getShelf();
}
